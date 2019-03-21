$(function () {
    $.ajax({
        type: "GET",
        url:  'showMovie/show/',
        success: function (data) {
            console.log(data);
            JSON.parse(data).forEach(function (value) {
                $( "table" ).append(
                    '<tr>'
                    + '<td>' + value.id + '</td>'
                    + '<td>' + value.showId + '</td>'
                    + '<td>' + value.movieName + '</td>'
                    + '<td>' + value.date + '</td>'
                    + '<td><a href="showMovie/edit/' + value.id + '/" class="btn btn-info btn-sm">edit</a></td>'
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
            url:  'showMovie/delete/' + id ,
            success: function (data) {
                parent.remove();
            }
        });
    });
});