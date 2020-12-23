<?php
header('Content-Type: application/json');
if(!empty($_POST["email"]) && !empty($_POST["password"])){
    $email = $_POST["email"];
    $pass = $_POST["password"];
    require_once 'database.php';
    $Database = new Database('localhost', 'root', '', 'php');
    $connection = $Database->connect();
    if ($Database->checkError() === "ok"){
            $sql = "SELECT * FROM users WHERE email = ? AND password = ?";
            $stmt = mysqli_prepare($connection, $sql);
            if ($stmt === false) {
                echo mysqli_error($connection);
            }else{
                mysqli_stmt_bind_param($stmt, "ss", $email, $pass);
                if (mysqli_stmt_execute($stmt)){
                    $result = $stmt->get_result();
                    $row = $result->fetch_assoc();
                    if ($row != null && $row['email'] != null) {
                        session_start();
                        $_SESSION['user'] = array(
                            'id' => $row['id'],
                            'fullName' => $row['fullName'],
                            'email' => $row['email'],
                            'username' => $row['username'],
                            'password' => $row['password']
                        );
                        $return = array('message' => "success");
                    }else{
                        $return = array('errorMessage' => "Incorrect login or/and password!");
                        http_response_code(401);
                    }
                }else{
                    echo mysqli_stmt_error($stmt);
                }
            }
        }
    $stmt->close();
}else{
    $return = array(
        'errorMessage' => "Login attempt denied."
    );
    http_response_code(403);
}
echo (json_encode($return));
?>