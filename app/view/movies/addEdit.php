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
    <h3>Add movie</h3>
    <form method="post" action="movie/addApi/">
        <input type="hidden" name="id" id="id">
        <label for="name">name</label>
        <input type="text" name="name" id="name" placeholder="name" required>
        <br>
        <br>
        <input type="submit" class="btn btn-primary btn-sm" value="add movie">
    </form>
</div>
<script src="js/movieAddEdit.js"></script>
</body>
</html>