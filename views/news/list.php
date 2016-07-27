<div class="container">

    <div class="starter-template">
        <?php for ($i = 0;
                   $i < count($data);
                   $i++) { ?>
            <a href="/category/list/<?= $data[$i]['id_category']; ?>"><?= $data[$i]['category_name']; ?></a>
            <p><?= $data[$i]['title_news']; ?></p>
        <?php } ?>
    </div>
</div>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<div class="slider">
    <ul>
        <?php for ($i = 0; $i < 4; $i++) { ?>
            <li><a href="/category/list/<?= $data[$i]['id_category']; ?>"><img
                        src="/webroot/image/<?= $data[$i]['image_news']; ?>"></a></li>
        <?php } ?>
    </ul>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $(".slider").each(function () { // обрабатываем каждый слайдер
            var obj = $(this);
            $(obj).append("<div class='nav'></div>");
            $(obj).find("li").each(function () {
                $(obj).find(".nav").append("<span rel='" + $(this).index() + "'></span>"); // добавляем блок навигации
                $(this).addClass("slider" + $(this).index());
            });
            $(obj).find("span").first().addClass("on"); // делаем активным первый элемент меню
        });
    });
    function sliderJS(obj, sl) { // slider function
        var ul = $(sl).find("ul"); // находим блок
        var bl = $(sl).find("li.slider" + obj); // находим любой из элементов блока
        var step = $(bl).width(); // ширина объекта
        $(ul).animate({marginLeft: "-" + step * obj}, 500); // 500 это скорость перемотки
    }
    $(document).on("click", ".slider .nav span", function () { // slider click navigate
        var sl = $(this).closest(".slider"); // находим, в каком блоке был клик
        $(sl).find("span").removeClass("on"); // убираем активный элемент
        $(this).addClass("on"); // делаем активным текущий
        var obj = $(this).attr("rel"); // узнаем его номер
        sliderJS(obj, sl); // слайдим
        return false;
    });
</script>
