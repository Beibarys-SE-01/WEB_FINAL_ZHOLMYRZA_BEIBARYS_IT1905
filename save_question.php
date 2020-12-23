<?php
require 'database.php';
session_start();
$Database = new Database('localhost', 'root', '', 'php');
$connection = $Database->connect();
if ($Database->checkError() === "ok") {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $sql = "INSERT INTO questions (title,content) VALUES(?, ?)";
    $stmt = mysqli_prepare($connection, $sql);
    if ($stmt === false) {
      echo mysqli_error($connection);
    }else{
      mysqli_stmt_bind_param($stmt, "ss", $title, $content);
      if (mysqli_stmt_execute($stmt)){
      }else{
        echo mysqli_stmt_error($stmt);
      }
    }
}
?>
