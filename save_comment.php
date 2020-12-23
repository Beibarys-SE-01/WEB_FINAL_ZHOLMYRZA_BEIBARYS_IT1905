<?php
require 'database.php';
session_start();
$email = $_SESSION['user']['email'];
$username = $_SESSION['user']['username'];
$Database = new Database('localhost', 'root', '', 'php');
$connection = $Database->connect();
if ($Database->checkError() === "ok") {
    $sql = "SELECT id FROM users WHERE email = ? AND username = ?";
    $stmt = mysqli_prepare($connection, $sql);
    if ($stmt === false) {
        echo mysqli_error($connection);
    }else{
        mysqli_stmt_bind_param($stmt, "ss", $email, $username);
        if (mysqli_stmt_execute($stmt)){
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $user_id = json_encode($row['id']);
        }
    }
    $comment = $_POST['comment'];
    $sql = "INSERT INTO comments (user_id,username,content,publish_date) VALUES(?, ?, ?, ?)";
    $stmt = mysqli_prepare($connection, $sql);
    if ($stmt === false) {
      echo mysqli_error($connection);
    }else{
      $date = date('Y-m-d H:i:s');
      mysqli_stmt_bind_param($stmt, "isss", $user_id, $username, $comment, $date);
      if (mysqli_stmt_execute($stmt)){
      }else{
        echo mysqli_stmt_error($stmt);
      }
    }
}
?>
