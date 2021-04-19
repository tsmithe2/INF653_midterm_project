<?php
    include("view/header.php");
?>

<form action = "index.php" method = "POST">
    <select name = "select_make" class = "form-control" id = "sel">
        <option value = "all_makes">View All Makes</option>
        <?php
            $db = Database::getDB();
            $query = "SELECT * FROM makes ORDER BY makeID ASC";
            $makes = Database::fetch_all($query, $db);
            foreach ($makes as $make) :
                echo "<option value = " . $make["makeID"] . ">";
                echo $make["makeName"] . "</option>";
            endforeach;
        ?>
    </select>

    <select name = "select_type" class = "form-control" id = "sel">
        <option value = "all_types">View All Types</option>
        <?php
            $db = Database::getDB();
            $query = "SELECT * FROM types ORDER BY typeID ASC";
            $types = Database::fetch_all($query, $db);
            foreach ($types as $type) :
                echo "<option value = " . $type["typeID"] . ">";
                echo $type["typeName"] . "</option>";
            endforeach;
        ?>
    </select>

    <select name = "select_class" class = "form-control" id = "sel">
        <option value = "all_classes">View All Classes</option>
        <?php
            $db = Database::getDB();
            $query = "SELECT * FROM classes ORDER BY classID ASC";
            $classes = Database::fetch_all($query, $db);
            foreach ($classes as $class) :
                echo "<option value = " . $class["classID"] . ">";
                echo $class["className"] . "</option>";
            endforeach;
        ?>
    </select>
    <div id = "sort">
        <label>Sort by:&nbsp;</label>
        <input type = "radio" name = "sort" value = "price" checked = "checked"/> Price&nbsp;
        <input type = "radio" name = "sort" value = "year" /> Year
        <input type = "submit" class="btn btn-outline-success btn-sm" />
    </div>
</form>
<div id = "scroll">
    <table class = "table table-hover" id = "tab">
        <tr>
            <th>Year</th>
            <th>Make</th>
            <th>Model</th>
            <th>Type</th>
            <th>Class</th>
            <th>Price</th>
            <th></th>
        </tr>

        <?php
            $select_make;
            $select_type;
            $select_class;
            $select_sort;
            $query = "SELECT vehicleID, year, makeID, model, typeID, classID, price FROM vehicles WHERE ";

            if (isset($_POST["select_make"]) && $_POST["select_make"] != "all_makes")
            {
                $select_make = $_POST["select_make"];
                $query .= "makeID = $select_make AND ";
            }
            if (isset($_POST["select_type"]) && $_POST["select_type"] != "all_types")
            {
                $select_type = $_POST["select_type"];
                $query .= "typeID = $select_type AND ";
            }
            if (isset($_POST["select_class"]) && $_POST["select_class"] != "all_classes")
            {
                $select_class = $_POST["select_class"];
                $query .= "classID = $select_class AND ";
            }
            $query .= "true ";
            if (isset($_POST["sort"]))
            {
                $select_sort = $_POST["sort"];
                $query .= "ORDER BY $select_sort DESC";
            }

            if (!isset($_POST["select_make"]) && !isset($_POST["select_type"]) && !isset($_POST["select_class"]) && !isset($_POST["select_sort"]))
            {
                $query = "SELECT vehicleID, year, makeID, model, typeID, classID, price FROM vehicles ORDER BY price DESC";
            }
            
            $db = Database::getDB();
            $results = Database::fetch_all($query, $db);
            $counter = 1;

            foreach ($results as $result) :
                echo "<form action = 'index.php' method = 'POST'>";
                echo "<input type = 'hidden' name = 'del' value = " . $result["vehicleID"] . " />";
                $make_id = $result["makeID"];
                $type_id = $result["typeID"];
                $class_id = $result["classID"];
                echo "<tr>";
                echo "<td>" . htmlspecialchars($result["year"]) . "</td>";

                $query1 = "SELECT makeName FROM makes WHERE makeID = $make_id";
                $result1 = fetch_one($query1, $db);
                echo "<td>" . htmlspecialchars($result1["makeName"]) . "</td>";

                echo "<td>" . htmlspecialchars($result["model"]) . "</td>";

                $query2 = "SELECT typeName FROM types WHERE typeID = $type_id";
                $result2 = fetch_one($query2, $db);
                echo "<td>" . htmlspecialchars($result2["typeName"]) . "</td>";

                $query3 = "SELECT className FROM classes WHERE classID = $class_id";
                $result3 = fetch_one($query3, $db);
                echo "<td>" . htmlspecialchars($result3["className"]) . "</td>";

                echo "<td>$" . number_format(htmlspecialchars($result["price"])) . ".00</td>";
                echo "<td><input type = 'submit' name = 'delete_vehicle' value = 'Remove' class = 'btn btn-danger' />";
                echo "</td></tr></form>";

                $counter++;
            endforeach;

            $db = Database::getDB();
            $query = "ALTER TABLE vehicles AUTO_INCREMENT = $counter";
            Database::fetch_one($query, $db);
        ?>

    </table>
</div>

<div id = "nav">
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
    <form action = "index.php" method = "POST">
        <input type = "submit" name = "register" value = "Register New Admin User" id = "butn" class="btn btn-outline-primary" />
    </form>
</div>

<?php
    include("view/footer.php");
?>