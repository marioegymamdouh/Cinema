$(function () {
    $.ajax({
        type: "GET",
        url:  'show/show/',
        success: function (data) {
            JSON.parse(data).forEach(function (value) {
                $( "table" ).append(
                    '<tr>'
                    + '<td>' + value.id + '</td>'
                    + '<td>' + value.name + '</td>'
                    + '<td>' + value.duration + '</td>'
                    + '<td><a href="show/edit/' + value.id + '/" class="btn btn-info btn-sm">edit</a></td>'
                    + '<td><button class="delete btn btn-danger btn-sm" data-id="' + value.id + '">delete</button></td>'
                    + '</tr>'
                );
            })
        }
    });

    $(document).on('click', '.delete', function () {
        var parent = $(this).parent().parent();
        var id = $(this).data('id');
        $.ajax({
            type: "DELETE",
            url:  'show/delete/' + id ,
            success: function (data) {
                parent.remove();
            }
        });
    });
});