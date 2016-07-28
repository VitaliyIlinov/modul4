<div class="container">
    <h3>Add page</h3>
    <form method="post" action="">
        <div class="form-group">
            <label for="title_news">Title</label>
            <input type="text" id="title_news" name="title_news" value="" class="form-control"/>
        </div>
        <div class="form-group">
            <label for="id_category">ID Category</label>
            <input type="text" id="id_category" name="id_category" value="" class="form-control"/>
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea rows="10" id="content_news" name="content_news" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="is_published">is_published</label>
            <input type="checkbox" id="is_published" name="is_published" checked="checked"/>
        </div>
        <input type="submit" class="btn btn-success"/>
    </form>
</div>