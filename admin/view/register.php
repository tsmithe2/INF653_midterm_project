<?php
    include("header.php");
?>

<div id = "nput_form">
    <h4>Register a new admin user</h4>

    <form action = "index.php" method = "POST">
        <label for = "new_username">Username:</label><br>
        <input type = "text" name = "new_username" id = "nput" class = "form-control" required />

        <label for = "new_password">Password:</label><br>
        <input type = "password" name = "new_password" id = "nput" class = "form-control" required />

        <label for = "confrim_password">Confirm Password:</label><br>
        <input type = "password" name = "confirm_password" id = "nput" class = "form-control" required />

        <input type = "submit" value = "Register" name = "register_new_admin" id = "nput_s" class = "btn btn-success btn-lg" />
    </form>
</div>

<div id = "nav">
    <form action = "index.php" method = "POST">
        <input type = "submit" value = "View Full Vehicle List" id = "butn" class="btn btn-outline-primary" />
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