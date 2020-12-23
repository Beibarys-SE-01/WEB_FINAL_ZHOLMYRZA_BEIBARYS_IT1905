<?php
session_start();
if(!file_exists('database.php')){
    die("Sorry, file is not founded. Administration will contact you as soon as you read the site.");
}else{
    require 'database.php';
}
$Database = new Database('localhost', 'root', '', 'php');
$connection = $Database->connect();
if ($Database->checkError() === "ok"){
    $sql = "SELECT * FROM questions";
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
    <haed>
        <title>FAQ</title>
        <link href="https://fonts.googleapis.com/css?family=Permanent+Marker&display=swap" rel="stylesheet">
        <link href="forAll.css" rel="stylesheet" type="text/css">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
</head>
    </haed>
    <body>
        <?php require 'navbar.php';?>
        <article class="faq">
            <div class="paralaxFAQ"></div>
            <div class="q">
                <a href="#questions" style="font-size: x-large;">Questions</a>
                OR
                <a href="#comments" style="font-size: x-large;">Comments</a>
            </div>
            <hr>
            <hr>
            <a name="questions"></a>
            <hr>
            <hr>
            <div class="q">
                <div class="questions_listing"></div>
            </div>

            
            <div class="q">
                <?php if ($_SESSION['user']['id'] === 1):?>
                    <input type="text" name="title" class="title" placeholder="Title..."><br>
                    <textarea name="content" class="content" cols="20" rows="10"placeholder="Question..."></textarea><br>
                    <button class="questionA" style="background-color: #3fb4eb;color: white;">Add Question</button>
			        <p id="msgQ">&nbsp;</p>
                <?php endif;?>
            </div>
            
            <div class="paralaxFAQ"></div>
            <hr>
            <a name="comments"></a>
            <hr>
            <hr>
            <div class="q">
                <div class="container">
                    <h1>Post Your Comment Below</h1>
                    <div>
                        <textarea id="comment" class="comment" cols="40" rows="5" placeholder="             Enter your comment"></textarea><br>
                        <?php if (isset($_SESSION['user'])):?>
                            <button class="submit" style="background-color: #3fb4eb;color: white;">Add Comments</button><br>
                        <?php else:?>
                            <button onclick="window.location.href = 'login.php';" style="background-color: #3fb4eb;color: white;">Add Comments</button><br>
                        <?php endif;?>
                    </div>
			        <p id="msg">&nbsp;</p>
                    <div class="comment_listing"></div>
                </div>
            </div>
            <div class="paralaxFAQ"></div>
        </article>
    </body>
</html>
<script type="text/javascript">
	$(function(){
		$('.questionA').click(function(){
            if ($('.title').val() && $('.content').val()) {
                $.ajax({
                    url:'save_question.php',
                    data:{title:$('.title').val(),
                        content: $('.content').val()},
                    type:'post',
                    success:function(){
                        alert("DONE!!!");
                    }
                })
            }else{
                $('#msg').css('color', "orange");
                $('#msg').html("You cann't post empty comment");
            }
            
			$.ajax({
				url:'questions_list.php',
				success:function(res)
				{
					$('.questions_listing').html(res);
				}
			});
		});
			$.ajax({
				url:'questions_list.php',
				success:function(res)
				{
					$('.questions_listing').html(res);
				}
			});
        $('.questions_listing').mouseenter(function(){
            $('.editq').click(function(){
                window.location.href = 'editQuestion.php?id=' + $('.editq').val();
            });
            $('.deleteq').click(function(){
                window.location.href = 'deleteQuestions.php?id=' + $('.deleteq').val();
            })
        });
	})
</script>

<script type="text/javascript">
	$(function(){
		$('.submit').click(function(){
            if ($('.comment').val()) {
                var comment = $('.comment').val();
                $.ajax({
                    url:'save_comment.php',
                    data:{comment: comment},
                    type:'post',
                    success:function(){
                        alert("Your comment has been posted");
                    }
                })
            }else{
                $('#msg').css('color', "orange");
                $('#msg').html("You cann't post empty comment");
            }
            
			$.ajax({
				url:'comments_list.php',
				success:function(res)
				{
					$('.comment_listing').html(res);
				}
			});
		});
			$.ajax({
				url:'comments_list.php',
				success:function(res)
				{
					$('.comment_listing').html(res);
				}
			});
        $('.comment_listing').mouseenter(function(){
            $('.edit').click(function(){
                window.location.href = 'editComment.php?id=' + $('.edit').val();
            });
            $('.delete').click(function(){
                window.location.href = 'deleteComment.php?id=' + $('.delete').val();
            })
        });
	})
</script>