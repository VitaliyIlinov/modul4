<div class="container">
<h2><?=$data[0]['category_name'] ;?></h2>
    <div class="starter-template">
        <?php for ($i = 0;
                   $i < count($data);
                   $i++) { ?>
            <ul>
                <li><a href="/news/list/<?= $data[$i]['id_news']; ?>"><?= $data[$i]['title_news']; ?></a></li>
            </ul>
        <?php } ?>
    </div>
</div>