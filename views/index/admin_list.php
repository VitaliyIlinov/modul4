<div class="container">
    <h3>Admin</h3>
    <table class="table table-striped" style="width :700px;">
        <?php foreach ($data as $page_data) { ?>
            <tr>
                <td><b><?= $page_data['title_news'] ?></b></td>
                <td align="right">
                    <a href="/admin/index/edit/<?= $page_data['id_news'] ?>">
                        <button class="btn btn-sm btn-primary">edit</button>
                    </a>
                    <a href="/admin/index/delete/<?= $page_data['id_news'] ?>" onclick="return confirmDelete();">
                        <button class="btn btn-sm btn-warning">delete</button>
                    </a>
                </td>
            </tr>
        <?php } ?>
    </table>
    <br/>
    <div>
        <a href="/admin/index/add/">
            <button class="btn btn-sm btn-success">New page</button>
        </a>
    </div>
</div>