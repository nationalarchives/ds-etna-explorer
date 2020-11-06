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
                        <h1>The medieval period</h1>
                    </div>
                    <div class="tna-page__entry">
                        <p>William the Conqueror’s Domesday survey aimed to put every inch of his new kingdom on paper.
                            But Anglo-Saxon and Medieval England can also be found in the Magna Carta and other
                            treaties, charters, letters and financial records that all combine to give us a picture of
                            government and life in the Anglo-Saxon and Medieval periods.</p>
                    </div>
                    <figure>
                        <img src="https://via.placeholder.com/1600x450?text=Time period specific infographic"
                             alt="Time period specific infographic">
                        <caption>How the collection is distributed over the centuries</caption>
                    </figure>
                </article>
            </main>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-2">
                <form class="tna-form">
                    <h2>Refinements</h2>
                    <fieldset>
                        <div class="tna-form__row">
                            <label for="start_date">Start date</label>
                            <input type="date" name="start_date" placeholder="YYYY" value="974">
                        </div>
                        <div class="tna-form__row">
                            <label for="end_date">End date</label>
                            <input type="date" name="end_date" placeholder="YYYY" value="1485">
                            <label for="">&nbsp;</label>
                            <input class="tna-button" type="submit" value="Show records">
                        </div>
                    </fieldset>
                </form>
            </div>
            <div class="col-xs-12 col-sm-10">
                <h2>Results</h2>
                <?php include 'includes/results.php' ?>
            </div>

        </div>
    </div>
</div>
</body>
</html>
