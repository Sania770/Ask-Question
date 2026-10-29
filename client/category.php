
<select name="category" id="category" class="form-control">
    <option value="">Select A Category</option>
    <!-- <option value="">Mobile</option>
    <option value="">General</option>
    <option value="">Coding</option> -->
    <?php
    include("./common/db.php");
    // showin categories from database 
    $query = "select * from category";
    $result = $conn->query($query);
    foreach($result as $row){
        $name = ucfirst($row["name"]);
        $id = $row["id"];
        echo " <option value=$id>$name</option>";
    }
    ?>
</select>