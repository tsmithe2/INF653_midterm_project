<?php
    session_start();
    if ($_SESSION["action"] == "show_login")
    {
        if (!isset($_SESSION["is_logged_in"]))
        {
            include("view/login.php");
        }
    }
    if ($_SESSION["action"] == "login")
    {
        global $db;
        $query = "SELECT username, password FROM administrators WHERE username = '" . $_SESSION["temp_username"] . "' and password = '" . $_SESSION["temp_password"] . "'";
        $result = fetch_one($query, $db);

        if ($_SESSION["temp_username"] == $result["username"] && $_SESSION["temp_password"] == $result["password"])
        {
            $_SESSION["username"] = $_POST["username"];
            $_SESSION["password"] = $_POST["password"];
            $_SESSION["is_logged_in"] = true;
        }
    }
    if ($_SESSION["action"] == "logout")
    {
        //destroy session and cookies
        $_SESSION = array();
        session_destroy();

        $name = session_name();
        $expire = strtotime('-1 year'); 
        $params = session_get_cookie_params();
        $path = $params['path']; 
        $domain = $params['domain']; 
        $secure = $params['secure']; 
        $httponly = $params['httponly'];
        setcookie($name, '', $expire, $path, $domain, $secure, $httponly);
    }
    if ($_SESSION["action"] == "show_register")
    {
        include("view/register.php");
    }
    if ($_SESSION["action"] == "register")
    {
        global $db;
        if ($_POST["confirm_passowrd"] == $_POST["password"])
        {
            $query = "INSERT INTO administrators (username, password) VALUES ('" . $_POST["username"] . "','" . $_POST["password"] . "')";
            $result = fetch_one($query, $db);
        }
        include("view/login.php");
    }
?>