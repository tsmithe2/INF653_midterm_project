<?php
    include("header.php");
?>

<form action = "index_public.php" method = "POST">
    <select name = "select_make" class = "form-control" id = "sel">
        <option value = "all_makes">View All Makes</option>
        <?php
            $query = "SELECT * FROM makes ORDER BY makeID ASC";
            $makes = fetch_all($query, $db);
            foreach ($makes as $make) :
                echo "<option value = " . $make["makeID"] . ">";
                echo $make["makeName"] . "</option>";
            endforeach;
        ?>
    </select>

    <select name = "select_type" class = "form-control" id = "sel">
        <option value = "all_types">View All Types</option>
        <?php
            $query = "SELECT * FROM types ORDER BY typeID ASC";
            $types = fetch_all($query, $db);
            foreach ($types as $type) :
                echo "<option value = " . $type["typeID"] . ">";
                echo $type["typeName"] . "</option>";
            endforeach;
        ?>
    </select>

    <select name = "select_class" class = "form-control" id = "sel">
        <option value = "all_classes">View All Classes</option>
        <?php
            $query = "SELECT * FROM classes ORDER BY classID ASC";
            $classes = fetch_all($query, $db);
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
        </tr>
        <?php
            $select_make;
            $select_type;
            $select_class;
            $select_sort;
            $query = "SELECT year, makeID, model, typeID, classID, price FROM vehicles WHERE ";

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
                $query = "SELECT year, makeID, model, typeID, classID, price FROM vehicles ORDER BY price DESC";
            }
            
            $results = fetch_all($query, $db);
            foreach ($results as $result) :
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
                echo "</tr>";
            endforeach;
        ?>
    </table>
</div>
<?php
    include("view/footer.php");
?>