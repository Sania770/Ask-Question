<div class="">
    <h1 class="heading">Categories</h1>
    <?php
    include("./common/db.php");
    $query = "select * from category";
    $result = $conn->query($query);
    foreach ($result as $row) {
        $name =ucfirst($row["name"]);
        $id = $row["id"];
        echo "<div class='row question-list' style = 'padding: 15px; margin: 10px; border: 1px solid #ddd;'>
                   <h5 style='margin:0px; padding:0px;'>
                   <a href='?c-id=$id' style='color: rgb(86, 171, 204) !important; font-size: 20px; text-decoration: none;'>$name</a>
                   <h5>
                  </div>";
    }
    ?>
</div>