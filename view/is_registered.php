<?php
    session_start();
    include("view/header.php");
    $_SESSION["firstname"] = $_GET["first_name"];
    echo "<h4>Thank you for registering, " . $_SESSION["firstname"] . "!</h4>";
    echo "<a href = 'index.php'>Click here</a> to view our vehicle list.";
    include("view/footer.php");
?>