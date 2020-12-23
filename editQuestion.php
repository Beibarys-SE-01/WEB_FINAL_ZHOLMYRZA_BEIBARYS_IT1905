<?php
require 'database.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>
    <form method = "post"  class="form-group">
        <h2>Edit Question</h2>
        <input class="form-control" type="text" name="title" id="title" placeholder="Title..."><br>
        <textarea class="form-control" name="question" id="question" cols="20" rows="10" placeholder="Question..."></textarea><br>
        <button>ADD</button>
    </form>
</body>
</html>
<?php

$Database = new Database('localhost', 'root', '', 'php');
$connection = $Database->connect();
if ($Database->checkError() === "ok") {
    if ($_SERVER["REQUEST_METHOD"]=="POST") {
        $id = $_GET['id'];
        $title = $_POST['title'];
        $question = $_POST['question'];
        $sql = "UPDATE questions SET title='$title', content='$question' 
                WHERE id=?";
        $stmt = mysqli_prepare($connection, $sql);
        if ($stmt === false) {
          echo mysqli_error($connection);
        }else{
          mysqli_stmt_bind_param($stmt, "i", $id);
          if (mysqli_stmt_execute($stmt)){
              header("Location:FAQ.php");
          }else{
            echo mysqli_stmt_error($stmt);
          }
        }
    }
}
?>