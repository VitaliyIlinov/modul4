<div class="container">
    <div class="starter-template" style="min-height:300px; ">
<!---->
<!--        --><?php
//        echo "<pre>";
//        print_r($data);
//        echo "</pre>";
//        echo count($data);
//        ?>
<?php if(!isset($data[0]['id_news'])) :?>
        <ul class="list-unstyled">
            <?php foreach ($data as $key => $value): ?>
                <li><a href="/news/tag/<?= $key; ?>"><?= $value ?> </a></li>
            <?php endforeach; ?>
        </ul>
        <?php else : ?>
    <ul class="list-unstyled">
        <?php foreach ($data as $key => $value): ?>
            <li><a href="/news/list/<?= $value['id_news']; ?>"><?= $value['title_news'] ?> </a></li>
        <?php endforeach; ?>
    </ul>
        <?php endif; ?>

    </div>
</div>