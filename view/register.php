<?php
    session_start();
    $_SESSION["isBusy"] = true;
    include("header.php");
?>

<form action = "../index.php" method = "GET" id = "reg_form">
    <label for = "name">Please enter your first name:</label><br>
    <input type = "text" name = "first_name" id = "reg_name" required /><br>
    <input type = "submit" name = 'is_reg' value = "Register" id = "reg_subm" class = "btn btn-success"/>
</form>

<?php
    include("footer.php");
?>