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
    <form method = "post" class="form-group">
        <h2>Edit Comment</h2>
        <textarea class="form-control" name="comment" id="comment" cols="22" rows="5" placeholder="Comment..."></textarea><br>
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
        $comment = $_POST['comment'];
        $date = date('Y-m-d H:i:s');
        $sql = "UPDATE comments SET content='$comment', publish_date='$date' 
                WHERE id='$id' ";
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