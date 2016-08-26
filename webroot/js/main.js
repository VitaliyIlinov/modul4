function confirmDelete() {
    if (confirm("delete this item?")) {
        return true;
    } else {
        return false;
    }
}
$(function () {
    $("#search").keyup(function () {
        var search = $("#search").val();
        $.ajax({
            type: "POST",
            url: "/index/search",
            //url: "/search.php",
            data: {"search": search},
            //dataType : "json",
            cache: false,
            success: function (response) {
                $("#resSearch").html(response);
            }
        });
        return false;

    });
});

$(document).ready(function () {
    $('.panel-footer #answer').click(function () {
        var panel_info = $(this).closest('.panel');
        var id_parent = panel_info.find('#id_comment').val();
        $(panel_info).after($('#comment_form'));
        $('#comment_form #id_parent').val(id_parent);
        // $("button:reset").appendTo('.container h3');
        $("button:reset").click(function () {
            $('.panel').eq(0).before($('#comment_form'));
            $('#comment_form #id_parent').val(0);
        });
    });

    $("#comment_form").submit(function (event) {
        event.preventDefault();
        var $form = $(this);
        var id_parent = $form.find('#id_parent').val();
        var id_news = $form.find('#id_news').val();
        var comment = $form.find('textarea').val();
        var id_comment = $form.find('#id_comment').val();
        //alert(comment);
        $.post("/ajax/list/", {id_comment: id_comment,comment: comment, id_parent: id_parent, id_news: id_news},
            function (data) {
                var $elem = $($form).next()// оригинал элемента с закрепленным за ним массивом
                $clone = $elem.clone(true);
                $clone.find('.panel-heading > h3 ').html('Написал ' + data.login + ' Дата ' + data.date_time);
                $clone.find('.panel-body').html(data.comment);
                $clone.find('#like >span').html(data.cnt_like);
                $clone.find('#dislike > span').html(data.cnt_dislike);
                $clone.find('#id_comment').val(data.id_comment);
                $clone.find('#id_user').val(data.id_user);
                $clone.find('#id_news').val(data.id_news);
                $clone.find('#answer').html('Ответить');
                $clone.find('#change').remove();
                $clone.find('.panel-footer').closest("div").append('<a id="change">Изменить</a>');
                // $clone.appendTo($('#comment_form'));
                $('#comment_form').after($clone);
                if (id_parent != 0) {
                    $clone.css({'margin-left': '80px'});
                    $clone.find('#answer').remove();
                }
                $('#comment_form > div > textarea').val('');
                var $cnt = parseInt($('.badge').text());
                $('.badge').html($cnt + 1);

                $('#change').click(function () {
                    //alert('f');
                    //$('#change').html('OK');
                    //$('#change').attr('id','ok');
                    var comment = $(this).parent().prev();
                    var id_comment=$(this).prev().find('#id_comment').val();
                    $(comment).after($('#comment_form'));
                    $(this).after($('#comment_form'));
                    $('#comment_form').find('textarea').val(comment.html());
                    $('#comment_form').append("<input type='hidden' id='id_comment' value='"+ id_comment +"'>");
                    //$(comment).after("<textarea>"+comment.html() +"</textarea>");
                });

                var t = setInterval(function () {
                    $('#change').remove();
                    clearInterval(t);
                }, 600000);
            }
            , 'json'
        );
    });
});


$(document).ready(function () {
    $('button#like').click(function () {
        // alert( $(this).parent());
        setVote('like', $(this));
    });

    $('button#dislike').click(function () {
        //alert('dislike')
        setVote('dislike', $(this));
    });

});

// type - тип голоса. Лайк или дизлайк
// element - кнопка, по которой кликнули
function setVote(type, element) {
    // получение данных из полей
    //var id_user = $('#id_user').val();
    var temp = element.parent();
    var id_comment = temp.find('#id_comment').val();
    var id_news = temp.find('#id_news').val();
    // var id_user = temp.find('#id_usler').val();
    var id_parent = temp.find('#id_parent').val();
    $.ajax({
        // метод отправки
        type: "POST",
        // путь до скрипта-обработчика
        url: "/ajax/list",
        // какие данные будут переданы
        data: {
            'id_comment': id_comment,
            'id_news': id_news,
            'type': type
        },
        // тип передачи данных
        dataType: "json",
        // действие, при ответе с сервера
        success: function (data) {
            // в случае, когда пришло success. Отработало без ошибок
            if (data.result == 'success') {
                // Выводим сообщение
                alert('Голос засчитан');
                // увеличим визуальный счетчик
                var count = parseInt(element.find('span').html());
                element.find('span').html(count + 1);
            } else {
                // вывод сообщения об ошибке
                alert(data.result);
            }
        }
    });
}

$(document).ready(function () {
    $('#read').text(randomInteger(1, 5));
});

function randomInteger(min, max) {
    var rand = min + Math.random() * (max + 1 - min);
    rand = Math.floor(rand);
    return rand;
}
