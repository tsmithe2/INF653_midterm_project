<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset = "UTF-8">
    <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type = "text/css" href = "../css/main.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Zippy Admin</title>
</head>
<body>
    <header>
        <?php
            session_start();
            if ($_SESSION["is_logged_in"] == true)
            {
                echo "<div id = 'reg'>Welcome, " . $_SESSION["username"] . "!";
                echo "<form action = 'index.php' method = 'POST'>
                <input type = 'submit' name = 'logout' value = 'logout' class = 'btn btn-outline-primary' />
                </form></div>";
            }
        ?>
        <h2>&nbsp;Zippy Admin</h2>
    </header>