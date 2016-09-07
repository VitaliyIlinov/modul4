    <h3>Admin</h3>
    <table class="table table-striped" style="width :600px;">
        <?php foreach ($data as $key=>$value) : ?>
          <?php if ($key==='count')break ;?>
            <tr>
                <td><b><?= $value['title_news'] ?></b></td>
                <td align="right">
                    <a href="/admin/index/edit/<?=$value['id_news']?>"><button class="btn btn-sm btn-primary">edit</button></a>
                    <a href="/admin/index/delete/<?=$value['id_news']?>" onclick="return confirmDelete();"><button class="btn btn-sm btn-warning">delete</button></a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <br/>
    <?php if (!isset($_GET['pages'])) $_GET['pages'] = 1; ?>
    <ul class="pagination">
        <?php for ($j = 1; $j <= ($data['count']); $j++) : ?>
            <li <?= ($j==$_GET['pages'])? 'class=active': '' ;?>><a href="/admin/index/list/?pages=<?=$j;?>"  ><?=$j;?></a></li>
        <?php endfor; ?>
    </ul>
    <div>
        <a href="/admin/index/add/">
            <button class="btn btn-sm btn-success">New page</button>
        </a>
    </div>
   