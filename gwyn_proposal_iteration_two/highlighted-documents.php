<?php include 'includes/functions.php' ?>
<!doctype html>
<html lang="en">
<?php include 'includes/head.php' ?>
<body>
<main class="tna-page">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-8">
                <article>
                    <div class="tna-page__header">
                        <h1>Highlighted documents</h1>
                    </div>
                    <div class="tna-page__entry">
                        <p>This page shows highlighted documents from the archives.</p>
                    </div>
                </article>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-10">
                <?php include 'includes/results_list.php' ?>
            </div>
            <div class="col-xs-12 col-sm-2">
                <form action="">
                    <fieldset>
                        <legend>Specify time periods</legend>
                        <div class="tna-form__row tna-form__checkbox">
                            <?php foreach (['Medieval', 'Early Modern', 'Empire and Industry', 'Victorians', 'Early 20th Century', 'Interwar', 'Second World War', 'Postwar'] as $item): ?>
                                <input type="checkbox" id="<?php echo $item ?>" name="<?php echo $item ?>" value="yes"
                                       checked>
                                <label for="<?php echo $item ?>"><?php echo $item ?></label>
                            <?php endforeach; ?>
                        </div>
                        <div class="tna-form__row tna-form__checkbox">
                            <input type="submit" value="Refine" class="tna-button">
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</main>
</body>
</html>
