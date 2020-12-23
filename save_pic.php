<?php
require 'database.php';
$Database = new Database('localhost', 'root', '', 'php');
$connection = $Database->connect();
if ($Database->checkError() === "ok") {
    if ($_SERVER["REQUEST_METHOD"]=="POST") {
        $id = $_POST['number'];
        $url = $_POST['pic'];
        $sql = "UPDATE pictures SET url='$url' 
                WHERE id=? ";
        $stmt = mysqli_prepare($connection, $sql);
        if ($stmt === false) {
          echo mysqli_error($connection);
        }else{
          mysqli_stmt_bind_param($stmt, "i", $id);
          if (mysqli_stmt_execute($stmt)){
              header("Location:gallery.php");
          }else{
            echo mysqli_stmt_error($stmt);
          }
        }
    }
}
?>
