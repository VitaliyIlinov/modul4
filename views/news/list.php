<div class="starter-template">
    <h2><?= $data[0]['title_news']; ?></h2>
    <div><?= $data[0]['content_news']; ?></div>
    <?php if ($data[0]['image_news']): ?>
        <div><img src="/webroot/image/<?= $data[0]['image_news']; ?>"></div>
    <?php endif; ?>
    <?php if (count($data) > 1): ?>
        <?php foreach ($data[1]['tags'] as $key => $value): ?>
            <a href="/news/tag/<?= $value; ?>"> <input type="button" class="btn btn-primary" value="<?= $key; ?>"></a>
        <?php endforeach; ?>
    <?php endif; ?>
</div>



