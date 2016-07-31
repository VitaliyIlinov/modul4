<div class="starter-template">
<?php if (isset($data['category_list']))  : ?>
    <ul>
        <?php for ($i = 0; $i < count($data['category_list']); $i++) : ?>
            <li><a href="/category/list/<?= $data['category_list'][$i]['id_category']; ?>"><?= $data['category_list'][$i]['category_name']; ?></a></li>
        <?php endfor; ?>
    </ul>

<?php else : ?>

    <h2><?= $data[0]['category_name']; ?></h2>

        <?php for ($i = 0; $i < count($data); $i++) : ?>
            <ul>
                <li><a href="/news/list/<?= $data[$i]['id_news']; ?>"><?= $data[$i]['title_news']; ?></a></li>
            </ul>
        <?php endfor; ?>

<?php endif; ?>
</div>
