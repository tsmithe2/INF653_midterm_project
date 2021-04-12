<?php
    session_start();
    if ($_SESSION["action"] == "show_login")
    {
        include("view/login.php");
    }
    if ($_SESSION["action"] == "login")
    {
        global $db;
        $query = "SELECT username, password FROM administrators WHERE username = '" . $_SESSION["temp_username"] . "' and password = '" . $_SESSION["temp_password"] . "'";
        $result = fetch_one($query, $db);

        if ($_SESSION["temp_username"] == $result["username"] && $_SESSION["temp_password"] == $result["password"])
        {
            $_SESSION["is_logged_in"] = true;
            $_SESSION["username"] = $_POST["username"];
            $_SESSION["password"] = $_POST["password"];
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
        $tnu = $_SESSION["temp_new_user"];
        $tnp = $_SESSION["temp_new_password"];
        $cp = $_SESSION["confirm_password"];
        
        if (valid_username($tnu))
        {
            echo "Valid username";
        }
    }
?>