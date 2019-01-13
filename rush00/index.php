<?php
$host = "localhost:8800";
$user = "amagnan";
$pw = "password";
$db = "rush00";

$conn = mysqli_connect($host, $user, $pw, $db);
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="index.css">
	<title></title>
</head>
<body>
	<div id="top_bar">
		
	</div>
	<div id="middle">
		<div id="left_bar">
			
		</div>
		<div id="right_bar">
			
		</div>
		<center>
			<div class="article">
				<?php
				$result = mysqli_query($conn, "SELECT * FROM `items` WHERE item_id=1");
				foreach ($result as $key => $value)
				{
					echo "<p id='article_name'>".$value['name']."</p><br>";
					echo "<p id='article_info'>".$value['price']."<br>";
					echo $value['ingredients']."</p><br>";
				}
				?>
			</div><br>
			<div class="article">
			
			</div><br>
			<div class="article">
			
			</div><br>
			<div class="article">
			
			</div><br>
		</center>
	</div>
</body>
</html>