<?php
require 'database.php';
require 'user.php';
session_start();
$User = new User('localhost', 'root', '', 'php');
$connection = $User->connect();
if ($User->checkError() === "ok") {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $sql = "INSERT INTO users(fullName, email, username, password)
                VALUES(?, ?, ?, ?)";
        $stmt = mysqli_prepare($connection, $sql);
        if ($stmt === false) {
            echo mysqli_error($connection);
        }else{
            mysqli_stmt_bind_param($stmt, "ssss", $_POST['fullName'], $_POST['email'], $_POST['username'], $_POST['password']);
            if (mysqli_stmt_execute($stmt)){
                $_SESSION['user'] = ['id' => $row['id'],'fullName' => $_POST['fullName'], 'email' => $_POST["email"], 'username' => $_POST['username'], 'password' => $_POST["password"]];
                header("Location: HomePage.php");
            }
            else{
                echo mysqli_stmt_error($stmt);
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Registration</title>
        <script src="forAll.js"></script>
        <link href="forAll.css" rel="stylesheet" type="text/css">
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script>
            function Loading(email){
                $("#EmailCheck").css("color", "orange");
                if (email != "" || email != " ") {
                    var xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            document.getElementById("EmailCheck").innerHTML = this.responseText;
                        }
                    };
                    xhttp.open("POST", "emailCheck.php?e=" + email, true);
                    xhttp.send();
                }
            }
        </script>
    </head>
    <body class="lr">
        <div class="snake1"></div>
        <form method="post" class="box" >
            <h1>Registration</h1>
            <input type="text" id="fullName" name="fullName" placeholder="Enter your full name">
            <p id="EmailCheck"></p>
            <input id="email" name="email" type="text" placeholder="Email" onkeyup="Loading(this.value)">
            <input id="username" name="username" type="text" placeholder="Username">
            <input id="password" name="password" type="password" placeholder="Password">
            <input id="rpassword" type="password" placeholder="Retype Password">
            <input type="submit" value="End Registration">
            <span style="color:orange">Already have an account? </span><a href="login.php"> Sign In</a>
        </form>
        <div class="snake2"></div>
    </body>
</html>