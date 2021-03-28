<?php
    include("view/header.php");
?>
<form action = "index.php" method = "POST">
    <label for = "name">Please enter your first name:</label>
    <input type = "text" name = "name" required />
    <input type = "submit" value = "Register" />
</form>
<?php
    include("view/footer.php");
?>