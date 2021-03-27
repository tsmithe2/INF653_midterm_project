<?php
    $query = "SELECT * FROM makes ORDER BY makeID";
    $makes = fetch_all($query, $db);

    $query1 = "SELECT * FROM types ORDER BY typeID";
    $types = fetch_all($query1, $db);

    $query2 = "SELECT * FROM classes ORDER BY classID";
    $classes = fetch_all($query2, $db);

    require("view/header.php");
?>

<div id = "nput_form">
    <h4>Add Vehicle</h4>
    <form action = "index.php" method = "POST">
        <label>Make:</label>
        <select name = "make_id" id = "nput" class = "form-control">
            <?php 
                foreach ($makes as $make) :
                    echo "<option value = " . $make["makeID"] . ">";
                    echo $make["makeName"] . "</option>";
                endforeach;
            ?>
        </select>

        <label>Type:</label>
        <select name = "type_id" id = "nput" class = "form-control">
            <?php 
                foreach ($types as $type) :
                    echo "<option value = " . $type["typeID"] . ">";
                    echo $type["typeName"] . "</option>";
                endforeach;
            ?>
        </select>

        <label>Class:</label>
        <select name = "class_id" id = "nput" class = "form-control">
            <?php 
                foreach ($classes as $class) :
                    echo "<option value = " . $class["classID"] . ">";
                    echo $class["className"] . "</option>";
                endforeach;
            ?>
        </select>

        <label>Year:</label>
        <input type = "number" name = "vehicle_year" id = "nput" class = "form-control" required />

        <label>Model:</label>
        <input type = "text" name = "vehicle_model" id = "nput" class = "form-control" required />

        <label>Price:</label>
        <input type = "number" name = "vehicle_price" id = "nput" class = "form-control" required />

        <input type = "submit" name = "vehicle_added" id = "nput_s" value = "Add Vehicle" class="btn btn-success btn-lg" />
    </form>
</div>

<div id = "nav">
    <form action = "index.php" method = "POST">
        <input type = "submit" value = "View Full Vehicle List" id = "butn" class="btn btn-outline-primary" />
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
    require("view/footer.php");
?>