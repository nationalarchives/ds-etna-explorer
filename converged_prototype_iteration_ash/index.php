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
                            <h1>Explore the collection through time</h1>
                        </div>
                        <div class="tna-page__entry">
                            <p>From The Domesday Book to recent Cabinet papers, 1,000 years of international history are
                                preserved in millions of records. Explore wars, revolutions, life stories and landmark
                                rulings, and iconic figures including Shakespeare, Queen Victoria, Gandhi and Churchill.</p>
                        </div>
                        <h2>Explore by time period</h3>
                            <p>Our experts have identified eight consecutive time periods, from medieval to postwar,
                                covering the full collection:</p>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h3 class="card-title"><a href="/results.php?featured_first=true&hide_records_without_image=true&era=medieval">Medieval</a></h3>
                                            <h4 class="card-subtitle mb-2 text-muted">974 - 1485</h4>
                                            <p class="card-text">William the Conqueror’s Domesday survey aimed to put every inch of his new
                                                kingdom on paper. But Anglo-Saxon and Medieval England can also be found in the Magna Carta
                                                and other treaties, charters, letters and financial records.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h3 class="card-title"><a href="/results.php?featured_first=true&hide_records_without_image=true&era=early-modern">Early modern</a></h3>
                                            <h4 class="card-subtitle mb-2 text-muted">1485 - 1750</h4>
                                            <p class="card-text">Follow the complex manoeuvres, plots and double dealings of the Tudor and
                                                Stuart courts and the Jacobite risings of 1715 and 1745, through our records in this period
                                                dominated by religious conflict and conspiracy.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h3 class="card-title"><a href="/results.php?featured_first=true&hide_records_without_image=true&era=empire-and-industry">Empire and Industry</a></h3>
                                            <h4 class="card-subtitle mb-2 text-muted">1750 - 1850</h4>
                                            <p class="card-text">Find out about the impact of the Industrial Revolution and how living and
                                                working conditions changed for many in Britain. Political protest and crime and punishment
                                                are key themes in our resources for this period.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h3 class="card-title"><a href="/results.php?featured_first=true&hide_records_without_image=true&era=victorians">Victorians</a></h3>
                                            <h4 class="card-subtitle mb-2 text-muted">1901 - 1918</h4>
                                            <p class="card-text">The British Empire, crime, punishment, leisure and advertising are all
                                                brought to life in our resources which are based on records from the second half of Queen
                                                Victoria’s reign.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h3 class="card-title"><a href="/results.php?featured_first=true&hide_records_without_image=true&era=early-20th-century">Early 20th Century</a></h3>
                                            <h4 class="card-subtitle mb-2 text-muted">1901 - 1918</h4>
                                            <p class="card-text">Read original documents relating to Suffragettes, the Russian Revolution
                                                and the First World War. Cabinet papers, battle plans, maps and unit war diaries chronicle
                                                the conflict between Europe’s great powers.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h3 class="card-title"><a href="/results.php?featured_first=true&hide_records_without_image=true&era=interwar">Interwar</a></h3>
                                            <h4 class="card-subtitle mb-2 text-muted">1939 - 1945</h4>
                                            <p class="card-text">Study records relating to the rise of dictators, the failure of
                                                international diplomacy and Britain’s preparations for the Second World War. Discover more
                                                about life in 1930s Britain including unemployment, slum clearance and leisure.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h3 class="card-title"><a href="/results.php?featured_first=true&hide_records_without_image=true&era=second-world-war">Second World War</a></h3>
                                            <h4 class="card-subtitle mb-2 text-muted">1939 - 1945</h4>
                                            <p class="card-text">Our records cover the history of the Second World War including the roles
                                                of Churchill, Roosevelt and Stalin. Find out more about the Holocaust and life on the Home
                                                Front.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h3 class="card-title"><a href="/results.php?featured_first=true&hide_records_without_image=true&era=postwar">Postwar</a></h3>
                                            <h4 class="card-subtitle mb-2 text-muted">1945 - 2020</h4>
                                            <p class="card-text">Discover Cold War reports from behind the Iron Curtain, find out what it
                                                was like to live in Attlee’s Britain or explore documents on Indian Partition.</p>
                                        </div>
                                    </div>
                                </div>
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