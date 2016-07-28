<div class="starter-template">
        <ul class="list-unstyled">
            <?php for ($i = 0; $i < count($data); $i++) : ?>
                <li><a href="/news/list/<?= $data[$i]['id_news']; ?>"><?= $data[$i]['title_news']; ?></a></li>
<!--                <div><img style="width: 200px; height: 200px;" src="/webroot/image/--><?//= $data[$i]['image_news']; ?><!--"></div>-->
            <?php endfor; ?>
        </ul>
</div>
<ul class="pagination">
    <li><a href="#">&laquo;</a></li>
    <li><a href="#">1</a></li>
    <li><a href="#">2</a></li>
    <li><a href="#">3</a></li>
    <li><a href="#">4</a></li>
    <li><a href="#">5</a></li>
    <li><a href="#">&raquo;</a></li>
</ul>


