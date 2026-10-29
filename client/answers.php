<div class="container">
    <div class="offset-sm-1">
        <h5 class="h">Answers :</h5>
        <?php
        $query = "select * from answers where question_id = $qid"; // qid we fetched from index
        $result = $conn->query($query);
        foreach ($result as $row) {
            $answer = $row['answer'];
            echo
                "<div class='row'>
          <p style='border-bottom: 1px solid #ddd; padding:5px; margin-bottom: 10px;'>$answer</p>
        </div>";
        }
        ?>
    </div>
</div>