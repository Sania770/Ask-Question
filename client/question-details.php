<div class="container">

    <h1 class="heading">Question</h1>
    <div class="row">
        <div class="col-8">
            <?php
            include("./common/db.php");
            $query = "select * from questions where id = $qid"; // qid we fetched from index
            $result = $conn->query($query);
            $row = $result->fetch_assoc();
            $cid = $row["category_id"];
            echo
                "<h5 class='margin-bottom-15 question'> Question : "
                . $row['title'] .
                "</h5>";
            echo
                "<p class='margin-bottom-15'>"
                . $row['description'] .
                "</p>";
            include("answers.php");
            ?>
            <form action="./server/requests.php" method="post">
                <input type="hidden" name="question_id" value="<?php echo $qid ?>">
                <textarea name="answer" class="form-control margin-bottom-15" placeholder="your answer..."></textarea>
                <button class="btn btn-primary">Write Your Answer.</button>
            </form>
        </div>
        <div class="col-4">
            
            <?php
            // echo $cid;
            $categoryQuery = "select name from category where id = $cid";
            $categoryResult = $conn->query($categoryQuery);
            $categoryRow = $categoryResult->fetch_assoc();
           echo " <h1>" .ucfirst($categoryRow['name']). "</h1>";

            $query = "select * from questions where category_id = $cid and id!=$qid"; //id!=$qid current id not includes
            $result = $conn->query($query);
            foreach ($result as $row) {
                $id = $row["id"];
                $title = $row["title"];
                echo "<div class='row question-list'>
                   <h5 class='my-question'>
                   <a href='?q-id=$id' style='color: rgb(86, 171, 204) !important; font-size: 20px; text-decoration: none;'>$title</a>
                   <h5>
                  </div>";
            }
            ?>
        </div>
    </div>

</div>