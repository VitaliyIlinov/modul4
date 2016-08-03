<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <title>Modul4</title>
    <link rel="stylesheet" href="/webroot/css/style.css">
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
            <a class="navbar-brand" href="/">Project name</a>
        </div>
        <ul id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a class="active" href="/category/list">Категории новостей</a></li>
                <li><a href="/news/list/">Список новостей</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Выпадающее
                        меню <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Меню 1</a></li>
                        <li class="dropdown-submenu">
                            <a href="#">Выпадающее меню</a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Сабменю 1</a></li>
                                <li><a href="#">Сабменю 2</a></li>
                                <li><a href="#">Сабменю 3</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Меню 2</a></li>
                        <li><a href="#">Меню 3</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="/users/register/">Register</a></li>
                <li><a href="#">logout</a></li>
            </ul>
            <form class="navbar-form navbar-right">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default">Поиск</button>
            </form>

            <ul class="list-unstyled" id="search_result">
               
            </ul>

    </div>
</nav>

<div class="left"></div>
<?php if (Session::hasFlash()) { ?>
    <div class="starter-template">
        <div class="alert alert-info" role="alert">
            <?php Session::flash(); ?>
        </div>
    </div>
<?php } ?>
<script src="/webroot/js/main.js"></script>