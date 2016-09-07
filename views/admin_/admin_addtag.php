    <h3>Add TAG:</h3>
    <form method="post" action="">
        <div class="form-group">
            <label for="title_news">Tag Name</label>
            <input type="text" id="title_news" name="tag_name" value="" class="form-control"/>
        </div>
        <input type="submit" class="btn btn-success"/>
    </form>

    
    <div class="col-md-12">
        <div class="row">
            <div class="control-group" id="fields">
                <label class="control-label" for="field1">
                    Nice Multiple Form Fields
                </label>
                <div class="controls">
                    <form role="form" autocomplete="off">
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
        </div>
    </div>