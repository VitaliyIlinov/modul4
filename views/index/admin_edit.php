<div class="container">
<h3>Edit page</h3>
<form method="post" action="">
    <input type="hidden" name="id" value="<?=$data['id_news']?>" />
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" id="title" name="title" value="<?=$data['title_news']?>" class="form-control" />
    </div>
    <div class="form-group">
        <label for="content">content</label>
        <textarea rows="13" id="content" name="content" class="form-control"><?=$data['content_news']?></textarea>
    </div>
    <div class="form-group">
        <label for="title">Id Category</label>
        <input type="text" id="title" name="id_category" value="<?=$data['id_category']?>" class="form-control" />
    </div>
    <div class="form-group">
        <label for="is_published">Publish</label>
        <input type="checkbox" id="is_published" name="is_published" <?php if ($data['is_published']) { ?>checked="checked" <?php } ?> />
    </div>
    <input type="submit" class="btn btn-success"/>
</form>
</div>