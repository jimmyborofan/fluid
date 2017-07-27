<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Example Framework Application for Fluid">
        <meta name="author" content="James Crawford, james.ra.crawford@gmail.com">
        <title><?= $title; ?></title>
        <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <script src="/js/jquery.js"></script>
        <script src="/js/jquery.ui.js"></script>
        <script src="/js/jquery.cookie.js"></script>
        <!-- Bootstrap (2) JS -->
        <script src="/js/bootstrap.min.js"></script>
        <!-- jQuery Form Validation (4) JS -->
        <script src="/js/jquery.form-validator.min.js"></script>
        <!-- Animate on scroll (4) JS -->
        <script src="/js/aos.js"></script>
        <!-- font-awesome JS (5) -->
        <script src="https://use.fontawesome.com/063bdb71b2.js"></script>
        <!-- Custom Box  JS -->
        <script src="/js/custom-box.min.js" type="text/javascript"></script>
        <script src="js/parallax.js" type="text/js" rel="javascript" ></script>
        <link href="/css/bootstrap.min.css" rel="stylesheet">
        <link href="/css/jquery.ui.css" rel="stylesheet">
        <!-- Custom - user styles & scripts  -->
        <link href="/css/style.css" rel="stylesheet" />
        <link href="/css/responsive.css" rel="stylesheet" />
        <script src="/js/custom.js" type="text/javascript"></script>
        <!-- Data Tables js files, do not remove these, if you do, a lot of functions will break
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/pdfmake-0.1.27/dt-1.10.15/af-2.2.0/b-1.3.1/b-colvis-1.3.1/b-html5-1.3.1/b-print-1.3.1/cr-1.3.3/r-2.1.1/rr-1.2.0/datatables.min.css"/> -->
        <script src="/js/<?= $view; ?>.js" type="text/javascript"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/v/bs/pdfmake-0.1.27/dt-1.10.15/af-2.2.0/b-1.3.1/b-colvis-1.3.1/b-html5-1.3.1/b-print-1.3.1/cr-1.3.3/r-2.1.1/rr-1.2.0/datatables.min.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="row header">
                <div class="col-sm-3"><a href="https://placeholder.com"><img src="http://via.placeholder.com/200x150"></a></div>
                <div class="col-sm-9"><h2><?= $title; ?></h2></div>
            </div>
        </div>
        <div class="row">
            <div class="leftBar col-sm-2"></div>
            <div class="content col-sm-8">