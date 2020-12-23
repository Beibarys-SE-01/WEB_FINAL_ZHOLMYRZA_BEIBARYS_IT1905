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
    $sql = "SELECT * FROM comments ORDER BY id DESC";
	$result = mysqli_query($connection, $sql);
	if(mysqli_num_rows($result)>0){
		while($row=mysqli_fetch_object($result))
		{
			?>
			<?php if(isset($_SESSION['user']) && $_SESSION['user']['id'] === 1):?>
				<div><a href="user_info.php?id=+<?php echo $row->user_id;?>&com_id=+<?php echo $row->id;?>" style="color:red;text-decoration:none"><?php echo $row->username;?>: </a><i><?php echo $row->content;?></i></div>
			<?php else:?>
				<div><span style="color:red;"><?php echo $row->username;?>: </span><i><?php echo $row->content;?></i></div>
			<?php endif?>
			<div style="font-size:15px"><?php echo $row->publish_date;?></div>
			<?php if (isset($_SESSION['user'])):?>
				<?php if($_SESSION['user']['id'] == $row->user_id || $_SESSION['user']['id'] == 1):?>
					<button class="edit" style="background-color: #3fb4eb;color: white;" value="<?=$row->id?>">edit</button>
					<button class="delete" style="background-color: #3fb4eb;color: white;" value="<?=$row->id?>">delete</button>
				<?php endif;?>
			<?php endif;?>
			<hr>	
			<?php
		}
	}
}
?>