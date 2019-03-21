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
    <h3>Movies list</h3>
    <table class="table">
        <tr>
            <th>id</th>
            <th>name</th>
            <th>edit</th>
            <th>delete</th>
        </tr>
    </table>
    <br>
    <a href="movie/add/" class="btn btn-primary btn-sm">Add new movie</a>
</div>
<script src="js/movieView.js"></script>
</body>
</html>