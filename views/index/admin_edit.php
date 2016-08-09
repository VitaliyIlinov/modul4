<div class="container">
    <h3>Edit page</h3>
    <form method="post" action="">
        <input type="hidden" name="id_news" value="<?= $data['id_news'] ?>"/>
        <div class="form-group">
            <label for="title_news">Title</label>
            <input type="text" id="title_news" name="title_news" value="<?= $data['title_news'] ?>"
                   class="form-control"/>
        </div>
        <div class="form-group">
            <label for="content_news">content</label>
            <textarea rows="13" id="content_news" name="content_news"
                      class="form-control"><?= $data['content_news'] ?></textarea>
        </div>
        <div class="form-group">
            <label for="id_category">Category</label>
            <select class="form-control" name="id_category" id="id_category">
                <?php foreach ($data['category'] as $key=>$value): ?>
                    <option value="<?=$key;?>"
                            <?=($data['id_category']==$key)? 'selected':'';?> >
                        <?=$value;?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="checkbox">
            <p style="font-weight:600;">Tags</p>
            <?php foreach ($data['tags'] as $key=>$value): ?>
                <label class="checkbox-inline">
                    <input type="checkbox" name="tags[]" <?=isset($data['is_tags'][$key]) ? 'checked' : ''; ?> value="<?= $key; ?>"><?=$value; ?>
                </label>
<!--                <input class="checkbox" type="checkbox" name="tag[]" value="--><?//= $data['tags'][$i]['id_tag']; ?><!--">--><?//= $data['tags'][$i]['tag_name']; ?><!--<br/>-->
            <?php endforeach; ?>
        </div>
        <div class="form-group">
            <label for="is_published">Publish</label>
            <input type="checkbox" id="is_published" name="is_published"
                   <?php if ($data['is_published']) { ?>checked="checked" <?php } ?> />
        </div>
        <div class="form-group">
            <label for="is_analitic">Analitic</label>
            <input type="checkbox" id="is_analitic" name="is_analitic"
                   <?php if ($data['is_analitic']) { ?>checked="checked" <?php } ?> />
        </div>
        <input type="submit" class="btn btn-success"/>
    </form>
</div>
<?php
echo "<pre>";
print_r($data);
?>