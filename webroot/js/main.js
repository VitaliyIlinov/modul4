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
// window.onload=function (){
//     randomInteger(1,5);
//
// };

// $(document).ready(function(){
//
//     $('#read').text(function(){
//     var rand = min + Math.random() * (max + 1 - min);
//     rand = Math.floor(rand);
//     return rand;
//     });
// });
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

