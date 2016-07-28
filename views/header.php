<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modul4</title>
    <link rel="stylesheet" href="/webroot/css/style.css">
    <script>src = "/webroot/js/main.js" ></script>
    <!--    <link rel="stylesheet" href="/webroot/js/main.js">-->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
</head>
<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">My_project</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a class="active" href="/category/list">Категории новостей</a></li>
                <li><a href="/news/list/">Список новостей</a></li>
                <li><a href="/contact/">Contact US</a></li>
            </ul>
        </div><!--/.nav-collapse -->

</nav>
<?php if (Session::hasFlash()) { ?>
<div class="starter-template">
        <div class="alert alert-info" role="alert">
            <?php Session::flash(); ?>
        </div>
</div>
<?php } ?>
