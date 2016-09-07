<div class="table-responsive">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID:</th>
            <th>Name:</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($data['tags'] as $key => $value) : ?>
            <tr>
                <td><?= $key ?></td>
                <td><?= $value ?></td>
                <td align="right">
                    <a href="/admin/news/edit/<?= $key ?>">
                        <button class="btn btn-sm btn-primary">edit</button>
                    </a>
                    <a href="/admin/news/delete/<?= $key ?>" onclick="return confirmDelete();">
                        <button class="btn btn-sm btn-warning">delete</button>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
        <tbody>
    </table>
</div>



<div class="control-group" id="fields">
    <label class="control-label" for="field1">
        Nice Multiple Form Fields
    </label>
    <div class="controls">
        <form method="post" role="form" autocomplete="off">
            <div class="entry input-group col-xs-3">


                <input class="form-control" name="fields[]" type="text" placeholder="Type something">
                <span class="input-group-btn">
              <button class="btn btn-success btn-add" type="button">
                  <span class="glyphicon glyphicon-plus"></span>
              </button>
                </span>
            </div>

        </form>
    </div>
    <br>
    <small>
        Press
        <span class="glyphicon glyphicon-plus gs"></span>
        to add another form field :)
    </small>
</div>
