<div class="starter-template">
<?php if (isset($data['category_list']))  : ?>
    <h2>Категории новостей</h2>
    <ul>
        <?php foreach ($data['category_list'] as $key=>$value): ?>
            <li><a href="/category/list/<?= $key; ?>"><?= $value; ?></a></li>
        <?php endforeach; ?>
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
