<!--<h2 class="sub-header">News:</h2>-->
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Title:</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($data as $key => $value) : ?>
            <?php if ($key === 'count') break; ?>
            <tr>
                <td><?= $value['title_news'] ?></td>
                <td align="right">
                    <a href="/admin/index/edit/<?= $value['id_news'] ?>">
                        <button class="btn btn-sm btn-primary">edit</button>
                    </a>
                    <a href="/admin/index/delete/<?= $value['id_news'] ?>" onclick="return confirmDelete();">
                        <button class="btn btn-sm btn-warning">delete</button>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
        <tbody>
    </table>
</div>
<br/>
<?php if (!isset($_GET['pages'])) $_GET['pages'] = 1; ?>
<ul class="pagination pagination-sm">
    <?php for ($j = 1; $j <= ($data['count']); $j++) : ?>
        <li <?= ($j == $_GET['pages']) ? 'class=active' : ''; ?>><a
                href="/admin/index/list/?pages=<?= $j; ?>"><?= $j; ?></a></li>
    <?php endfor; ?>
</ul>
