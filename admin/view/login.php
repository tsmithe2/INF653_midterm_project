<?php
    include("header.php");
?>

<h4>Please fill in your credentials to login.</h4>
<form action = "index.php" method = "POST">
    <label for = "username">Username:</label><br>
    <input type = "text" name = "username" required>

    <label for = "password">Password:</label><br>
    <input type = "password" name = "password" required>

    <input type = "submit" value = "Sign in" id = "butn" class="btn btn-outline-primary">
</form>

<?php
    include("footer.php");
?>