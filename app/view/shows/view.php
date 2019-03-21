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
    <h3>Shows list</h3>
    <table class="table">
        <tr>
            <th>id</th>
            <th>hall</th>
            <th>duration</th>
            <th>edit</th>
            <th>delete</th>
        </tr>
    </table>
    <br>
    <a href="show/add/" class="btn btn-primary btn-sm">Add new show</a>
</div>
<script src="js/showView.js"></script>
</body>
</html>