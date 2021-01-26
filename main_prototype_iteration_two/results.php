<!doctype html>
<html lang="en">
<?php
include_once 'includes/head.php';
include_once 'includes/functions.php';
include_once 'data/era_data.php';

?>

<?php

$era = $_GET["era"];
$current_subject = $_GET["subject"] ?? '';
$current_subperiod = $_GET["subperiod"] ?? '';


$era_time_period_min = $era_time_periods[$era][0];
$era_time_period_max = $era_time_periods[$era][1];


$start_date = $_GET["start_date"] ?? '';
$end_date = $_GET["end_date"] ?? '';

if ($start_date === null || $start_date === '') {
    $start_date = $era_time_periods[$era][0];
    $end_date = $era_time_periods[$era][1];
}


// If the year is only 3 characters long, pad with 0's as the search API needs 4 length integers for year.
if (strlen($start_date) < 4) {
    $start_date = str_pad($start_date, 4, "0", STR_PAD_LEFT);
}
if (strlen($end_date) < 4) {
    $end_date = str_pad($end_date, 4, "0", STR_PAD_LEFT);
}

if (!isset($era)) {
    header('Location: index.php');
}

$api_url = "https://alpha.nationalarchives.gov.uk/idresolver/collectionexplorer/?no_of_hits=20&era=$era&start_year=$start_date&end_year=$end_date&subject=$current_subject";
$search_results = get_data_from_api($api_url);

$total = $search_results["filtered_total"];
$total_fake_digitised = number_format(round($total * 0.05)); // Give illusion of only showing 5% of our collection as digitised
$hits = $search_results["hits"];

usort($hits, function ($a, $b) { //Sort the array using a user defined function
    return $a["_source"]["first_date"] < $b["_source"]["first_date"] ? -1 : 1; //Compare the scores
});

echo $api_url;


// echo "<pre>";
// var_dump($search_results);
// echo "</pre>";
$title = prettify_text($era);

?>

<body>
    <a href="<?php echo "/toggle.php?redirect=" . $_SERVER['REQUEST_URI'] ?>">Toggle CSS & JS</a>

    <main role="main">
        <div class="container">
            <a href="/" id="logo-link"><img src="/images/tna-square-logo.svg" id="logo" alt="The National Archives Square Logo" /></a>
            <p><a href="/">Home</a></p>
            <h1><?php echo "$title ($start_date-$end_date)"; ?></h1>
            <p><?php echo $era_descriptions[$era] ?></p>
            <?php if (!empty($era_subperiods[$era])) : ?>
                <h2>Refine by sub period</h2>

            <?php endif; ?>

            <div id="subjects">
                <ul>
                    <?php if ($current_subperiod) :

                        $url_with_subperiod_removed = str_replace("&subperiod=$current_subperiod", "&subperiod=", $_SERVER['QUERY_STRING']);
                        $url_with_subperiod_removed = str_replace("&start_date=$start_date", "&start_date=", $url_with_subperiod_removed);
                        $url_with_subperiod_removed = str_replace("&end_date=$end_date", "&end_date=", $url_with_subperiod_removed);


                        echo "<li><a href='/results.php?$url_with_subperiod_removed#results'>None</a></li>";

                    endif; ?>

                    <?php

                    if (!empty($era_subperiods[$era])) :

                        foreach ($era_subperiods[$era] as $subperiod) : ?>



                            <?php render_subperiod($subperiod); ?>
                    <?php
                        endforeach;
                    endif;
                    ?>
                </ul>
            </div>

            <h2 id="results" class="sr-only">Results</h2>
            <p id="records-available"><?php echo "$total_fake_digitised digitised records available"; ?>
            <div class="masonry">

                <?php foreach ($hits as  $result) : ?>
                    <?php render_result($result) ?>
                <?php endforeach; ?>
                <!-- Results go here -->
            </div>
        </div>
    </main>

    <?php
    if ($_COOKIE["disable_enhancements"] != "true") {
        echo '<script src="/scripts/refine.js"></script>';
    }
    ?>
</body>

</html>