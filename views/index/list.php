<div class="starter-template">
    <?php
    foreach ($data as $category => $item) {
        $b[$item['category_name']] = $item['id_category'];
    } ?>
    <?php foreach ($b as $key => $item): ?>
        <h2><a href="/category/list/<?= $item ?>"><?= $key ?></a></h2>
        <?php foreach ($data as $category): ?>
            <?php if ($category['id_category'] == $item): ?>
                <ul class="list-unstyled">
                    <li><a href="/news/list/<?= $category['id_news'] ?>"><?= $category['title_news']; ?></a></li>
                </ul>
            <?php endif; ?>
        <?php endforeach; ?>
    <?php endforeach; ?>
</div>
<div class="slider">
    <ul>
        <?php for ($i = 0; $i < 4; $i++) { ?>
            <li>
                <a href="/category/list/<?= $data[$i]['id_category']; ?>">
                    <img src="/webroot/image/<?= $data[$i]['image_news']; ?>"></a>
            </li>
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
