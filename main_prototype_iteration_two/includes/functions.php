<?php

function render_card($era)
{
    include 'data/era_data.php';

    $description = $era_descriptions[$era]; // from include
    $time_period = $era_time_periods[$era]; // from include
    $h3_era_text = prettify_text($era);
    echo <<<HTML
    <div class='col-lg-6'>
    <div class='card'>
        <div class='card-body'>
        <div class='era-image'><a href='/results.php?era=$era'><img src='images/$era.jpg' /></a></div>
            <h3 class='card-title'><a href='/results.php?era=$era'>$h3_era_text</a></h3>
            <p class='card-subtitle mb-2 text-muted'>$time_period[0] - $time_period[1]</p>
            <p class='card-text'>$description</p>
        </div>
    </div>
</div>
HTML;
}

function get_data_from_api($url)
{
    $resource = curl_init($url);
    curl_setopt($resource, CURLOPT_RETURNTRANSFER, true);
    $JSON = json_decode(curl_exec($resource), true);
    curl_close($resource);
    return $JSON;
}

function prettify_text($era)
{
    $prettified = str_replace("-", " ", $era); //turns era json key into readable title
    $prettified = ucwords($prettified);
    return $prettified;
}

function render_result($result)
{
    $source = $result["_source"];
    $highlights = $source["highlights"] ?? null;
    $first_date = substr($source["first_date"], 0, 4);
    $last_date = substr($source["last_date"], 0, 4);

    $image = '';
    $event = null;
    if (isset($source["medium_thumbs"]) && count($source["medium_thumbs"]) > 0) {
        $image = $source["medium_thumbs"][0];
    } else if (isset($source["small_thumbs"]) && count($source["small_thumbs"]) > 0) {
        $image = $source["small_thumbs"][0];
    }
    if (isset($highlights)) {

        if (!$image && isset($highlights[0]["image_library_link"])) {
            $image = $highlights[0]["image_library_link"];
        }
        if ($highlights[0]["title_of_event"]) {
            $event = $highlights[0]["title_of_event"];
        }
    }

    // If the image doesn't exist, or the image link isn't actually a raw image (API sometimes returns image library links) then return without rendering the result
    if (!$image || !(str_contains($image, ".jpg") || str_contains($image, ".png") || str_contains($image, ".jpeg"))) {
        return;
    }

    $title = $source["title"];

    echo <<<HTML
    <div class="item">
    <h3>$title</h3>
    <p>$first_date - $last_date</p>
    <p><a href='/details_page.php'>View more details</a></p>
    HTML;

    if ($image) :
        echo "<a href='/details_page.php'><img src= '$image'/></a>";
    endif;

    if ($event) :
        echo "<p>$event</p>";
    endif;

    echo <<<HTML
    </div>
    HTML;
}

function render_subject($subject)
{
    $subject_key = $subject["key"];
    $subject_name = prettify_text($subject_key);
    $current_subject = '';
    $class = '';

    if(isset($_GET["subject"])) {
        $current_subject = $_GET['subject'];
    }

    if(str_contains($_SERVER['QUERY_STRING'], "&subject=")) {
        $query_string_for_this_subject = str_replace("&subject=$current_subject", "&subject=$subject_key", $_SERVER['QUERY_STRING']);
    }
    else {
        $query_string_for_this_subject = $_SERVER['QUERY_STRING'] . "&subject=$subject_key";
    }


    if($current_subject === $subject_key) {
        $class= "selected";
    }

    echo <<<HTML
    <li><a class="$class" href="/results.php?$query_string_for_this_subject">$subject_name</a></li>
    HTML;
}
