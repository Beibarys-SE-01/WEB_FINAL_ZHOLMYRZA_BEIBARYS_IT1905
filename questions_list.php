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
    $sql = "SELECT * FROM questions";
	$result = mysqli_query($connection, $sql);
	if(mysqli_num_rows($result)>0){
		while($row=mysqli_fetch_object($result))
		{
			?>
            <h1><?php echo $row->title;?></h1>
			<p><?php echo $row->content;?></p>
			<?php if(isset($_SESSION['user'])):?>
				<?php if( $_SESSION['user']['id'] == 1):?>
					<button class="editq" style="background-color: #3fb4eb;color: white;" value="<?=$row->id?>">edit</button>
					<button class="deleteq" style="background-color: #3fb4eb;color: white;" value="<?=$row->id?>">delete</button>
				<?php endif;?>
			<?php endif;?>
			<hr>	
			<?php
		}
	}
}
?>