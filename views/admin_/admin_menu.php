<ol class="breadcrumb">
    <li><a href="/admin">Home</a></li>
    <li><a href="/admin/<?=App::getRoutes()->getController()?>"><?=App::getRoutes()->getController()?></a></li>
    <li class="active"><a href="/admin/<?=App::getRoutes()->getAction()?>"></a><?=App::getRoutes()->getAction()?></li>
</ol>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2">
            <ul class="nav nav-pills nav-stacked">
                <li><a href="/admin/">Главная</a></li>
                <li><a href="#">Новости <span class="glyphicon glyphicon-chevron-down"></span></a>
                    <ul class="tt nav nav-pills nav-stacked">
                        <li><a href="/admin/news/list/">Список новостей</a></li>
                        <li><a href="/admin/news/add/">Добавить новость</a></li>
                        <li><a href="/admin/news/tag">Список тегов</a></li>
                        <li><a href="/admin/news/addtag">Добавить тег</a></li>
                    </ul>
                </li>
                <li><a href="#">Комментарии<span class="badge">4</span><span class="glyphicon glyphicon-chevron-down"></span></a>
                    <ul class="tt nav nav-pills nav-stacked">
                        <li><a href="#">Список комментариев</a></li>
                    </ul>
                </li>
                <li><a href="#">Рекламные блоки</a></li>
                <li><a href="#">Меню<span class="glyphicon glyphicon-chevron-down"></span></a>
                    <ul class="tt nav nav-pills nav-stacked">
                        <li><a href="#">Редактировать меню</a></li>
                        <li><a href="#">Изменить фон шапки</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="col-sm-9 col-md-10">
            <?php include $this->path; ?>
        </div>
    </div>
</div>
