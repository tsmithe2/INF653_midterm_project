<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset = "UTF-8" />
    <title>Zippy Used Autos</title>
    <link rel="stylesheet" type="text/css" href="view/main.css" />
</head>
<body>
    <header><h2>Zippy Used Autos</h2></header>

    <main>
        <h3>Database Error</h3>
        <p>There was an error connecting to the database.</p>
        <p>The database must be installed as described in the appendix.</p>
        <p>MySQL must be running as described in chapter 1.</p>
        <p>Error message: <?php echo $error_message; ?></p>
        <p>&nbsp;</p>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Zippy Used Autos</p>
    </footer>
</body>
</html>