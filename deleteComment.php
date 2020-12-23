<?php
require 'database.php';
session_start();
$Database = new Database('localhost', 'root', '', 'php');
$connection = $Database->connect();
if ($Database->checkError() === "ok") {
    $id = $_GET['id'];
    $date = date('Y-m-d H:i:s');
    $sql = "DELETE FROM comments WHERE id=?";
    $stmt = mysqli_prepare($connection, $sql);
    if ($stmt === false) {
        echo mysqli_error($connection);
    }else{
        mysqli_stmt_bind_param($stmt, "i", $id);
        if (mysqli_stmt_execute($stmt)){
            header("Location:FAQ.php#comments");
        }else{
        echo mysqli_stmt_error($stmt);
        }
    }
}
?>