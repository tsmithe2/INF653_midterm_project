<?php
    include("view/header.php");
?>

<div id = "nput_form">
    <h4>Vehicle Type List</h4>
</div>

<div id = "scroll">
    <table class = "table table-hover" id = "tab">
        <tr>
            <th colspan = "2">Name</th>
        </tr>
        <?php
            $query = "SELECT * FROM types ORDER BY typeID";
            $types = Database::fetch_all($query);
            $counter = 1;
            foreach ($types as $type) :
                echo "<form action = 'index.php' method = 'POST'>";
                echo "<input type = 'hidden' name = 'del' value = " . $type["typeID"] . " />";
                echo "<tr>";
                echo "<td>" . $type["typeName"] . "</td>";
                echo "<td><input type = 'submit' name = 'delete_type' value = 'Remove' class = 'btn btn-danger' /></td>";
                echo "</tr></form>";
            endforeach;

            $query = "ALTER TABLE types AUTO_INCREMENT = $counter";
            Database::fetch_one($query);
        ?>
    </table>
</div>

<div id = "nput_form">
    <h4>Add Vehicle Type</h4>
    <form action = "index.php" method = "POST">
        <label>Name:</label><br>
        <input type = "text" name = "type_name" id = "nput" class = "form-control" required />
        <input type = "submit" name = "add_type" id = "nput_s" value = "Add Type" class="btn btn-success btn-lg" />
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
        <input type = "submit" name = "view_edit_classes" value = "View/Edit Vehicle Classes" id = "butn" class="btn btn-outline-primary" />
    </form>
    <form action = "index.php" method = "POST">
        <input type = "submit" name = "register" value = "Register New Admin User" id = "butn" class="btn btn-outline-primary" />
    </form>
</div>

<?php 
    include("view/footer.php");
?>