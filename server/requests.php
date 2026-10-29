<?php
session_start();
// print_r($_POST);
include("../common/db.php");
if (isset($_POST['signup'])) {

    //send data html to php
    // echo"username is " . $_POST['username']. "<br>";
    // echo"email is " . $_POST['email']. "<br>";
    // echo"password is " . $_POST['password']. "<br>";
    // echo"address is " . $_POST['address']. "<br>";


    //send data html form to database
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $address = $_POST['address'];

    $user = $conn->prepare("INSERT INTO `users`
    (`id`, `username`, `email`, `password`, `address`)
    VALUES('','$username', '$email', '$password', '$address');
    ");

    $result = $user->execute();
    if ($result) {

        $_SESSION["user"] = ["username" => $username, "email" => $email, "user_id" => $user->insert_id];
        // echo "New users registerd";
        //home page per chala jaye ga signup krne ke bad <<<<<<here header is a function>>>>>>
        header("location: /php/project2");

    } else {
        echo "New users not registerd";
    }
} else if (isset($_POST['login'])) {
    // print_r($_POST); data a raha hai ya nahi print krne ke liye data ko
    $email = $_POST['email'];
    $password = $_POST['password'];
    $username = "";
    $user_id = 1;
    $query = "select * from users where email ='$email' and password='$password'";
    $result = $conn->query($query);
    if ($result->num_rows == 1) {
        foreach ($result as $row) {
            $username = $row["username"];
            $user_id = $row["id"];
        }

        $_SESSION["user"] = ["username" => $username, "email" => $email, "user_id" => $user_id];
        header("location: /php/project2");
    } else {
        echo "New users not registerd";
    }
} else if (isset($_GET['logout'])) {
    session_unset();
    header("location: /php/project2");
} else if (isset($_POST['ask'])) {
    print_r($_POST);
    print_r($_SESSION);

    //send data html form to database
    $title = $_POST['title'];
    $description = $_POST['description'];
    $category_id = $_POST['category'];
    $user_id = $_SESSION['user']['user_id'];

    $questions = $conn->prepare("INSERT INTO `questions`
    (`id`, `title`, `description`, `category_id`, `user_id`)
    VALUES('','$title', '$description', '$category_id', '$user_id');
    ");

    $result = $questions->execute();
    if ($result) {
        // $_SESSION["user"] = ["username" => $username, "email" => $email, "user_id" => $user->insert_id];
        // echo "New users registerd";
        //home page per chala jaye ga signup krne ke bad <<<<<<here header is a function>>>>>>
        header("location: /php/project2");

    } else {
        echo "Questions are added to website";
    }
} else if (isset($_POST["answer"])) {
   print_r($_POST);
       //send data html form to database
    $answer = $_POST['answer'];
    $question_id = $_POST['question_id'];
    $user_id = $_SESSION['user']['user_id'];

    $answers = $conn->prepare("INSERT INTO `answers`
    (`id`, `answer`, `question_id`, `user_id`)
    VALUES('','$answer', '$question_id',  '$user_id');
    ");

    $result = $answers->execute();
    if ($result) {
        // $_SESSION["user"] = ["username" => $username, "email" => $email, "user_id" => $user->insert_id];
        // echo "New users registerd";
        //home page per chala jaye ga signup krne ke bad <<<<<<here header is a function>>>>>>
        header("location: /php/project2?q-id=$question_id");
    } else {
        echo "Answer is not submited";
    }
} else if (isset($_GET["delete"])) {
    $qid = $_GET["delete"];
    $query = $conn->prepare("delete from questions where id= $qid");
    $result = $query->execute();
    if ($result) {
        header("location: /php/project2");
    }else{
        echo "Question not deleted";             
    }
}
?>