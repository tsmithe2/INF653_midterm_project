<?php
    $dsn = 'mysql:host=localhost;dbname=zippyusedautos';
    $username = 'root';
    $password = '';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('view/database_error.php');
        exit();
    }

    function fetch_all($query, $db)
    {
        $statement = $db->prepare($query); 
        $statement->execute();
        $result = $statement->fetchAll(); 
        $statement->closeCursor();
        return $result;
    }
    function fetch_one($query, $db)
    {
        $statement = $db->prepare($query); 
        $statement->execute();
        $result = $statement->fetch(); 
        $statement->closeCursor();
        return $result;
    }
?>