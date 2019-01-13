<!DOCTYPE html>
<html>
<head>
	<title>Install Database Rush00</title>
	<meta charset="utf-8">
	<style type="text/css">
	#first {
		color: Blue;
	}
	#second {
		color: Gray;
	}
	#third {
		color: Black;
	}
	#fourth {
		color: Red;
	}
	#fifth {
		color: Green;
	}
	</style>
</head>
<body>
	<center>
		<?php
			$host = "localhost:8800";
			$user = "amagnan";
			$pw = "password";
			$db = "rush00";
			$conn = mysqli_connect($host, $user, $pw);

			if (!$conn)
				die("Couldn't connect to mysql");
			else
				echo "<h2 id=\"first\">CONNECTED TO MYSQL!</h2><br>";

			$ret = mysqli_query($conn, "CREATE DATABASE IF NOT EXISTS rush00");

			if (!$ret)
				die("Couldn't create the database");
			else
				echo "<h2 id=\"second\">CREATED DATABASE!</h2><br>";

			$conn = mysqli_connect($host, $user, $pw, $db);

			if (!$conn)
				die("Couldn't connect to the database");
			else
				echo "<h2 id=\"third\">CONNECTED TO DATABASE!</h2><br>";

			$ret = mysqli_query($conn, "CREATE TABLE IF NOT EXISTS `items` (
					`item_id` INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
					`name` VARCHAR(100) NOT NULL,
					`price` INT NOT NULL,
					`ingredients` VARCHAR(500) NOT NULL,
					`type` VARCHAR(10) NOT NULL
					) AUTO_INCREMENT=1");

			if (!$ret)
				die("Couldn't create the items table<br>");
			else
				echo "<h2 id=\"fourth\">CREATED ITEMS TABLE!</h2><br>";

			$ret = mysqli_query($conn, "CREATE TABLE IF NOT EXISTS `order` (
					`order_id` INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
					`price` DOUBLE NOT NULL,
					`login` VARCHAR(100) NOT NULL,
					`archived` TINYINT NOT NULL
				) AUTO_INCREMENT=1");

			if (!$ret)
				die("Couldn't create the order table<br>");
			else
				echo "<h2 id=\"fifth\">CREATED ORDER TABLE!</h2><br>";

			$ret = mysqli_query($conn, "CREATE TABLE IF NOT EXISTS `user` (
					`user_id` INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
					`login` VARCHAR(100) NOT NULL,
					`password` VARCHAR(256) NOT NULL,
					`admin` TINYINT DEFAULT 0
				) AUTO_INCREMENT=1");

			if (!$ret)
				die("Couldn't create the user table<br>");
			else
				echo "<h2 id=\"fifth\">CREATED USER TABLE!</h2><br>";

			$ret = mysqli_query($conn, "INSERT INTO items VALUES (1, 'Le jambon beurre',1,'pain, jambon, beurre','Sandwich')");
			$ret = mysqli_query($conn, "INSERT INTO items VALUES (2, 'Le charcut',1,'pain, jambon cru, tomate, beurre, salade','Sandwich')");
			$ret = mysqli_query($conn, "INSERT INTO items VALUES (3, 'Le tomate mozza',1,'pain, tomate, mozzarella, salade','Sandwich')");
			$ret = mysqli_query($conn, "INSERT INTO items VALUES (4,'Le chèvre miel',1,'pain, tomate, fromage de chèvre, salade','Sandwich')");
			$ret = mysqli_query($conn, "INSERT INTO items VALUES (5,'Le poulet qui fait zizir',1,'pain, poulet, tomate, salade, secret sauce','Sandwich')");

			$ret = mysqli_query($conn, "INSERT INTO items VALUES (6,'La viennoise au chocolat',1,'pain, chocolat','Dessert')");
			$ret = mysqli_query($conn, "INSERT INTO items VALUES (7,'Le palmier géant',1,'DES TRUCS','Dessert')");
			$ret = mysqli_query($conn, "INSERT INTO items VALUES (8,'Le fameux éclair au chocolat',1,'DES TRUCS','Dessert')");
			$ret = mysqli_query($conn, "INSERT INTO items VALUES (9,'Le croissant',1,'DES TRUCS','Dessert')");
			$ret = mysqli_query($conn, "INSERT INTO items VALUES (10, 'Le pain au chocolat',1,'pain, chocolat','Dessert')");

			$ret = mysqli_query($conn, "INSERT INTO items VALUES (11,'Coca Cola',1,'eau, autres trucs','Boisson')");
			$ret = mysqli_query($conn, "INSERT INTO items VALUES (12,'Iced tea',1,'eau, autres trucs','Boisson')");
			$ret = mysqli_query($conn, "INSERT INTO items VALUES (13,'Fanta',1,'eau, autres trucs','Boisson')");
			$ret = mysqli_query($conn, "INSERT INTO items VALUES (14,'Sprite',1,'eau, autres trucs','Boisson')");
			$ret = mysqli_query($conn, "INSERT INTO items VALUES (15,'Dr Pepper',1,'eau, autres trucs','Boisson')");

			$ret = mysqli_query($conn, "INSERT INTO items VALUES (16,'La chèvre miel',1,'salade, fromage de chèvre, tomate, toast','Salade')");
			$ret = mysqli_query($conn, "INSERT INTO items VALUES (17,'La niçoise',1,'Thon, oeuf, tomate, salade, haricot vert, oignon ,poivron vert','Salade')");
			$ret = mysqli_query($conn, "INSERT INTO items VALUES (18,'La jambon cru',1,'Jambon cru, salade, tomate, huile d\'olive','Salade')");
			$ret = mysqli_query($conn, "INSERT INTO items VALUES (19,'La champi',1,'Champignon de paris, salade, huile d\'olive, tomate','Salade')");
			$ret = mysqli_query($conn, "INSERT INTO items VALUES (20,'La caesar',1,'Poulet, crouton, salade, tomate, parmesan, huile d\'olive','Salade')");

			if (!$ret)
				die("Couldn't insert an item<br>");
			else
				echo "<h2 id=\"fifth\">INSERTED ALL ITEMS IN ITEMS!</h2><br>";
		?>
		<a href="index.php" style="font-size: 18px;">Go to website</a>
	</center>
</body>
</html>