<?php
    session_start();
    $_SESSION["isBusy"] = true;
    include("view/header.php");
    $_SESSION["firstname"] = $_GET["first_name"];
    echo "<div id = 'reg_form'><h4>Thank you for registering, " . $_SESSION["firstname"] . "!</h4>";
    echo "<a href = '../index.php'>Click here</a> to view our vehicle list.</div>";
    include("view/footer.php");
?>