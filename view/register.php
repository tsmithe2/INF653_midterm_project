<?php
    include("view/header.php");
?>
<form action = "is_registered.php" method = "GET">
    <label for = "name">Please enter your first name:</label>
    <input type = "text" name = "first_name" required />
    <input type = "submit" value = "Register" />
</form>
<?php
    include("view/footer.php");
?>