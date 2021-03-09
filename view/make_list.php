<?php
    include("view/header_admin.php");
?>

<div id = "nput_form">
    <h4>Vehicle Make List</h4>
</div>

<table class = "table table-hover" id = "tab">
    <tr>
        <th colspan = "2">Name</th>
    </tr>
    <?php
        $query = "SELECT * FROM makes ORDER BY makeID";
        $makes = fetch_all($query, $db);
        $counter = 1;
        foreach ($makes as $make) :
            echo "<form action = 'index_admin.php' method = 'POST'>";
            echo "<input type = 'hidden' name = 'del' value = " . $make["makeID"] . " />";
            echo "<tr>";
            echo "<td>" . $make["makeName"] . "</td>";
            echo "<td><input type = 'submit' name = 'delete_make' value = 'Remove' class = 'btn btn-danger' /></td>";
            echo "</tr></form>";
        endforeach;

        $query = "ALTER TABLE makes AUTO_INCREMENT = $counter";
        fetch_one($query, $db);
    ?>
</table>

<div id = "nput_form">
    <h4>Add Vehicle Make</h4>
    <form action = "index_admin.php" method = "POST">
        <label>Name:</label><br>
        <input type = "text" name = "make_name" id = "nput" class = "form-control" required />
        <input type = "submit" name = "add_make" id = "nput_s" value = "Add Make" class="btn btn-success btn-lg" />
    </form>
</div>

<div id = "nav">
    <form action = "index_admin.php" method = "POST">
        <input type = "submit" value = "View Full Vehicle List" id = "butn" class="btn btn-outline-primary" />
    </form>
    <form action = "index_admin.php" method = "POST">
        <input type = "submit" name = "add_vehicle" value = "Add a vehicle" id = "butn" class="btn btn-outline-primary" />
    </form>
    <form action = "index_admin.php" method = "POST">
        <input type = "submit" name = "view_edit_types" value = "View/Edit Vehicle Types" id = "butn" class="btn btn-outline-primary" />
    </form>
    <form action = "index_admin.php" method = "POST">
        <input type = "submit" name = "view_edit_classes" value = "View/Edit Vehicle Classes" id = "butn" class="btn btn-outline-primary" />
    </form>
</div>

<?php 
    include("view/footer.php");
?>