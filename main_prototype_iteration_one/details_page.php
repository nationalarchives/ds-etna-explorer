<!doctype html>
<html lang="en">
<?php include 'includes/head.php' ?>

<body>
    <a href="<?php echo "/toggle.php?redirect=" . $_SERVER['REQUEST_URI'] ?>">Toggle CSS & JS</a>
    <div class="tna-page home">
        <div class="container">
            <div class="row">
                <main class="col-xs-12 col-sm-8" role="main">
                    <a href="/" id="logo-link"><img src="/images/tna-square-logo.svg" id="logo" alt="The National Archives Square Logo" /></a>
                    <article>
                        <div class="tna-page__header">
                            <h1>Details Page (Under Construction)</h1>
                        </div>
                        <div class="tna-page__entry">
                            <p>This page is under construction. It would give you details about the record you clicked on.</p>
                        </div>
                        <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Go Back</a>
                    </article>
                </main>
            </div>
        </div>
    </div>
</body>

</html>