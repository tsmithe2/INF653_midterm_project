<?php
    include("header.php");
?>

<div id = "nput_form">
    <h4>Please fill in your credentials to login.</h4>

    <form action = "index.php" method = "POST">
        <label for = "username">Username:</label><br>
        <input type = "text" name = "username" id = "nput" class = "form-control" required>

        <label for = "password">Password:</label><br>
        <input type = "password" name = "password" id = "nput" class = "form-control" required>

        <input type = "submit" value = "Sign in" id = "nput_s" class="btn btn-outline-primary">
    </form>
</div>

<?php
    include("footer.php");
?>