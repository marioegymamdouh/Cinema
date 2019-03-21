$(function () {
    var pathArray = window.location.pathname.split('/');
    if (window.location.href.indexOf("edit") > -1){
        $('form').attr('action', 'movie/editApi/');
        $.ajax({
            type: "post",
            url:  'movie/show/' + pathArray[5],
            success: function (data) {
                if (data.length < 3) window.location.href = 'movie/';
                else {
                    var movie = JSON.parse(data);
                    $('#id').val(movie[0]['id']);
                    $('#name').val(movie[0]['name']);
                }
            }
        });
    }
});