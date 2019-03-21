$(function () {
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

    var movies;

    $(document).on('change','#date, #duration',function () {
        var date = $('#date').val();
        var duration = $('#duration').val();
        if (date !== '' && duration !== ''){

            $.ajax({
                type: "GET",
                url:  'ticket/check/' + date + '/' + duration,
                success: function (data) {
                    movies = JSON.parse(data);
                    movies.forEach(function (value) {
                        $("#movie").append(
                            '<option value="' + value.showMoviesId + '">' + value.moviesName+ ' - ' + value.hallsName + '</option>'
                        );
                    })
                }
            });

        }
    });

    $(document).on('change','#movie', function () {
        var _this = this;
        movies.forEach(function (value) {
            if(value.showMoviesId === _this.value){
                $("#tickets").attr('max', (value.hallsSeats - value.tickets))
            }
        })
    })
});