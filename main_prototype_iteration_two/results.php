<!doctype html>
<html lang="en">
<?php
include_once 'includes/head.php';
include_once 'includes/functions.php';
include_once 'data/era_data.php';

?>

<?php

$era = $_GET["era"];
$start_date = $_GET["start_date"] ?? $era_time_periods[$era][0];
$end_date = $_GET["end_date"] ?? $era_time_periods[$era][1];

echo "<pre>";
var_dump($start_date);
echo "</pre>";

echo "<pre>";
var_dump($end_date);
echo "</pre>";



if (!isset($era)) {
    header('Location: index.php');
}

$api_url = "https://alpha.nationalarchives.gov.uk/idresolver/collectionexplorer/?no_of_hits=20&era=$era&start_year=0974&end_year=1485&no_of_hits=5&phrase=&subject=";
$search_results = get_data_from_api($api_url);

// echo "<pre>";
// var_dump($search_results);
// echo "</pre>";
$title = prettify_era($era);

?>

<body>
    <a href="<?php echo "/toggle.php?redirect=" . $_SERVER['REQUEST_URI'] ?>">Toggle CSS & JS</a>

    <main role="main">
        <div class="container">
            <a href="/" id="logo-link"><img src="/images/tna-square-logo.svg" id="logo" alt="The National Archives Square Logo" /></a>
            <p><a href="/">Home</a></p>
            <h1><?php echo "$title ($start_date-$end_date)"; ?></h1>

            <div class="masonry">
                <h2 id="results" class="sr-only">Results</h2>
                <?php foreach ($search_results["hits"] as  $result) : ?>
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