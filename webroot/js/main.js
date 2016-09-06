function confirmDelete() {
    if (confirm("delete this item?")) {
        return true;
    } else {
        return false;
    }
}
(function($) {
    $(function() {
        if (!$.cookie('smartCookies')) {

            function getWindow(){
                $('#boxUserFirstInfo').arcticmodal({
                    closeOnOverlayClick: true,
                    closeOnEsc: true
                });
                $.cookie('smartCookies', true, {
                    expires: 7,
                    path: '/'
                });
            };
            setTimeout (getWindow, 7000);
        }
    })
})(jQuery);

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

$('.col-sm-push-8 > .banner').attr('data-placement', 'left');
$('.banner').tooltip();
$('.banner').on({
    mouseenter: function () {
        var price = $(this).find('p > span');
        price.html(price.html() * 0.9);
        var currentFontSizeNum = parseFloat(price.css('fontSize'));
        var newFontSize = currentFontSizeNum * 1.5;
        price.css('fontSize', newFontSize);
        (price.css('color', 'red'));
    },
    mouseleave: function () {
        var price = $(this).find('p > span');
        price.html(price.html() / 0.9);
        price.css('fontSize', '');
        price.css('color', '');
    }
});

$('.banner >p>a').click(function () {
    var id = $(this).parent().attr("id");
    $.post("/index/list/", {promotion_id: id});
});

$(document).ready(function () {
    $("#comment_form").submit(function (event) {
        event.preventDefault();
        var $form = $(this).prev();
        var id_parent = $form.find('#id_comment').val();
        var id_news = $(this).find('#id_news').val();
        var comment = $(this).find('textarea').val();
        $.post("/ajax/list/", {comment: comment, id_parent: id_parent, id_news: id_news},
            function (data) {
                var $cnt = parseInt($('.badge').text());
                $('.badge').html($cnt + 1);
                var data = $(data);
                var elements=data.find('.panel');
                $('.panel').remove();
                $('#comment_form textarea').val('');
                var comments='';
                elements.each(function( index ) {
                   comments+=( elements.get(index).outerHTML );
                });
                 $('#comment_form').after( comments );
            }
          //  , 'json'
        );
    });
});
$( document ).on('click','.panel-footer #answer', function () {
    var panel_info = $(this).closest('.panel');
    $(panel_info).after($('#comment_form'));
    $("button:reset").click(function () {
        $('.panel').eq(0).before($('#comment_form'));
    });
});

$(document).ready(function () {
    $(document).on('click','button#like',function () {
            setVote('like', $(this));
    });

    $(document).on('click','button#dislike',function () {
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
    var id_parent = temp.find('#id_parent').val();
    $.ajax({
        // метод отправки
        type: "POST",
        // путь до скрипта-обработчика
        url: "/ajax/list",
        // какие данные будут переданы
        data: {
            'id_comment': id_comment,
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
    setInterval (function(){
        $('#read').text(randomInteger(1, 5));
    }, 3000);
});

function randomInteger(min, max) {
    var rand = min + Math.random() * (max + 1 - min);
    rand = Math.floor(rand);
    return rand;
}
