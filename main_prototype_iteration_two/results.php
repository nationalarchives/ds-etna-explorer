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
$current_subcategory = $_GET["subcategory"] ?? '';
$phrase = $_GET["phrase"] ?? '';
$api_phrase = urlencode($phrase);
$string_match_phrase = str_replace(" ", "%20", $phrase);


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

$api_url = "https://alpha.nationalarchives.gov.uk/idresolver/collectionexplorer/?no_of_hits=20&era=$era&start_year=$start_date&end_year=$end_date&subject=$current_subject&phrase=$api_phrase";
$search_results = get_data_from_api($api_url);

$total = number_format($search_results["filtered_total"]);
$hits = $search_results["hits"];

usort($hits, function ($a, $b) { //Sort the array using a user defined function
    return $a["_source"]["first_date"] < $b["_source"]["first_date"] ? -1 : 1; //Compare the scores
});


// echo "<pre>";
// var_dump($search_results);
// echo "</pre>";
$title = prettify_text($era);

?>

<body>
    <!-- <?php include 'includes/css_js_toggler.php' ?> -->

    <main role="main">
        <div class="container">
            <a href="/" id="logo-link"><img src="/images/tna-square-logo.svg" id="logo" alt="The National Archives Square Logo" /></a>
            <p><a href="/">Home</a></p>
            <div class="results-banner" style=<?php echo " \"background-image: url('images/$era.jpg'); \"" ?>>
                <h1 id="era-h1"><?php echo "$title ($start_date-$end_date)"; ?></h1>
                <p><?php echo $era_descriptions[$era] ?></p>
            </div>

            <?php if (!empty($era_subcategories[$era])) : ?>
                <div class="sticky-div">
                    <h2 class="refine-h2">Refine by subcategory</h2>
                    <div id="subcategories">
                        <ul>
                            <?php if ($current_subcategory) :

                                $url_with_subcategory_removed = str_replace("&subcategory=$current_subcategory", "&subcategory=", $_SERVER['QUERY_STRING']);
                                $url_with_subcategory_removed = str_replace("&phrase=$string_match_phrase", "&phrase=", $url_with_subcategory_removed);



                                echo "<li><a href='/results.php?$url_with_subcategory_removed#results'>None</a></li>";

                            endif; ?>

                            <?php

                            if (!empty($era_subcategories[$era])) :

                                foreach ($era_subcategories[$era] as $subcategory) : ?>



                                    <?php render_subcategory($subcategory); ?>
                            <?php
                                endforeach;
                            endif;
                            ?>
                        </ul>
                    </div>
                </div>

            <?php endif; ?>



            <h2 id="results" class="sr-only">Results</h2>
            <p id="records-available"><?php echo "$total digitised records available"; ?>
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
        // echo '<script src="/scripts/refine.js"></script>';
    }
    ?>

    <?php
    echo "<script>
        console.log('API request url is: $api_url');
    </script>" ?>;

</body>

</html>