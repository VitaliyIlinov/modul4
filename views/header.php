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
<div class="container">
    <nav class="navbar navbar-inverse navbar-fixed-top">

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
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Меню
                        <span class="caret"></span></a>
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
                <?php if (Session::get('login')): ?>
                    <li><a href="/">Hello <?= Session::get('login'); ?></a></li>
                    <li><a href="/users/logout/">Logout</a></li>
                <?php else : ?>
                    <li><a href="/users/register/">Register</a></li>
                    <li><a href="/users/login/">login</a></li>
                <?php endif; ?>

            </ul>
            <form action="search.php" method="post" name="form" onsubmit="return false;"
                  class="navbar-form navbar-right" role="search">
                <div class="form-group">
                    <div class="btn-group">
                        <input type="text" autocomplete="off" id="search" data-toggle="dropdown" class="form-control"  placeholder="search"> </input>
                        <ul id="resSearch" class="dropdown-menu">
<!--                            <li><a href="/users/register/">test</a></li>-->
                        </ul>
                    </div>
                </div>
<!--                <button type="submit" class="btn btn-default">Поиск</button>-->
            </form>
    </nav>
</div>
<div class="left"></div>
<?php if (Session::hasFlash()) { ?>
    <div class="starter-template">
        <div class="alert alert-info" role="alert">
            <?php Session::flash(); ?>
        </div>
    </div>
<?php } ?>
<!--<script src="/webroot/js/main.js"></script>-->