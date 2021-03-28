<?php
    session_start();
    include("view/header.php");
    $_SESSION["firstname"] = $_POST["first_name"];
    echo "<h4>Thank you for registering, " . $_SESSION["firstname"] . "!</h4>";
    echo "<a href = 'vehicle_list.php'>Click here</a> to view our vehicle list.";
    include("view/footer.php");
?>