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
    <h3>Add show</h3>
    <form method="post" action="show/addApi/">
        <input type="hidden" name="id" id="id">
        <table>
            <tr>
                <td><label for="hall">hall</label></td>
                <td>
                    <select name="hall" id="hall"  required>
                        <option value="">choose hall</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="duration">duration</label></td>
                <td>
                    <select name="duration" id="duration" required>
                        <option value="">choose duration</option>
                    </select>
                </td>
            </tr>
        </table>
        <br>
        <input type="submit" class="btn btn-primary btn-sm" value="add show">
    </form>
</div>
<script src="js/showAddEdit.js"></script>
</body>
</html>