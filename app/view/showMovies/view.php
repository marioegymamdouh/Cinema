<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <?php include_once ROOT_PATH . 'view/header.php'?>
</head>
<body>
<?php include ROOT_PATH . 'view/navbar.php'?>
<div class="container">
    <br><br>
    <h3>ShowMovies list</h3>
    <table class="table">
        <tr>
            <th>id</th>
            <th>show</th>
            <th>movie</th>
            <th>date</th>
            <th>edit</th>
            <th>delete</th>
        </tr>
    </table>
    <br>
    <a href="showMovie/add/" class="btn btn-primary btn-sm">Add new showMovie</a>
</div>
<script src="js/showMovieView.js"></script>
</body>
</html>