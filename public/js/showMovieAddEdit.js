$(function () {
    var pathArray = window.location.pathname.split('/');
    $.ajax({
        type: "GET",
        url:  'show/show/',
        success: function (data) {
            JSON.parse(data).forEach(function (value) {
                $( "#show" ).append(
                    '<option value="' + value.id + '">' + value.id + '</option>'
                );
            })
        }
    });
    $.ajax({
        type: "GET",
        url:  'movie/show/',
        success: function (data) {
            JSON.parse(data).forEach(function (value) {
                $( "#movie" ).append(
                    '<option value="' + value.id + '">' + value.name + '</option>'
                );
            })
        }
    });
    if (window.location.href.indexOf("edit") > -1){
        $('form').attr('action', 'showMovie/editApi/');

        $.ajax({
            type: "post",
            url:  'showMovie/show/' + pathArray[5],
            success: function (data) {
                if (data.length < 3) window.location.href = 'show/';
                else {
                    var show = JSON.parse(data);
                    $('#id').val(show[0]['id']);
                    $('#show').val(show[0]['showId']);
                    $('#movie').val(show[0]['movieId']);
                    $('#date').val(show[0]['date']);
                }
            }
        });
    }
});