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
			$user = "root";
			$pw = "root";
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
					`type` VARCHAR(10) NOT NULL,
					`url` VARCHAR(50) NOT NULL
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

			$ret = mysqli_query($conn, "INSERT INTO items VALUES (1, 'Le jambon beurre',7,'pain, jambon, beurre','Sandwich', 'img/sandwich/le_jambon_beurre.jpeg')");
			$ret = mysqli_query($conn, "INSERT INTO items VALUES (2, 'Le charcut',9,'pain, jambon cru, tomate, beurre, salade','Sandwich', 'img/sandwich/le_jambon_cru.jpeg')");
			$ret = mysqli_query($conn, "INSERT INTO items VALUES (3, 'Le tomate mozza',8,'pain, tomate, mozzarella, salade','Sandwich', 'img/sandwich/le_tomate_mozza.jpeg')");
			$ret = mysqli_query($conn, "INSERT INTO items VALUES (4,'Le chèvre miel',9,'pain, tomate, fromage de chèvre, salade','Sandwich', 'img/sandwich/le_chevre_miel.jpeg')");
			$ret = mysqli_query($conn, "INSERT INTO items VALUES (5,'Le poulet qui fait zizir',8,'pain, poulet, tomate, salade, secret sauce','Sandwich', 'img/sandwich/le_poulet_qui_fait_zizir.jpeg')");

			$ret = mysqli_query($conn, "INSERT INTO items VALUES (6,'La viennoise au chocolat',3,'pain, chocolat','Dessert', 'img/dessert/la_viennoise_au_chocolat.jpeg')");
			$ret = mysqli_query($conn, "INSERT INTO items VALUES (7,'Le palmier géant',2,'DES TRUCS','Dessert', 'img/dessert/la_palmier_geant.jpeg')");
			$ret = mysqli_query($conn, "INSERT INTO items VALUES (8,'Le fameux éclair au chocolat',4,'DES TRUCS','Dessert', 'img/dessert/eclair_au_chocolat.jpeg')");
			$ret = mysqli_query($conn, "INSERT INTO items VALUES (9,'Le croissant',2,'DES TRUCS','Dessert', 'img/dessert/croissant.jpeg')");
			$ret = mysqli_query($conn, "INSERT INTO items VALUES (10, 'Le pain au chocolat',1,'pain, chocolat','Dessert', 'img/dessert/pain_au_chocolat.jpeg')");

			$ret = mysqli_query($conn, "INSERT INTO items VALUES (11,'Coca Cola',2,'eau, autres trucs','Boisson', 'img/boisson/coca_cola.jpeg')");
			$ret = mysqli_query($conn, "INSERT INTO items VALUES (12,'Iced tea',2,'eau, autres trucs','Boisson', 'img/boisson/Ice_tea.jpeg')");
			$ret = mysqli_query($conn, "INSERT INTO items VALUES (13,'Fanta',2,'eau, autres trucs','Boisson', 'img/boisson/fanta.jpeg')");
			$ret = mysqli_query($conn, "INSERT INTO items VALUES (14,'Sprite',2,'eau, autres trucs','Boisson', 'img/boisson/sprite.jpeg')");
			$ret = mysqli_query($conn, "INSERT INTO items VALUES (15,'Dr Pepper',2,'eau, autres trucs','Boisson', 'img/boisson/dr_pepper.jpeg')");

			$ret = mysqli_query($conn, "INSERT INTO items VALUES (16,'La chèvre miel',6,'salade, fromage de chèvre, tomate, toast','Salade', 'img/salade/la_chevre_miel.jpeg')");
			$ret = mysqli_query($conn, "INSERT INTO items VALUES (17,'La niçoise',5,'Thon, oeuf, tomate, salade, haricot vert, oignon ,poivron vert','Salade', 'img/salade/salade_nicoise.jpeg')");
			$ret = mysqli_query($conn, "INSERT INTO items VALUES (18,'La jambon cru',7,'Jambon cru, salade, tomate, huile d\'olive','Salade', 'img/salade/salade_jambon_cru.jpeg')");
			$ret = mysqli_query($conn, "INSERT INTO items VALUES (19,'La champi',6,'Champignon de paris, salade, huile d\'olive, tomate','Salade', 'img/salade/salade_champi.jpeg')");
			$ret = mysqli_query($conn, "INSERT INTO items VALUES (20,'La caesar',6,'Poulet, crouton, salade, tomate, parmesan, huile d\'olive','Salade', 'img/salade/salade_caesar.jpeg')");
		?>
		<a href="index.php" style="font-size: 18px;">Go to website</a>
	</center>
</body>
</html>