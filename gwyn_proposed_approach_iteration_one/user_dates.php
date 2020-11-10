<!doctype html>
<html lang="en">

<?php include 'includes/head.php' ?>
<body>
<div class="tna-page time-period">
    <div class="container">
        <div class="row">
            <main class="col-xs-12 col-sm-12" role="main">
                <article>
                    <div class="tna-page__header">
                        <h1>Your dates</h1>
                    </div>
                </article>
            </main>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-2">
                <form class="tna-form">
                    <fieldset>
                        <div class="tna-form__row">
                            <label for="start_date">Start date</label>
                            <input required type="date" pattern="\d{3,4}" name="start_date" placeholder="YYYY" value="<?php echo $_GET['start_date'] ?>">
                        </div>
                        <div class="tna-form__row">
                            <label for="end_date">End date</label>
                            <input required type="date" pattern="\d{3,4}" name="end_date" placeholder="YYYY" value="<?php echo $_GET['end_date'] ?>">
                            <label for="">&nbsp;</label>
                            <input class="tna-button" type="submit" value="Show records">
                        </div>
                    </fieldset>
                </form>
            </div>
            <div class="col-xs-12 col-sm-10">
                <?php include 'includes/results.php' ?>
            </div>

        </div>
    </div>
</div>
</body>
</html>

