<?php
require 'database.php';
require 'user.php';
session_start();
if(!isset($_SESSION['user']) && $_SESSION['user']['id'] != 1){
    header("Location: HomePage.php");
}
$User = new User('localhost', 'root', '', 'php');
$connection = $User->connect();
if ($User->checkError() === "ok") {
    error_reporting(0);
    try{
        if(!$_GET['id']) throw new Exception("User is not found!");
        else $id = $_GET['id'];
    }catch(Exception $e){
        echo $e->getMessage()."<br>";
    }
    try{
        if(!$_GET['com_id']) throw new Exception("User was choosed not from FAQ page! <b>NOTE</b>: if you will delete user now, his comment will not deleted!!");
        else $com_id = $_GET['com_id'];error_reporting(E_ALL);
    }catch(Exception $e){
        echo $e->getMessage()."<br>";
    }
    $sql = "SELECT * FROM users WHERE id=?";
    $stmt = mysqli_prepare($connection, $sql);
    if ($stmt === false) {
        echo mysqli_error($connection);
    }else{
        mysqli_stmt_bind_param($stmt, "i", $id);
        if (mysqli_stmt_execute($stmt)){
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
        }else{
        echo mysqli_stmt_error($stmt);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <style>
        body{
            padding:0;
            height:100%;
            width:100%;
            display:flex;
            justify-content:center;
            align-items:center;
        }
        th,td{
            border: solid black 2px;
        }
    </style>
</head>
<body>
    <div>
        <table  class="table table-striped table-dark">
            <tr>
                <th scope="col">id</th>
                <th scope="col">fullName</th>
                <th scope="col">email</th>
                <th scope="col">username</th>
            </tr>
            <tr>
            <?php try{
                if (!$row['id']){
                    $User->setInformation("NULL","NULL","NULL","NULL");
                }else{
                    $User->setInformation($row['id'],$row['fullName'],$row['email'],$row['username']);
                }
                
                throw new Exception("User not found");
            }
            catch(Exception $e){
                $e->getMessage();
            }
            ?>
                <td><?=$User->getId()?></td>
                <td><?=$User->getName()?></td>
                <td><?=$User->getEmail()?></td>
                <td><?=$User->getUsername()?></td>
            </tr>
        </table>
    <button class="delete" style="background-color: #3fb4eb;color: white;">Delete User</button>
    </div>
</body>
</html>
<script>
    $('.delete').click(function(){
        window.location.href = 'user_delete.php?id=<?=$row['id']?>&com_id=<?=$com_id?>';
    })
</script>