function confirmDelete() {
    if(confirm("delete this item?")){
        return true;
    }else{
        return false;
    }
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

