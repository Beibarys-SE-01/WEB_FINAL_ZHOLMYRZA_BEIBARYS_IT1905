<?php
session_start();
if(!file_exists('database.php')){
    die("Sorry, file is not founded. Administration will contact you as soon as you read the site.");
}else{
    require 'database.php';
}
$Database = new Database('localhost', 'root', '', 'php');
$connection = $Database->connect();
if ($Database->checkError() === "ok") {
    $sql = "SELECT * FROM pictures";
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
        <title>Gallery</title>
        <link href="https://fonts.googleapis.com/css?family=Kalam&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/33f3c4ef33.js" crossorigin="anonymous"></script>
        <script src="forAll.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="gallery.css">
    </head>
    <body class="G">
        <?php require 'navbar.php';?>
        <div class="seasons">
            <label><input type="button" onclick="s1(1)" value="season 1"></label>
            <label><input type="button" onclick="s1(2)" value="season 2"></label>
            <label><input type="button" onclick="s1(3)" value="season 3"></label>
            <label><input type="button" onclick="s1(4)" value="season 4"></label>
        </div>
        
        <div id="1" style="display: block;">
            <h1 style="padding-left: 665px; font-family: 'Kalam', cursive;">First season</h1>
            <iframe width="700" height="400" src="https://www.youtube.com/embed/HxtLlByaYTc" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="padding-left: 410px;"></iframe>

            <h1 style="padding-left: 650px; font-family: 'Kalam', cursive;">Interesting facts</h1>
            <div style="padding-left: 410px; width: 700px; font-family: 'Kalam', cursive;">
                <h2>Season 1 (Jan 2017 - May 2017) has 13 episodes, and while and during the filming of the series 146 songs were played</h2>
                <img src="https://c4.wallpaperflare.com/wallpaper/112/49/162/riverdale-lili-reinhart-betty-cooper-camila-mendes-wallpaper-preview.jpg" width="700px">
            </div>
        </div>

        <div id="2" style="display: none;">
            <h1 style="padding-left: 650px; font-family: 'Kalam', cursive;">Second season</h1>
            <iframe width="700" height="400" src="https://www.youtube.com/embed/KCPEHsAViiQ" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="padding-left: 410px;"></iframe>

            <h1 style="padding-left: 650px; font-family: 'Kalam', cursive;">Interesting facts</h1>
            <div style="padding-left: 410px; width: 700px; font-family: 'Kalam', cursive;">
                <h2>Season 2 (Oct 2017 - May 2018) has 22 episodes, and while and during the filming of the series 212 songs were played</h2>
                <img src="https://c4.wallpaperflare.com/wallpaper/724/885/246/riverdale-tv-series-2017-man-cole-sprouse-riverdale-wallpaper-preview.jpg" width="700px">
            </div>
        </div>

        <div id="3" style="display: none;">
            <h1 style="padding-left: 650px; font-family: 'Kalam', cursive;">Third season</h1>
            <iframe width="700" height="400" src="https://www.youtube.com/embed/Ps_hpgC9FDM" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="padding-left: 410px;"></iframe>

            <h1 style="padding-left: 650px; font-family: 'Kalam', cursive;">Interesting facts</h1>
            <div style="padding-left: 410px; width: 700px; font-family: 'Kalam', cursive;">
                <h2>Season 3 (Oct 2018 - May 2019) has 22 episodes, and while and during the filming of the series 196 songs were played</h2>
                <img src="https://c4.wallpaperflare.com/wallpaper/886/263/692/5bf539de5bfe7-wallpaper-preview.jpg" width="700">
            </div>
        </div>

        <div id="4" style="display: none;">
            <h1 style="padding-left: 650px; font-family: 'Kalam', cursive;">Fourth season</h1>
            <iframe width="700" height="400" src="https://www.youtube.com/embed/eW3NRQkJPqU" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="padding-left: 410px;"></iframe>
            
            <h1 style="padding-left: 650px; font-family: 'Kalam', cursive;">Interesting facts</h1>
            <div style="padding-left: 410px; width: 700px; font-family: 'Kalam', cursive;">
                <h2>Season 1 (Oct 2019 - AIRING) has 16 episodes, and while and during the filming of the series 123 songs were played</h2>
                <img src="https://c4.wallpaperflare.com/wallpaper/503/471/762/tv-show-riverdale-camila-mendes-lili-reinhart-wallpaper-preview.jpg" width="700px">
            </div>
        </div>

        <h1 id="name" style="padding-left: 525px; font-family: 'Kalam', cursive;">Photos of scenes of the First season</h1>
            <div class="slideshow-container">
                <?php foreach($rows as $row):?>
                    <div class="mySlides fade">
                        <img width="100%" src="<?=$row['url']?>">
                        <div class="text"><?=$row['description']?></div>
                    </div>
            <?php endforeach;?>
                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>
            </div>
            <?php if(isset($_SESSION['user']) && $_SESSION['user']['id'] === 1):?>
                <form method="post">
                    Change slide number: <input type="text" name="number" class="number"><br>
                    New pictures url: <input type="text" name="pic" class="pic"><br>
                    <button class="change" style="background-color: #3fb4eb;color: white;">Change</button>
                </form>
            <?php endif;?>
            <br>      
            <div style="text-align:center">
                <span class="dot" onclick="currentSlide(1)"></span>
                <span class="dot" onclick="currentSlide(2)"></span> 
                <span class="dot" onclick="currentSlide(3)"></span>
                <span class="dot" onclick="currentSlide(4)"></span> 
                <span class="dot" onclick="currentSlide(5)"></span> 
                <span class="dot" onclick="currentSlide(6)"></span> 
                <span class="dot" onclick="currentSlide(7)"></span> 
                <span class="dot" onclick="currentSlide(8)"></span> 
                <span class="dot" onclick="currentSlide(9)"></span> 
                <span class="dot" onclick="currentSlide(10)"></span> 
                <span class="dot" onclick="currentSlide(11)"></span> 
                <span class="dot" onclick="currentSlide(12)"></span> 
                <span class="dot" onclick="currentSlide(13)"></span>
            </div>
            <div class="GA"></div>
    </body>
</html>
<script type="text/javascript">
	$(function(){
		$('.change').click(function(){
            if ($('.number').val() && $('.pic').val()) {
                $.ajax({
                    url:'save_pic.php',
                    data:{number:$('.number').val(),
                        pic: $('.pic').val()},
                    type:'post',
                    success:function(){
                        alert("DONE!!!");
                    }
                })
            }
			
		});	
	})
</script>