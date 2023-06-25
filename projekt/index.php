<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=UnifrakturMaguntia">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto Condensed">
	<link rel="stylesheet" type="text/css" href="css/style.css">
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
			<a class="nav_a" href="#">
				Home
			</a>
			<a class="nav_a" href="sub_site/politique.php">
				Politique
			</a>
			<a class="nav_a" href="sub_site/sport.php">
				Sport
			</a>
			<a class="nav_a" href="sub_site/form.html">
				Forma
			</a>
			<a class="nav_a" href="sub_site/admin.php">
				Admin
			</a>
			<a class="nav_a" href="sub_site/login.php">
				Log in
			</a>
		</nav>
	</header>
	<div class="flex_container main">
		<div class="container">

			<?php


			$abc = mysqli_connect('localhost', 'root', '', 'projekt') or die('error connecting to mysql server'. mysqli_connect_error());

			?>

			<script type="text/javascript">
				function getId(id) {
					location.href = "sub_site/article.php?id="+id;
				}
			</script>
			
			<hr>
			<?php

				$query = "SELECT * FROM news WHERE private=1 AND news_type='Politique' LIMIT 6";
				$result = mysqli_query($abc, $query);

				$row = mysqli_fetch_array($result);
				if (isset($row['ID'])) {
					$news_type = $row['news_type'];
					echo'
						<h2>
							'.$news_type.'
						</h2>
						<section class="flex_container">';
					do {
						$id = $row['ID'];
						$c_news = $row['c_news'];
						$img = $row['image'];
						echo'
						<article class="m_article" id="'.$id.'" onclick="getId(this.id)">
							<img class="simg" src="img/'.$img.'">
							<p>
								'.$c_news.'
							</p>
						</article>';
					} while ($row = mysqli_fetch_array($result));
					echo'
						</section>';
				}
			?>
			<hr>
			<?php

				$query = "SELECT * FROM news WHERE private=1 AND news_type='Sport' LIMIT 6";
				$result = mysqli_query($abc, $query);

				$row = mysqli_fetch_array($result);
				if (isset($row['ID'])) {
					$news_type = $row['news_type'];

					echo'
						<h2>
							'.$news_type.'
						</h2>
						<section class="flex_container">';
					do {
						$id = $row['ID'];
						$c_news = $row['c_news'];
						$img = $row['image'];
						echo'
						<article class="m_article" id="'.$id.'" onclick="getId(this.id)">
							<img class="simg" src="img/'.$img.'">
							<p>
								'.$c_news.'
							</p>
						</article>';
					} while ($row = mysqli_fetch_array($result));
					echo'
						</section>';
				}
				mysqli_close($abc);
			?>
			<hr>
		</div>
	</div>
	<footer class="flex_container">
		<div id="foth"></div>
		<p id="pf">
			Suivez le monde
		</p>
	</footer>
</body>
</html>