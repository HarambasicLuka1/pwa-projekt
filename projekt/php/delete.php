<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=UnifrakturMaguntia">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto Condensed">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<title>
		Le_monde
	</title>
</head>
<body>
	<header class="flex_container">
		<h1>
			Le Monde
		</h1>
		<div id="navh"></div>
		<nav>
			<a class="nav_a" href="../index.php">
				Home
			</a>
			<a class="nav_a" href="../sub_site/politique.php">
				Politique
			</a>
			<a class="nav_a" href="../sub_site/sport.php">
				Sport
			</a>
			<a class="nav_a" href="../sub_site/form.html">
				Forma
			</a>
			<a class="nav_a" href="../sub_site/admin.php">
				Admin
			</a>
			<a class="nav_a" href="../sub_site/login.php">
				Log in
			</a>
		</nav>
	</header>
	<section class="flex_container main">
		<?php
			$id = $_GET['id'];

			$abc = mysqli_connect('localhost', 'root', '', 'projekt') or die('error connecting to mysql server'. mysqli_connect_error());

			$query = "SELECT * FROM news WHERE private=1 AND ID=$id";

			$result = mysqli_query($abc, $query);

			$row = mysqli_fetch_array($result);



			$news_type = $row['news_type'];
			$title = $row['title'];
			$c_news = $row['c_news'];
			$news = $row['news'];
			$img = $row['image'];

			echo'
				<article class="container">
					<p class="warning">
						Izbrisali ste ovaj Članak:
					</p>
					<h3 class="a_title">
						'.$news_type.'
					</h3>
					<h2 class="a_descr">
						'.$title.'
					</h2>
					<p class="a_subtitle">
						'.$c_news.'
					</p>
					<hr class="a_hr">
					<img class="a_img" src="../img/'.$img.'">
					<p class="article">
						'.$news.'
					</p>
				</article>';


			$id = $_GET['id'];
			$abc = mysqli_connect('localhost', 'root', '', 'projekt') or die('error connecting to mysql server'. mysqli_connect_error());
			$query = "DELETE FROM news WHERE ID=$id";
			$result = mysqli_query($abc, $query);
			mysqli_close($abc);
		?>
	</section>
	<footer class="flex_container">
		<div id="foth"></div>
		<p id="pf">
			Suivez le monde
		</p>
	</footer>
</body>
</html>