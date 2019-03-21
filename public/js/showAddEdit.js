$(function () {
    var pathArray = window.location.pathname.split('/');
    $.ajax({
        type: "GET",
        url:  'hall/show/',
        success: function (data) {
            JSON.parse(data).forEach(function (value) {
                $( "#hall" ).append(
                    '<option value="' + value.id + '">' + value.name + '</option>'
                );
            })
        }
    });
    $.ajax({
        type: "GET",
        url:  'duration/show/',
        success: function (data) {
            JSON.parse(data).forEach(function (value) {
                $( "#duration" ).append(
                    '<option value="' + value.id + '">' + value.duration + '</option>'
                );
            })
        }
    });
    if (window.location.href.indexOf("edit") > -1){
        $('form').attr('action', 'show/editApi/');

        $.ajax({
            type: "post",
            url:  'show/show/' + pathArray[5],
            success: function (data) {
                if (data.length < 3) window.location.href = 'show/';
                else {
                    var show = JSON.parse(data);
                    $('#id').val(show[0]['id']);
                    $('#hall').val(show[0]['hallId']);
                    $('#duration').val(show[0]['durationId']);
                }
            }
        });
    }
});