<!doctype html>
<html lang="en">
<?php include 'includes/head.php' ?>
<?php

function render_card($era)
{
    include 'data/era_data.php';

    $description = $era_descriptions[$era]; // from include
    $time_period = $era_time_periods[$era]; // from include
    $h3_era_text = ucfirst($era);
    echo "<div class='col-lg-6'>
    <div class='card'>
        <div class='card-body'>
            <h3 class='card-title'><a href='/results.php?featured_first=true&hide_records_without_image=true&era=$era'>$h3_era_text</a></h3>
            <h4 class='card-subtitle mb-2 text-muted'>$time_period</h4>
            <p class='card-text'>$description</p>
        </div>
    </div>
</div>";
}

?>

<body>
    <?php include 'includes/css_js_toggler.php' ?>
    <div class="tna-page home">
        <div class="container">
            <div class="row">
                <main class="col-xs-12 col-sm-8" role="main">
                    <a href="/" id="logo-link"><img src="/images/tna-square-logo.svg" id="logo" alt="The National Archives Square Logo" /></a>
                    <article>
                        <div class="tna-page__header">
                            <h1>Explore the collection through time</h1>
                        </div>
                        <div class="tna-page__entry">
                            <p>From The Domesday Book to recent Cabinet papers, 1,000 years of international history are
                                preserved in millions of records. Explore wars, revolutions, life stories and landmark
                                rulings, and iconic figures including Shakespeare, Queen Victoria, Gandhi and Churchill.</p>
                        </div>
                        <h2>Explore by time period</h2>
                        <p>Our experts have identified eight consecutive time periods, from medieval to postwar,
                            covering the full collection:</p>
                        <div class="row">
                            <?php
                            render_card("medieval");
                            render_card("early-modern");
                            render_card("empire-and-industry");
                            render_card("victorians");
                            render_card("early-20th-century");
                            render_card("interwar");
                            render_card("second-world-war");
                            render_card("postwar");
                            ?>
                        </div>
                        <h3>Choose your own dates</h3>
                        <p>Select your own date ranges to explore the collection:</p>
                        <?php include 'includes/date_form.php' ?>
            </div>
            </article>
            </main>
        </div>
    </div>
    </div>
</body>

</html>