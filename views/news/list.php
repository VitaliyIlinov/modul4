<div class="starter-template">
    <?php if (count($data) < 2): ?>
        <h2><?= $data[0]['title_news']; ?></h2>
        <div><?= $data[0]['content_news']; ?></div>
        <div><img src="/webroot/image/<?= $data[0]['image_news']; ?>"></div>
    <?php endif; ?>
    <?php if (count($data) > 2): ?>
        <ul>
            <?php for ($i = 0; $i < count($data); $i++) : ?>
                <li><a href="/news/list/<?= $data[$i]['id_news']; ?>"><?= $data[$i]['title_news']; ?></a></li>
            <?php endfor; ?>
        </ul>
    <?php endif; ?>
</div>


