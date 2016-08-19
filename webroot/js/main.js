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

$(document).ready(function() {
    $('button#like').click(function(){
      //  alert('like');
        setVote('like', $(this));
    });

    $('button#dislike').click(function(){
        //alert('dislike')
        setVote('dislike', $(this));
    });

});

// type - тип голоса. Лайк или дизлайк
// element - кнопка, по которой кликнули
function setVote(type, element){
    // получение данных из полей
    //var id_user = $('#id_user').val();
    var temp = element.parent();
    var id_comment = temp.find('#id_comment').val();
    var id_news = temp.find('#id_news').val();
   // var id_user = temp.find('#id_user').val();
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
        success: function(data){
            // в случае, когда пришло success. Отработало без ошибок
            if(data.result == 'success'){
                // Выводим сообщение
                alert('Голос засчитан');
                // увеличим визуальный счетчик
                var count = parseInt(element.find('span').html());
                element.find('span').html(count+1);
            }else{
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

// $(document).ready(function () {
//     $(window).on('beforeunload', function () {
//         // document.write('<div>.....................</div>');  // HTML код в одну строчку!!!
//         return "Вы точно решили покинуть наш сайт?";
//     });
//
//     $('a').click(function () {
//         $(window).off('beforeunload');
//     });
// });

