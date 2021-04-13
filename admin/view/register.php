<?php
    include("header.php");
?>

<div id = "nput_form">
    <h4>Register a new admin user</h4>

    <?php
        if ($_SESSION["username_error"] == true)
        {
            echo "<h5 style = 'color: red;'>Username must be six characters or longer.</h5>";
        }
        if ($_SESSION["password_error"] == true)
        {
            echo "<h5 style = 'color: red;'>Your password must contain at least one number, one uppercase letter, one lowercase letter,
             and total 8 or more characters.</h5>";
        }
        if ($_SESSION["match_error"] == true)
        {
            echo "<h5 style = 'color: red;'>Your password must match with the confirmation password.</h5>";
        }
    ?>

    <form action = "index.php" method = "POST">
        <label for = "new_username">Username:</label><br>
        <input type = "text" name = "new_username" id = "nput" class = "form-control" required />

        <label for = "new_password">Password:</label><br>
        <input type = "text" name = "new_password" id = "nput" class = "form-control" required />

        <label for = "confrim_password">Confirm Password:</label><br>
        <input type = "text" name = "confirm_password" id = "nput" class = "form-control" required />

        <input type = "submit" value = "Register" name = "register_new_admin" id = "nput_s" class = "btn btn-success btn-lg" />
    </form>
</div>

<div id = "nav">
    <form action = "index.php" method = "POST">
        <input type = "submit" name = "view_v_list" value = "View Full Vehicle List" id = "butn" class="btn btn-outline-primary" />
    </form>
    <form action = "index.php" method = "POST">
        <input type = "submit" name = "add_vehicle" value = "Add a vehicle" id = "butn" class="btn btn-outline-primary" />
    </form>
    <form action = "index.php" method = "POST">
        <input type = "submit" name = "view_edit_makes" value = "View/Edit Vehicle Makes" id = "butn" class="btn btn-outline-primary" />
    </form>
    <form action = "index.php" method = "POST">
        <input type = "submit" name = "view_edit_types" value = "View/Edit Vehicle Types" id = "butn" class="btn btn-outline-primary" />
    </form>
    <form action = "index.php" method = "POST">
        <input type = "submit" name = "view_edit_classes" value = "View/Edit Vehicle Classes" id = "butn" class="btn btn-outline-primary" />
    </form>
</div>

<?php
    include("footer.php");
?>