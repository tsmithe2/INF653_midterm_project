<?php
    session_start();
    include("view/header.php");
    echo "<h4>Thank you for signing out, " . $_SESSION["firstname"] . ".</h4>";
    echo "<a href = 'index.php'>Click here</a> to view our vehicle list.";
    include("view/footer.php");
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
    
?>