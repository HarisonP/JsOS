<?php
session_start();
if(!isset($_SESSION['rank']) || $_SESSION['rank']!='admin')
{
http_response_code(403);
exit();
}
?>
<html>
	<head>
		<script src="http://code.jquery.com/jquery-2.0.1.min.js"></script>
		<script src="style.js"></script>
		<link rel="stylesheet" type="text/css" href="../test.css">
	</head>
	<body>
		<div class="paper">
		
			<div class="content">
				<h1><a href="adminPanel.php"> Admin Panel <a></h1>

				<?php
					if($_SERVER['REQUEST_METHOD']==="POST" && isset($_POST['programName']))
					{
						echo'<form  method="post"  action="./update_file.php" enctype="multipart/form-data">';
						echo'<input type="hidden" name="programName" value="'.$_POST['programName'].'" ></input>';
						echo'<br/>';
						echo'<label for="file"> Fiename: </label>';
						echo'<br/>';
						echo'<input type="file" name="file0" id="file"> </br></br>';
						echo'<a id="uploader" href=""> Upload more </a> <br/><br/>';
						echo'<input type="submit" value="Submit">';
						echo'</form>';
					}
					else
					echo '<h3>ERROR</h3>';
					?>
					
			</div>
			
		<?php include '../controls/footer.php'; ?>
		</div>
	</body>
</html>