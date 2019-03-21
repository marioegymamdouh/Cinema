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
    <h3>Tickets</h3>
    <form method="post" action="ticket/book/">
        <table>
            <tr>
                <td><label for="name">name</label></td>
                <td><input type="text" id="name" name="name" required></td>
            </tr>
            <tr>
                <td><label for="date">date</label></td>
                <td><input type="date" id="date" name="date" required></td>
            </tr>
            <tr>
                <td><label for="duration">time</label></td>
                <td>
                    <select id="duration" name="duration" required>
                        <option value="">choose duration</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="movie">movie</label></td>
                <td>
                    <select id="movie" name="movie" required>
                        <option value="">choose duration</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="duration">number of tickets</label></td>
                <td><input type="number" min="0" id="tickets" name="tickets" required></td>
            </tr>
        </table>
        <br>
        <input type="submit" class="btn btn-primary btn-sm" value="book ticket">
    </form>
</div>
<script src="js/ticket.js"></script>
</body>
</html>