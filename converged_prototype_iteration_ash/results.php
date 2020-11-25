<!doctype html>
<html lang="en">
<?php include 'includes/head.php' ?>

<?php 

$url = './data/eras_modded.json'; // path to your JSON file
$data = file_get_contents($url); // put the contents of the file into a variable
$eras_data = json_decode($data, true); // decode the JSON feed 

$era = $_GET["era"];
$title = str_replace("-"," ", $era);
$title = ucwords($title);


if($era == "custom-date-range") {
    $start_date = substr($_GET["start_date"], 0, 4);
    $end_date = substr($_GET["start_date"], 0, 4);
}
else {
    $start_date = substr($eras_data[$era]["start_date"], 0, 4);
    $end_date = substr($eras_data[$era]["end_date"], 0, 4);
}

$time_period = "(" . $start_date . " - " . $end_date . ")";
$description = $eras_data[$era]["text"];

$text_visualisation = $eras_data[$era]["facts"];
$results = $eras_data[$era]["results"];
$total_records = $eras_data[$era]["total_records"];
$total_records = number_format($total_records);
?>

<body>
<a href="<?php echo "/toggle.php?redirect=" . $_SERVER['REQUEST_URI']?>">Toggle CSS & JS</a>

<main role="main">
    <div class="container">
    <img src="/images/tna-square-logo.svg" id="logo" alt="The National Archives Square Logo"/>
        <h1><?php echo $title . " "; echo $time_period; ?></h1>
        <div>
        <p class="lead"><?php echo $description ?></p>
        <a class="tna-button" href="/">Return to start page</a>
        </div>
       
        <h2 id="records-available"><?php echo $total_records ?> records available</h2> <button class="tna-button" id="refine-button">Show refine options</button>
        <div class="grey-bg" id="refine-container">
            <h2 class="text-center mt-5" id="refine-heading">Refine your results</h2>
            <div class="center">
                <form method="POST" action="#">
                    <fieldset>
                        <legend>Refine by year</legend>
                    <labelfor="dateFrom">From</label>
                    <input type="number" min=<?php echo $start_date ?> max=<?php echo $end_date ?>
                     id="dateFrom" placeholder=<?php echo $start_date ?> value=<?php echo $start_date ?>>

                    <label for="dateTo">To</label>
                    <input type="number" min=<?php echo $start_date ?> max=<?php echo $end_date ?>   id="dateTo" placeholder=<?php echo $end_date ?> value=<?php echo $end_date ?>>
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

                    <div >
                    <input type="submit" class="tna-button" value="Refine results">

                    </div>

                </form>
            </div>
        </div>
        <div id="at-a-glance">
            <h3>At a glance</h3>
            <ul>
                <?php foreach($text_visualisation as $fact) {
                    echo '<li>' . $fact . '</li>';
                }?>
            </ul>
        </div>
        <div class="masonry">
            
            <?php 
                foreach($results as $result) {
                    echo "<div class='item'>";
                    echo "<a href='$result[2]'>";
                    echo "<img src='$result[0]' />";
                    echo "<h3><a href='$result[2]'>$result[1]</a></h3>";
                    echo "</a>";
                    echo "</div>";
                }
        ?>
        </div>
    </div>
</main>

<?php 
    if($_COOKIE["disable_enhancements"] != "true") {
echo '<script src="/scripts/refine.js"></script>';
    }
?>
</body>
</html>