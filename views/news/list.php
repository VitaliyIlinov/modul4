<div class="container">
    <div class="starter-template" style="min-height:300px; ">
<!---->
<!--            --><?php
//            echo "<pre>";
//            print_r($data);
//            echo "</pre>";
//            ?>
        <?php if (!isset($data['count'])): ?>

            <h2><?= $data['title_news']; ?></h2>
            <div><?= $data['content_news']; ?></div>
            <?php if ($data['image_news']): ?>
                <div><img src="/webroot/image/<?= $data['image_news']; ?>"></div>
            <?php endif; ?>
            <br/>
            <?php if (isset($data['tags'])): ?>
                <?php foreach ($data['tags'] as $key => $value): ?>
                    <a href="/news/tag/<?= $key; ?>"> <input type="button" class="btn btn-primary"
                                                             value="<?= $value; ?>"></a>
                <?php endforeach; ?>
            <?php endif; ?>
<div>Количество просмотров: <?=$data['cnt_visit'];?>   Читают:<span id="read"></span></div>
        <?php else: ?>
            <ul class="list-unstyled">
                <?php foreach ($data as $key => $value): ?>
                    <li><a href="/news/list/<?= $value['id_news']; ?>"><?= $value['title_news']; ?> </a></li>
                <?php endforeach; ?>
            </ul>
    </div>
            <?php if (!isset($_GET['pages'])) $_GET['pages'] = 1; ?>
            <ul class="pagination">
                <?php for ($j = 1; $j <= ($data['count']); $j++) : ?>
                    <li <?= ($j == $_GET['pages']) ? 'class=active' : ''; ?>><a
                            href="/news/list/?pages=<?= $j; ?>"><?= $j; ?></a></li>
                <?php endfor; ?>
            </ul>
        <?php endif; ?>

</div>

