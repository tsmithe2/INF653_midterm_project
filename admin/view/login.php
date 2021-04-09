<?php
    include("header.php");
?>

<h4>Please fill in your credentials to login.</h4>
<div id = "nput_form">
    <form action = "index.php" method = "POST">
        <label for = "username">Username:</label><br>
        <input type = "text" name = "username" id = "nput" class = "form-control" required><br>

        <label for = "password">Password:</label><br>
        <input type = "password" name = "password" id = "nput" class = "form-control" required><br><br>

        <input type = "submit" value = "Sign in" id = "butn" class="btn btn-outline-primary">
    </form>
</div>

<?php
    include("footer.php");
?>