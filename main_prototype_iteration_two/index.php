<!doctype html>
<html lang="en">
<?php
include_once 'includes/head.php';
include_once 'includes/functions.php';
include_once 'data/era_data.php';
?>

<body>
    <?php include 'includes/css_js_toggler.php' ?>
    <div class="tna-page home">
        <div class="container">
            <div class="row">
                <main class="col-xs-12 col-sm-12" role="main">
                    <a href="/" id="logo-link"><img src="/images/tna-square-logo.svg" id="logo" alt="The National Archives Square Logo" /></a>
                    <article>
                        <div class="tna-page__header">
                            <h1><?php echo $homepage_heading ?></h1>
                        </div>
                        <div class="tna-page__entry">
                            <p><?php echo $homepage_intro_1 ?></p>
                            <p><?php echo $homepage_intro_2 ?></p>
                        </div>
                        <h2><?php echo $homepage_subheading ?></h2>
                        <p><?php echo $homepage_subparagraph ?></p>
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
            </div>
            </article>
            </main>
        </div>
    </div>
    </div>
</body>

</html>