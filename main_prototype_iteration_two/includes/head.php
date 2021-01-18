<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">


      <?php

      if (!isset($_COOKIE['disabled_enhancements'])) {
            $_COOKIE['disabled_enhancements'] = "false";
      }

      if ($_COOKIE["disable_enhancements"] != "true") {
            echo '
            <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700,700i|Roboto+Mono:400,700&display=swap"
          rel="stylesheet">

    <!-- Toolkit CSS -->
    <link rel="stylesheet" href="https://cdn.nationalarchives.gov.uk/toolkit/dist/css/navi.0.0.4.min.css">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
            <link rel="stylesheet" href="/styles/mb.css">
            <link rel="stylesheet" href="/styles/main.css">';
      }
      ?>

      <title>Collection Explorer</title>
</head>