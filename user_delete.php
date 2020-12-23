<?php
require 'database.php';
session_start();
$Database = new Database('localhost', 'root', '', 'php');
$connection = $Database->connect();
if ($Database->checkError() === "ok") {
    $id = $_GET['id'];
    $com_id = $_GET['com_id'];
    $sql = "DELETE FROM users WHERE id=?";
    $stmt = mysqli_prepare($connection, $sql);
    if ($stmt === false) {
        echo mysqli_error($connection);
    }else{
        mysqli_stmt_bind_param($stmt, "i", $id);
        if (mysqli_stmt_execute($stmt)){
            header("Location:deleteComment.php?id=$com_id");
        }else{
        echo mysqli_stmt_error($stmt);
        }
    }
}
?>