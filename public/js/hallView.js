$(function () {
    $.ajax({
        type: "GET",
        url:  'hall/show/',
        success: function (data) {
            JSON.parse(data).forEach(function (value) {
                $( "table" ).append(
                    '<tr>'
                    + '<td>' + value.id + '</td>'
                    + '<td>' + value.name + '</td>'
                    + '<td>' + value.seats + '</td>'
                    + '<td><a href="hall/edit/' + value.id + '/" class="btn btn-info btn-sm">edit</a></td>'
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
            url:  'hall/delete/' + id ,
            success: function (data) {
                parent.remove();
            }
        });
    });
});