<!--        --><?php
//        echo "<pre>";
//        print_r($data);
//        echo "</pre>";
//        ?>
<?php if (!isset($data['count'])): ?>
    <div style="min-height: 300px;">
        <h2 style="text-align: center;"><?= $data['title_news']; ?></h2>
        <div><?= $data['content_news']; ?></div>
        <?php if ($data['image_news']): ?>
            <div><img src="/webroot/image/<?= $data['image_news']; ?>"></div>
        <?php endif; ?>
        <br/>
    </div>
    <?php if (isset($data['tags'])): ?>
        <h3>Tags:</h3>
        <?php foreach ($data['tags'] as $key => $value): ?>
            <a href="/news/tag/<?= $key; ?>"> <input type="button" class="btn btn-primary btn-xs"
                                                     value="<?= $value; ?>"></a>
        <?php endforeach; ?>
    <?php endif; ?>
    <div style="text-align: right;">Количество просмотров: <?= $data['cnt_visit']; ?> Читают:<span id="read"></span>
    </div>
    <h3> Messages: <span class="badge"><?= $data['comments']['count']; ?></span></h3>
    <?php if (Session::get('login')) : ?>
            <form method="post" id="comment_form" action="">
                <div class="form-group">
                    <textarea rows="3" placeholder="Написать комментарий...." name="comment"
                              class="form-control"></textarea>
                </div>
                <input type="hidden" id="id_news" value="<?= $data['id_news'] ?>">
                <input type="hidden" name="id_parent" id="id_parent" value="0">
                <button type="submit" name="submit" class="btn btn-info btn-sm"><a href="#"></a> Добавить коммент
                </button>
                <button type="reset" class="btn btn-info btn-sm">Отмена</button>
            </form>
    <?php else : ?>
        <div style="margin-bottom: 50px;"><a href="/users/login/">Войдите</a>,чтобы оставить комментарий</div>
    <?php endif; ?>

        <?php if ($data['comments']['count']): ?>

            <?php foreach ($data['comments'] as $key => $value): ?>
                <?php if ($key === 'count') break; ?>

                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">Написал: <a><?= $value['login'] ?></a>Дата\Время:<?= $value['date_time'] ?></h3>
                    </div>
                    <div class="panel-body"><?= $value['comment'] ?></div>
                    <div class="panel-footer" style="padding: 4px 15px; overflow: hidden;">
                        <div style="float:left;">
                            <?php if (Session::get('login')):?>
                            <a id="answer">Ответить</a>
                            <?php endif;?>
                        </div>
                        <div style="float: right;">
                            <input type="hidden" id="id_comment" value="<?= $value['id_comment'] ?>">
                            <input type="hidden" id="id_user" value="<?= $value['id_user'] ?>">
                            <input type="hidden" id="id_news" value="<?= $value['id_news'] ?>">
                            <input type="hidden" id="id_parent" value="<?= $value['id_comment'] ?>">

                            <button type="button" id="like" class="btn btn-default btn-xs">Like:
                            <span class="glyphicon glyphicon-thumbs-up"
                                  aria-hidden="true"><?= $value['cnt_like'] ?></span>
                            </button>
                            <button type="button" id="dislike" class="btn btn-default btn-xs">Dislike:
                            <span class="glyphicon glyphicon-thumbs-down"
                                  aria-hidden="true"><?= $value['cnt_dislike'] ?></span>
                            </button>
                        </div>
                    </div>
                </div>

                <?php if (isset($value['childs'])): ?>
                    <?php foreach ($value['childs'] as $key => $value): ?>
                        <div class="panel panel-info" style="margin-left: 80px;">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    Написал: <a><?= $value['login'] ?></a>
                                    Дата\Время:<?= $value['date_time'] ?>
                                </h3>
                            </div>
                            <div class="panel-body"><?= $value['comment'] ?></div>
                            <div class="panel-footer" style="padding: 4px 15px; overflow: hidden;">
<!--                                <div style="float:left;">-->
<!--                                    --><?php //if (Session::get('login')):?>
<!--                                        <a id="change">Изменить</a>-->
<!--                                    --><?php //endif;?>
<!--                                </div>-->
                                <div style="float: right;">
                                    <input type="hidden" id="id_comment" value="<?= $value['id_comment'] ?>">
                                    <input type="hidden" id="id_user" value="<?= $value['id_user'] ?>">
                                    <input type="hidden" id="id_news" value="<?= $value['id_news'] ?>">
                                    <input type="hidden" id="id_parent" value="<?= $value['id_parent'] ?>">

                                    <button type="button" id="like" class="btn btn-default btn-xs">Like:
                                    <span class="glyphicon glyphicon-thumbs-up"
                                          aria-hidden="true"><?= $value['cnt_like'] ?></span>
                                    </button>
                                    <button type="button" id="dislike" class="btn btn-default btn-xs">Dislike:
                                    <span class="glyphicon glyphicon-thumbs-down"
                                          aria-hidden="true"><?= $value['cnt_dislike'] ?></span>
                                    </button>
                                </div>
                            </div>
                        </div>

                    <?php endforeach; ?>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php endif; ?>


<?php else: ?>
    <div style="min-height: 200px; margin-top: 35px;">
        <ul class="list-unstyled">
            <?php foreach ($data as $key => $value): ?>
                <li><a href="/news/list/<?= $value['id_news']; ?>"><?= $value['title_news']; ?> </a></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <?php if (!isset($_GET['pages'])) $_GET['pages'] = 1; ?>
    <ul class="pagination">
        <?php for ($j = 1; $j <= ($data['count']); $j++) : ?>
            <li <?= ($j == $_GET['pages']) ? 'class=active' : ''; ?>><a
                    href="/news/list/?pages=<?= $j; ?>"><?= $j; ?></a></li>
        <?php endfor; ?>
    </ul>
<?php endif; ?>


</div>

