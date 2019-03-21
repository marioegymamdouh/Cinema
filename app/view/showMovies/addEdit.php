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
    <h3>Add showMovie</h3>
    <form method="post" action="showMovie/addApi/">
        <input type="hidden" name="id" id="id">
        <table>
            <tr>
                <td><label for="show">show</label></td>
                <td>
                    <select name="show" id="show"  required>
                        <option value="">choose show</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="movie">movie</label></td>
                <td>
                    <select name="movie" id="movie" required>
                        <option value="">choose movie</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="date">date</label></td>
                <td><input type="date" id="date" name="date" required></td>
            </tr>
        </table>
        <br>
        <input type="submit" class="btn btn-primary btn-sm" value="add showMovie">
    </form>
</div>
<script src="js/showMovieAddEdit.js"></script>
</body>
</html>