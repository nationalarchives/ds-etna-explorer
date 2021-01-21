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

$era_time_period_min = $era_time_periods[$era][0];
$era_time_period_max = $era_time_periods[$era][1];


$start_date = $_GET["start_date"] ?? $era_time_periods[$era][0];
$end_date = $_GET["end_date"] ?? $era_time_periods[$era][1];

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
$total_fake_digitised = round($total * 0.05); // Give illusion of only showing 5% of our collection as digitised
$hits = $search_results["hits"];

usort($hits, function ($a, $b) { //Sort the array using a user defined function
    return $a["_source"]["first_date"] < $b["_source"]["first_date"] ? -1 : 1; //Compare the scores
});

echo "<pre>";
foreach ($hits as $hit) {
    echo $hit["_source"]["first_date"] . "<br/>";
    # code...
}
echo "</pre>";

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
            <h2 id="subject-refine-h2">Refine by subject</h2>

            <div id="subjects">
                <ul>
                    <?php if ($current_subject) :

                        $url_with_subject_removed = str_replace("&subject=$current_subject", "&subject=", $_SERVER['QUERY_STRING']);
                        echo "<li><a href='/results.php?$url_with_subject_removed#results'>None</a></li>";

                    endif; ?>

                    <?php foreach ($search_results["subjects_aggregation"] as $subject) : ?>



                        <?php render_subject($subject); ?>
                    <?php
                    endforeach;
                    ?>
                </ul>
            </div>
            <form method="GET" action="#results">
                <fieldset>
                    <legend>Refine by year</legend>
                    <labelfor="dateFrom">From</label>
                        <input type="number" name="start_date" min=<?php echo $era_time_period_min ?> max=<?php echo $era_time_period_max ?> id="dateFrom" placeholder=<?php echo $start_date ?> value=<?php echo $start_date ?>>

                        <label for="dateTo">To</label>
                        <input type="number" name="end_date" min=<?php echo $era_time_period_min ?> max=<?php echo $era_time_period_max ?> id="dateTo" placeholder=<?php echo $end_date ?> value=<?php echo $end_date ?>>
                        <input type="hidden" name="subject" value="<?php echo $current_subject ?>" />
                        <input type="hidden" name="era" value="<?php echo $era ?>" />
                        <input type="submit" class="tna-button" value="Refine years" id="refine-results-button">
                </fieldset>


            </form>
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