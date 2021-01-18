<?php

function render_card($era)
{
    include 'data/era_data.php';

    $description = $era_descriptions[$era]; // from include
    $time_period = $era_time_periods[$era]; // from include
    $h3_era_text = prettify_era($era);
    echo "<div class='col-lg-6'>
    <div class='card'>
        <div class='card-body'>
        <div class='era-image'><a href='/results.php?featured_first=true&hide_records_without_image=true&era=$era'><img src='images/$era.jpg' /></a></div>
            <h3 class='card-title'><a href='/results.php?featured_first=true&hide_records_without_image=true&era=$era'>$h3_era_text</a></h3>
            <p class='card-subtitle mb-2 text-muted'>$time_period</p>
            <p class='card-text'>$description</p>
        </div>
    </div>
</div>";
}

function get_data_from_api($url)
{
    $resource = curl_init($url);
    curl_setopt($resource, CURLOPT_RETURNTRANSFER, true);
    $JSON = json_decode(curl_exec($resource), true);
    curl_close($resource);
    return $JSON;
}

function prettify_era($era)
{
    $prettified = str_replace("-", " ", $era); //turns era json key into readable title
    $prettified = ucwords($prettified);
    return $prettified;
}

function render_result($result)
{
    $source = $result["_source"];

    $image = '';
    if (isset($source["medium_thumbs"])) {
        $image = $source["medium_thumbs"][0];
    } else if (isset($source["small_thumbs"])) {
        $image = $source["small_thumbs"][0];
    }

    if (!$image) {
        return;
    }

    $title = $source["title"];

    echo <<<HTML
    <div class="item">
    <h3>$title</h3>
    <p><a href='/details_page.php'>View more details</a></p>
    <a href="/details_page.php">
    <img src= '$image'/>
    </a>
    </div>
    HTML;
}
