<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <?php if ($enhanced): ?>
        <!-- Google fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700,700i|Roboto+Mono:400,700&display=swap"
              rel="stylesheet">

        <!-- Toolkit CSS -->
        <link rel="stylesheet" href="https://cdn.nationalarchives.gov.uk/toolkit/dist/css/navi.0.0.4.min.css">

        <!-- Styles -->
        <link rel="stylesheet" href="/styles/main.css">

    <?php endif ?>

    <div id="banner">
        This HTML-first prototype follows <a href="/front-end-design-and-build-process.jpg">this process</a>. Only when
        we have a solid basis to work from do we add CSS and JavaScript enhancements. <a
                href="<?php echo basename($_SERVER['PHP_SELF']) ?>?enhanced=<?php echo $enhanced ? 'false' : 'true' ?>">Toggle
            enhancements</a>
    </div>

    <title>Document</title>
</head>
