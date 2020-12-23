<?php
require 'database.php';
session_start();

if (isset($_SESSION['user'])) {
    header("Location: HomePage.php");
    return;
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <script src="javascript.js"></script>
        <link href="login.css" rel="stylesheet" type="text/css">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="crossorigin="anonymous"></script>
        <script>
            $(document).ready(function() {
                $("#submitbtn").click(function(){
                    event.preventDefault();
                    $.ajax('authorisation.php', {
                        type: 'POST',  
                        data: { email: $( "#email" ).val(),
                            password:  $( "#password" ).val()},
                        accepts: 'application/json; charset=utf-8',
                        success: function (data) {
                            if (data.message == 'success') {
                                window.location.href = "HomePage.php";
                            }
                        },
                        error: function (errorData, textStatus, errorMessage) {
                            var msg = (errorData.responseJSON != null) ? errorData.responseJSON.errorMessage : '';
                            $("#errormsg").text('Error: ' + msg + ', ' + errorData.status);
                            $("#errormsg").css("color", "orange");
                            $("#errormsg").show();
                        }
                    });
                });
            });
        </script>
    </head>
    <body class="lr">
        <div class="snake1"></div>
        <form class="box" method="post">
            <h1>Login</h1>
            <p id="errormsg"></p>
            <input id="email" name="email" type="text" placeholder="Enter email or username">
            <input id="password" name="password" type="password" placeholder="Enter password">
            <input id="submitbtn" type="submit" value="Login">
            <a href="registration.php">Registration</a>
        </form>
        <div class="snake2"></div>
    </body>
</html>