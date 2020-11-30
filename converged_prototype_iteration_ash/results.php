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


if ($_GET["start_date"] != null) {
    $start_date = substr($_GET["start_date"], 0, 4);
    $end_date = substr($_GET["end_date"], 0, 4);
} else {
    $start_date = substr($eras_data[$era]["start_date"], 0, 4);
    $end_date = substr($eras_data[$era]["end_date"], 0, 4);
}

$time_period = "(" . $start_date . " - " . $end_date . ")";
$description = $eras_data[$era]["text"];

$text_visualisation = $eras_data[$era]["facts"];
$results = $eras_data[$era]["results"];
$refined = $_GET["refined"];

if ($refined != null) {
    // Add illusion that results changed on refine

    $results = [
        ["https://test.nationalarchives.gov.uk/wp-content/uploads/2018/10/PRO30-26-11-Edgar-Charter-granting-the-thane-Aelfhere-land-at-Nymed-Devon-974.jpg", "King Edgar grants 3 hides of land to Ælfhere, his faithful minister", "https://alpha.nationalarchives.gov.uk/journey/record/E%20135/6/56"],
        ["https://nationalarchives.github.io/ds-alpha-analytics-service/thumbs/20230.jpg", "Comfirmation in frank almoin, addressed to Walter, bishop of Rochester, by Thomas, archbishop of Canterbury, to the canons of Holy Trinity, London, of the church of St. Mary, Bixle, the grantor's predecessors, with lands and tithes belonging thereto; with", "https://alpha.nationalarchives.gov.uk/journey/record/E%2040/4913"],
        ["https://nationalarchives.github.io/ds-alpha-analytics-service/thumbs/20091.jpg", "Letters patent of John de Balliol releasing Edward I. from all agreements, &c. made by him while the kingdom of Scotland was in his hands. Newcastle-on-Tyne.", "https://alpha.nationalarchives.gov.uk/journey/record/E%2039/29"],

    ];
}


$total_records = $eras_data[$era]["total_records"];
$total_records = number_format($total_records);
?>

<body>
    <a href="<?php echo "/toggle.php?redirect=" . $_SERVER['REQUEST_URI'] ?>">Toggle CSS & JS</a>

    <main role="main">
        <div class="container">
            <img src="/images/tna-square-logo.svg" id="logo" alt="The National Archives Square Logo" />
            <p><a href="/">Return to start page</a></p>
            <h1><?php echo $title . " ";
                echo $time_period; ?></h1>
            <div>
                <p class="lead"><?php echo $description ?></p>
            </div>
            <div class="showcase">
                <h2 class="text-center">Most popular records during this period</h2>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <p class="card-subtitle mb-2 text-muted">TNA 12/3</p>
                                <h3 class="card-title"><a href="#"><?php echo $results[0][1] ?></a></h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <p class="card-subtitle mb-2 text-muted">TNA 45/6</p>
                                <h3 class="card-title"><a href="#"><?php echo $results[1][1] ?></a></h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <p class="card-subtitle mb-2 text-muted">TNA 78/9</p>
                                <h3 class="card-title"><a href="#"><a href=""><?php echo $results[2][1] ?></a></h3>
                            </div>
                        </div>
                    </div>
                </div><!-- /.row -->
            </div>
            <div id="at-a-glance">
                <h2>At a glance</h2>
                <ul>
                    <?php foreach ($text_visualisation as $fact) {
                        echo '<li>' . $fact . '</li>';
                    }

                    if ($refined != null) {
                        echo '<li> Your refined search has produced 1,432 results. </li>';
                    }

                    ?>


                </ul>
            </div>
            <button class="tna-button" id="refine-button">Show refine options</button>
            <div class="grey-bg" id="refine-container">
                <h2 class="text-center mt-5" id="refine-heading">Refine your results</h2>
                <div class="center">
                    <form method="GET" action="">
                        <fieldset>
                            <legend>Refine by year</legend>
                            <labelfor="dateFrom">From</label>
                                <input type="number" name="start_date" min=<?php echo $start_date ?> max=<?php echo $end_date ?> id="dateFrom" placeholder=<?php echo $start_date ?> value=<?php echo $start_date ?>>

                                <label for="dateTo">To</label>
                                <input type="number" name="end_date" min=<?php echo $start_date ?> max=<?php echo $end_date ?> id="dateTo" placeholder=<?php echo $end_date ?> value=<?php echo $end_date ?>>
                        </fieldset>
                        <fieldset>
                            <legend>Visual options</legend>
                            <div>
                                <input type="checkbox" name="show-featured-first" id="show-featured-first" checked>
                                <label for="show-featured-first">Show key documents first</label>
                            </div>
                            <div>
                                <input type="checkbox" name="hide-undigitised" id="hide-undigitised" checked>
                                <label for="hide-undigitised">Hide records without an image</label>
                            </div>
                        </fieldset>

                        <div>
                            <input type="hidden" name="refined" value="true" />
                            <input type="hidden" name="era" value="<?php echo $era ?>" />
                            <input type="submit" class="tna-button" value="Refine results">

                        </div>

                    </form>
                </div>
            </div>
            <div class="masonry">

                <?php
                foreach ($results as $result) {
                    echo "<div class='item'>";
                    echo "<a href='#'>";
                    echo "<img src='$result[0]' />";
                    echo "<h3><a href='#'>$result[1]</a></h3>";
                    echo "</a>";
                    echo "</div>";
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