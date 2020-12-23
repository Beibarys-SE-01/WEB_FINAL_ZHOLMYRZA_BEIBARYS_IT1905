<?php
if(!file_exists('database.php')){
    die("Sorry, file is not founded. Administration will contact you as soon as you read the site.");
}else{
    require 'database.php';
}
session_start();
$Database = new Database('localhost', 'root', '', 'php');
$connection = $Database->connect();
if ($Database->checkError() === "ok") {
    $sql = "SELECT * FROM artists";
    $res = mysqli_query($connection, $sql);
    if ($res === false) {
        echo mysqli_error($connection);
    }else{
        $rows = mysqli_fetch_all($res,MYSQLI_ASSOC);
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Artists</title>
        <link href="https://fonts.googleapis.com/css?family=Courgette&display=swap" rel="stylesheet">
        <script src="forAll.js"></script>
        <link href="forAll.css" rel="stylesheet" type="text/css">
    </head>
    <body class="artists">
        <?php require 'navbar.php';?>
        <article class="articleArt">
            <div class="sidenav">
                <input type="text" id="mySearch" onkeyup="myFunction()" placeholder="Search..">
                <ul id="myMenu">
                    <li><a href="#K.J. Apa">K.J. Apa</a></li>
                    <li><a href="#Lili Reinhart">Lili Reinhart</a></li>
                    <li><a href="#Camila Mendest">Camila Mendest</a></li>
                    <li><a href="#Cole Sprouse">Cole Sprouse</a></li>
                    <li><a href="#Madeline Petsch">Madeline Petsch</a></li>
                    <li><a href="#Zoé De Grand Maison">Zoé De Grand Maison</a></li>
                    <li><a href="#Mark Andrew Consuelos">Mark Andrew Consuelos</a></li>
                    <li><a href="#Casey Cott">Casey Cott</a></li>
                    <li><a href="#Vanessa Morgan">Vanessa Morgan</a></li>
                    <li><a href="#Other">Other</a></li>
                </ul>
              </div>
            <br>
            <div class="paralaxArt"></div>

            <?php foreach($rows as $row):?>
            <a name="<?=$row['fullName'];?>"></a>
            <div class="carcas">
                <h1><?=$row['fullName'];?></h1>
                <div class="carcas2">
                    <div>
                        <img src="<?=$row['gif'];?>" class="artImg">
                    </div>
                    <div>
                        <h2 class="artInfo">
                            <?=$row['information'];?>
                        </h2>
                    </div>
                </div>
            </div>
                <?php endforeach;?>
                
            <div class="paralaxArt"></div>
        </article>
    </body>
</html>