<?php
require 'database.php';
session_start();
$Database = new Database('localhost', 'root', '', 'php');
$connection = $Database->connect();
if ($Database->checkError() === "ok") {
    $sql = "SELECT email FROM users";
    $res = mysqli_query($connection, $sql);
    if ($res === false) {
        echo mysqli_error($connection);
    }else{
        $DBemails = mysqli_fetch_all($res,MYSQLI_ASSOC);
    }
    $check = false;
    $Uemail = $_REQUEST['e'];
    $emailLen = strlen($Uemail);
    foreach($DBemails as $DBemail) {
        if ($Uemail == $DBemail['email'] && $emailLen == strlen($DBemail['email'])) {
            $check = true;
        }
    }
}

if ($check) {
    echo "This account is already used";
}else{
    echo "";
}
?>