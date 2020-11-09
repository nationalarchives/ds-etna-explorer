<?php

$period = $_GET['period'];

?>

<!doctype html>
<html lang="en">
<?php include 'includes/head.php' ?>
<body>
<div class="tna-page">
    <div class="container">
        <div class="row">
            <main class="col-xs-12 col-sm-8" role="main">
                <article>
                    <div class="tna-page__header">
                        <h1><?php printf('Top 100 records from %s', $period) ?></h1>
                    </div>
                    <div class="tna-page__entry">
                        <p>This page shows the top 100 documents from the archives.</p>
                        <p>It could also allow users to filter change the display to show the top 100 documents from each time period (allowing users to see up to 800 documents in the page).</p>
                    </div>
                </article>
            </main>
        </div>
    </div>
</div>
</body>
</html>
