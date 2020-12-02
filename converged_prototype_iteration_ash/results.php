<!doctype html>
<html lang="en">
<?php include 'includes/head.php' ?>

<?php

$url = './data/eras_modded.json'; // path to your JSON file
$data = file_get_contents($url); // put the contents of the file into a variable
$eras_data = json_decode($data, true); // decode the JSON feed 

$era = $_GET["era"];
$title = str_replace("-", " ", $era);
$title = ucwords($title);
$era_start_date = substr($eras_data[$era]["start_date"], 0, 4);
$era_end_date = substr($eras_data[$era]["end_date"], 0, 4);

if ($_GET["start_date"] != null) {
    $start_date = substr($_GET["start_date"], 0, 4);
    $end_date = substr($_GET["end_date"], 0, 4);
} else {
    $start_date = $era_start_date;
    $end_date = $era_end_date;
}

$time_period = "(" . $start_date . " - " . $end_date . ")";
$description = $eras_data[$era]["text"];

$text_visualisation = $eras_data[$era]["facts"];
$results = $eras_data[$era]["results"];


// This is for tracking wether they have changed the years in the "Refine your results box". 
// If they have changed the years, we limit the amount of records from the array to 5 to give the illusion of less records being returned.
$start_date_before_refine_POST = $_GET["start_date_before_refine_POST"];
$end_date_before_refine_POST = $_GET["end_date_before_refine_POST"];

if ($start_date_before_refine_POST == null || $end_date_before_refine_POST == null) {
    $start_date_before_refine_POST = $start_date;
    $end_date_before_refine_POST = $end_date;
}


$featured_first = $_GET["featured_first"];
$hide_records_without_image = $_GET["hide_records_without_image"];


if ($featured_first != null) {
    $featured_first = true;
} else {
    //Randomise results if they haven't selected to show featured records first. Gives the illusion of randomness.
    shuffle($results);
}

if ($hide_records_without_image != null) {
    $hide_records_without_image = true;
}

$era_total_records = $eras_data[$era]["total_records"];
$search_total_records = $era_total_records;


if ($hide_records_without_image) {
    // If they have hidden records without an image, divide the total by two to give the illusion of less records.
    $search_total_records = ceil($search_total_records / 2);
}

if ($start_date_before_refine_POST != $start_date || $end_date_before_refine_POST != $end_date) {
    $refined = true;
    $search_total_records = ceil($search_total_records / 1.5);
}

$downloadable_records = ceil($search_total_records * 0.2); // Pretending 20% of records are downloadable in all cases
$onsite_records = ceil($search_total_records * 0.8); // Pretending 20% of records are only available on site in all cases


$era_total_records = number_format($era_total_records);
$search_total_records = number_format($search_total_records);
$downloadable_records = number_format($downloadable_records);
$onsite_records = number_format($onsite_records);
?>

<body>
    <a href="<?php echo "/toggle.php?redirect=" . $_SERVER['REQUEST_URI'] ?>">Toggle CSS & JS</a>

    <main role="main">
        <div class="container">
            <a href="/" id="logo-link"><img src="/images/tna-square-logo.svg" id="logo" alt="The National Archives Square Logo" /></a>
            <p><a href="/">Home</a></p>
            <h1><?php echo $title . " ";
                echo $time_period; ?></h1>
            <div>
                <p class="lead"><?php echo $description ?></p>
            </div>
            <div id="at-a-glance">
                <h2>At a glance</h2>
                <ul>
                    <li><?php echo "$era_total_records records exist in this era." ?></li>
                    <li><?php echo "With the filters selected, $search_total_records of these records are displayed." ?></li>
                    <li><?php echo "$downloadable_records records are available for download." ?></li>
                    <li><?php echo " $onsite_records records are available to access for free at our Kew site, or by purchasing a copy." ?></li>
                    <?php foreach ($text_visualisation as $fact) {
                        echo '<li>' . $fact . '</li>';
                    }
                    ?>


                </ul>
            </div>
            <div class="options">
                <h2 class="sr-only">Refine filters</h2>
                <h3 id="options-h3">Filters</h3>
                <p>
                    <?php if ($featured_first) {
                        echo "Featured records are set to display first.";
                    }; ?>
                    <?php if ($hide_records_without_image) {
                        echo "Records without an image have been hidden.";
                    }; ?>
                    <button class="tna-button" id="refine-button">Show filters</button>

                </p>
            </div>
            <div class="grey-bg" id="refine-container">
                <h2 class="text-center mt-5" id="refine-heading">Refine your results</h2>
                <div class="center">
                    <form method="GET" action="#results">
                        <fieldset>
                            <legend>Refine by year</legend>
                            <labelfor="dateFrom">From</label>
                                <input type="number" name="start_date" min=<?php echo $era_start_date ?> max=<?php echo $era_end_date ?> id="dateFrom" placeholder=<?php echo $start_date ?> value=<?php echo $start_date ?>>

                                <label for="dateTo">To</label>
                                <input type="number" name="end_date" min=<?php echo $era_start_date ?> max=<?php echo $era_end_date ?> id="dateTo" placeholder=<?php echo $end_date ?> value=<?php echo $end_date ?>>
                        </fieldset>
                        <fieldset>
                            <legend>Visual options</legend>
                            <div>
                                <input type="checkbox" name="featured_first" id="show-featured-first" <?php if ($featured_first) {
                                                                                                            echo "checked";
                                                                                                        }; ?>>
                                <label for="show-featured-first">Show featured records first</label>
                            </div>
                            <div>
                                <input type="checkbox" name="hide_records_without_image" id="hide-undigitised" <?php if ($hide_records_without_image) {
                                                                                                                    echo "checked";
                                                                                                                }; ?>>
                                <label for="hide-undigitised">Hide records without an image</label>
                            </div>
                        </fieldset>

                        <div>
                            <input type="hidden" name="start_date_before_refine_POST" value="<?php echo $start_date ?>" />
                            <input type="hidden" name="end_date_before_refine_POST" value="<?php echo $end_date ?>" />

                            <input type="hidden" name="era" value="<?php echo $era ?>" />
                            <input type="submit" class="tna-button" value="Refine results" id="refine-results-button">

                        </div>

                    </form>
                </div>
            </div>
            <div class="masonry">
                <h2 id="results" class="sr-only">Results</h2>
                <?php
                $refine_counter = 0;
                foreach ($results as $result) {
                    echo "<div class='item'>";
                    echo "<a href='/details_page.php'>";
                    echo "<img src='$result[0]' />";
                    echo "<h3><a href='/details_page.php'>$result[1]</a></h3>";
                    echo "</a>";
                    echo "</div>";
                    if ($refined) {
                        $refine_counter++;
                    }
                    if ($refine_counter >= 5) {
                        break;
                    }
                }

                if ($hide_records_without_image == null) {
                    for ($i = 0; $i < 5; $i++) {
                        echo "<div class='item'>";
                        echo "<a href='/details_page.php'>";
                        echo "<img src='https://alpha.nationalarchives.gov.uk/collectionexplorer/static/images/image-placeholder-2.png' />";
                        echo "<h3><a href='/details_page.php'>Record without image</a></h3>";
                        echo "</a>";
                        echo "</div>";
                    }
                }
                ?>
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