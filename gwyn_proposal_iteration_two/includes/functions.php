<?php

$enhanced = isset($_COOKIE['enhanced']) ? true : false;

if (isset($_GET['enhanced'])) {
    if ($_GET['enhanced'] == 'true') {
        setcookie('enhanced', 'true', time() + 3600);
        $enhanced = true;
    }
    if ($_GET['enhanced'] == 'false') {
        setcookie('enhanced', null, 1);
        $enhanced = false;
    }
}





