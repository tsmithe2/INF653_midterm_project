<?php
    session_start();
    include("header.php");
?>
<form action = "index.php" method = "GET">
    <label for = "name">Please enter your first name:</label>
    <input type = "text" name = "first_name" required />
    <input type = "submit" name = 'registered' value = "Register" />
</form>
<?php
    include("footer.php");
?>