$(function () {
    var pathArray = window.location.pathname.split('/');
    if (window.location.href.indexOf("edit") > -1){
        $('form').attr('action', 'hall/editApi/');
        $.ajax({
            type: "post",
            url:  'hall/show/' + pathArray[5],
            success: function (data) {
                if (data.length < 3) window.location.href = 'hall/';
                else {
                    var hall = JSON.parse(data);
                    $('#id').val(hall[0]['id']);
                    $('#name').val(hall[0]['name']);
                    $('#seats').val(hall[0]['seats']);
                }
            }
        });
    }
});