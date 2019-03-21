$(function () {
    $.ajax({
        type: "GET",
        url:  'duration/show/',
        success: function (data) {
            JSON.parse(data).forEach(function (value) {
                $( "ol" ).append(
                    '<li>' + value.duration + '</li>'
                );
            })
        }
    });
});