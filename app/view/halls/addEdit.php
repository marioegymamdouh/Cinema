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
    <h3>Add hall</h3>
    <form method="post" action="hall/addApi/">
        <input type="hidden" name="id" id="id">
        <table>
            <tr>
                <td><label for="name">name</label></td>
                <td><input type="text" name="name" id="name" placeholder="name" required></td>
            </tr>
            <tr>
                <td><label for="seats">seats</label></td>
                <td><input type="number" min="0" max="999" name="seats" id="seats" placeholder="seats" required></td>
            </tr>
        </table>
        <br>
        <input type="submit" value="add hall" class="btn btn-primary btn-sm">
    </form>
</div>
<script src="js/hallAddEdit.js"></script>
</body>
</html>