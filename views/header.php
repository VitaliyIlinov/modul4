<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <title>Modul4</title>
    <link rel="stylesheet" href="/webroot/css/style.css">
    <script src = "/webroot/js/main.js" ></script>
    <!--    <link rel="stylesheet" href="/webroot/js/main.js">-->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
</head>
<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $(window).on('beforeunload', function() {
               // document.write('<div>.....................</div>');  // HTML код в одну строчку!!!
                return "Вы точно решили покинуть наш сайт?";
            });

            $('a').click(function() {
                $(window).off('beforeunload');
            });
        });
</script>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="/">Project name</a>
        </div>

        <div id="navbar">
            <ul class="nav navbar-nav">
                <li><a class="active" href="/category/list">Категории новостей</a></li>
                <li><a href="/news/list/">Список новостей</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Выпадающее меню <span class="caret"></span></a>
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

            <form class="navbar-form navbar-right">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">login</a></li>
                <li><a href="#">logout</a></li>
            </ul>
        </div><!--/.nav-collapse -->
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
