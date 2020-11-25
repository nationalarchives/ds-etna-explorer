<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All records</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/second-world-war.css">
    <link rel="stylesheet" href="styles/featured.css">
    <link rel="stylesheet" href="styles/style.css">
    <link rel='stylesheet' id='tna-google-fonts-css'
          href='https://fonts.googleapis.com/css?family=Open+Sans%3A400%2C400i%2C700%2C700i%7CRoboto%3A400%2C700&#038;display=swap&#038;ver=5.4.2'
          type='text/css' media='all'/>
    <link rel="stylesheet" id="tna-google-fonts-css" href="https://fonts.googleapis.com/css?family=Open+Sans%3A400%2C400i%2C700%2C700i%7CRoboto+Mono%3A400%2C700&amp;display=swap&amp;ver=5.4.4" type="text/css" media="all">
</head>
<body class="css">
<a href="index.php" class="tna-button">
    Home
</a>
<button id="toggleCSS" class="tna-button">
    Toggle CSS
</button>

<main role="main">
    <div class="container">

        <h1>All records from our collection</h1>
        <p class="lead">From The Domesday Book to recent Cabinet papers, 1000 years of international history are preserved in millions of
            records. Explore wars, revolutions, life stories and landmark rulings, and iconic figures including Shakespeare, Queen Victoria, Gandhi
            and Churchill.
        </p>
        <!-- Three columns of text below the carousel -->

        <div class="showcase">
            <h2 class="text-center">Most popular records</h2>
            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-subtitle mb-2 text-muted">AIR 41/16</p>
                            <h3 class="card-title"><a href="">The Air Defence of Great Britain: appendices and maps</a></h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-subtitle mb-2 text-muted">AIR 41/16</p>
                            <h3 class="card-title"><a href="">The Air Defence of Great Britain: appendices and maps</a></h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-subtitle mb-2 text-muted">AIR 41/16</p>
                            <h3 class="card-title"><a href="">The Air Defence of Great Britain: appendices and maps</a></h3>
                        </div>
                    </div>
                </div>
            </div><!-- /.row -->
        </div>

        <div id="text-visualisation">
            <h3>In this time period: </h3>
            <ul>
                <li>167,837 records were created. This makes up 2.5% of our total collection of 7,133,847 records.</li>
                <li>The year 1944 had the most records created in this period, totalling 78,231.</li>
                <li>The median of records released per year in this period was 48,695.</li>
            </ul>
        </div>

        <div class="tna-button refine-results">
            <span>Refine results</span>
        </div>

        <div class="refine-results-form">
            <form class="tna-form" action="second-world-war.php" method="get">
                <fieldset>
                    <div class="form-section-title">
                        <span>Filters</span>
                    </div>
                    <div class="tna-form__row">
                        <div class="filter">
                            <label for="digitised">Digitised</label>
                            <input type="checkbox" id="digitised" name="digitised"
                                   value="">
                        </div>
                        <div class="filter">
                            <label for="filter-1">Filter 1</label>
                            <input type="checkbox" id="filter-1" name="filter-1"
                                   value="">
                        </div>
                        <div class="filter">
                            <label for="filter-2">Filter 2</label>
                            <input type="checkbox" id="filter-2" name="filter-2"
                                   value="">
                        </div>
                        <div class="filter">
                            <label for="filter-3">Filter 3</label>
                            <input type="checkbox" id="filter-3" name="filter-3"
                                   value="">
                        </div>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-section-title">
                        <span>Refine years</span>
                    </div>
                    <div class="tna-form__row">
                        <label for="start-year">Start year</label>
                        <input type="text" pattern="\d{4}"  id="start-year" name="start-year" placeholder="YYYY"
                               value="">
                    </div>
                    <div class="tna-form__row">
                        <label for="end-year">End year</label>
                        <input type="text" pattern="\d{4}" id="end-year" name="end_year" placeholder="YYYY"
                               value="">
                    </div>
                </fieldset>
                <fieldset>
                    <div class="tna-form__row">
                        <input class="tna-button" id="submit-btn" type="submit" value="Refine">
                    </div>
                </fieldset>
            </form>
        </div>

        <h3>167,837 records available</h3>


        <div class="masonry">
            <div class="item card">
                <h3><a href="">Card</a></h3>
            </div>
            <div class="item card">
                <h3><a href="">Card</a></h3>
            </div>
            <div class="item card">
                <h3><a href="">Card</a></h3>
            </div>
            <div class="item card">
                <h3><a href="">Card</a></h3>
            </div>
            <div class="item card">
                <h3><a href="">Card</a></h3>
            </div>
            <div class="item card">
                <h3><a href="">Card</a></h3>
            </div>
            <div class="item card">
                <h3><a href="">Card</a></h3>
            </div>
            <div class="item card">
                <h3><a href="">Card</a></h3>
            </div>
            <div class="item card">
                <h3><a href="">Card</a></h3>
            </div>
            <div class="item card">
                <h3><a href="">Card</a></h3>
            </div>
        </div>

    </div>
</main>
</body>
<footer>
    <script src="scripts/script.js"></script>
    <script
        src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
        crossorigin="anonymous"></script>
    <script src="scripts/refine.js"></script>
</footer>
</html>
