<?php
    include("view/header.php");
?>

<div id = "nput_form">
    <h4>Vehicle Class List</h4>
</div>

<div id = "scroll">
    <table class = "table table-hover" id = "tab">
        <tr>
            <th colspan = "2">Name</th>
        </tr>
        <?php
            $query = "SELECT * FROM classes ORDER BY classID";
            $classes = fetch_all($query, $db);
            $counter = 1;
            foreach ($classes as $class) :
                echo "<form action = 'admin/index.php' method = 'POST'>";
                echo "<input type = 'hidden' name = 'del' value = " . $class["classID"] . " />";
                echo "<tr>";
                echo "<td>" . $class["className"] . "</td>";
                echo "<td><input type = 'submit' name = 'delete_class' value = 'Remove' class = 'btn btn-danger' /></td>";
                echo "</tr></form>";
            endforeach;

            $query = "ALTER TABLE classes AUTO_INCREMENT = $counter";
            fetch_one($query, $db);
        ?>
    </table>
</div>

<div id = "nput_form">
    <h4>Add Vehicle Class</h4>
    <form action = "admin/index.php" method = "POST">
        <label>Name:</label><br>
        <input type = "text" name = "class_name" id = "nput" class = "form-control" required />
        <input type = "submit" name = "add_class" id = "nput_s" value = "Add Class" class="btn btn-success btn-lg" />
    </form>
</div>

<div id = "nav">
    <form action = "admin/index.php" method = "POST">
        <input type = "submit" value = "View Full Vehicle List" id = "butn" class="btn btn-outline-primary" />
    </form>
    <form action = "admin/index.php" method = "POST">
        <input type = "submit" name = "add_vehicle" value = "Add a vehicle" id = "butn" class="btn btn-outline-primary" />
    </form>
    <form action = "admin/index.php" method = "POST">
        <input type = "submit" name = "view_edit_makes" value = "View/Edit Vehicle Makes" id = "butn" class="btn btn-outline-primary" />
    </form>
    <form action = "admin/index.php" method = "POST">
        <input type = "submit" name = "view_edit_types" value = "View/Edit Vehicle Types" id = "butn" class="btn btn-outline-primary" />
    </form>
</div>

<?php 
    include("view/footer.php");
?>