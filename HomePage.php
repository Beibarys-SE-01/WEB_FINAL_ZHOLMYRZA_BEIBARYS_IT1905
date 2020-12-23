<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>HOME</title>
        <link href="forAll.css" rel="stylesheet" type="text/css">
        <script src="https://kit.fontawesome.com/33f3c4ef33.js" crossorigin="anonymous"></script>
        <script src="forAll.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"
                integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
                crossorigin="anonymous"></script>
    </head>
    <body class="home">
        <?php require 'navbar.php';?>
        <article style=" display: flex;flex-direction: row; justify-content: space-around;">
            <div class="homePage">
                <h1>Welcome to the Riverdale fan page</h1>
                <img width="200px" height="50px" src="https://occ-0-2773-2774.1.nflxso.net/dnm/api/v6/AwfSa8TtJlDHJjLcbE--NI7p5gU/AAAABXBJB9_U_uQ1V2BaYyOKVnvnlbTJEDgSYJV9p0pKzbtBc6O9KfeqoNx9XMwF9VXFAJdTdE_ZQrAQt_LzMmwj0nmdzdgMXPxngF7d5jnY073Uj9oMB6Uft2-hltVAg7tQmolirnoWJbyxbZ6J8VQ3uuF5lENmZEJxSqzQEhrwpOPbpA.png?r=4ec">
                <p>2017 | 18+ | 4 Seasons | US TV Shows</p>
                <p>
                    While navigating the troubled waters of sex, romance, school and family, teen Archie and his gang become entangled in a dark Riverdale mystery
                </p>
                
                <div class="social">
                    <a href="https://twitter.com/riverdalefansol" title="twitter"><i class='fab fa-twitter-square' style='font-size:36px'></i></a>
                    <a href="https://vk.com/riverdale258" title="vkontakte"><i class='fab fa-vk' style='font-size:36px'></i></a>
                    <a href="https://www.youtube.com/channel/UCJyEY_Iwtg8-FLP3Gg5pL0Q" title="youtube"><i class='fab fa-youtube' style='font-size:36px'></i></a>
                </div>
            </div>
            <?php if (isset($_SESSION['user'])):?>
                <div class="homePage">
                <h1>Hello, <?=$_SESSION['user']['fullName']?>!</h1>
                <p>This is your personal page and only you can see all information here, and also you can change it.
                Don't fogive you registered by using <span style="color:red;"><?=$_SESSION['user']['email']?></span><br> and your password is <span style="color:red;"><?=$_SESSION['user']['password']?></span><br>
                </p>
                <a href="signOut.php" style="color:white; font-size:20px">Sign Out</a>
                </div>
            <?php else:?>
                <div style="border:none" class="homePage"></div>
            <?php endif?>
        </article>
        <footer class="footer">
            <h1> &#169;<a id="ZB" href="contact.php">Zholmyrza Beibarys IT-1905</a></h1>
        </footer>
    </body>
</html>