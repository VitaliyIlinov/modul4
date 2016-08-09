<div class="starter-template" style="min-height: 265px;">
    <ul class="list-unstyled">
        <?php for ($i = 0; $i < count($data); $i++) : ?>
            <?php if (isset($data[$i]['count'])) break; ?>
            <li><a href="/news/list/<?= $data[$i]['id_news']; ?>"><?= $data[$i]['title_news']; ?></a></li>
        <?php endfor; ?>
    </ul>
</div>

<?php if (!isset($_GET['pages'])) $_GET['pages'] = 1; ?>
<?php if (isset($data[$i]['count']))  : ?>
    <ul class="pagination">
        <?php for ($j = 1; $j <= ($data[$i]['count']); $j++) : ?>
            <li <?php if ($_GET['pages'] == $j): ?>class="active"<?php endif; ?>><a
                    href="?pages=<?= $j; ?>"><?= $j; ?></a></li>
        <?php endfor; ?>
    </ul>
<?php endif; ?>
