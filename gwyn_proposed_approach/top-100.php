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
                        <h1><?php printf( 'Top 100 records from %s', $period ) ?></h1>
                    </div>
                    <div class="tna-page__entry">

                    </div>
                </article>
            </main>
        </div>
    </div>
</div>
</body>
</html>
