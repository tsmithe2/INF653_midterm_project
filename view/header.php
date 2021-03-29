<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset = "UTF-8">
    <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" type = "text/css" href = "css/main.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Zippy Used Autos</title>
</head>
<body>
    <header>
        <?php
            session_start();
            if (!isset($_SESSION["firstname"]))
            {
                echo "<form action = '../index.php' method = 'POST'>
                <input type = 'submit' name = 'register' value = 'Register' />
                </form>";
            }
            else
            {
                echo "Welcome " . $_SESSION["firstname"] . "! 
                <form action = '../index.php' method = 'POST'>
                <input type = 'submit' name = 'logout' value = 'Sign Out'>
                </form>";
            }
        ?>
        <h2>&nbsp;Zippy Used Autos</h2>
    </header>