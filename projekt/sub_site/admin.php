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
			<a class="nav_a" href="politique.php">
				Politique
			</a>
			<a class="nav_a" href="sport.php">
				Sport
			</a>
			<a class="nav_a" href="form.html">
				Forma
			</a>
			<a class="nav_a" href="#">
				Admin
			</a>
			<a class="nav_a" href="login.php">
				Log in
			</a>
		</nav>
	</header>
	<section class="flex_container main">
			<article class="container">
			<?php
			$abc = mysqli_connect('localhost', 'root', '', 'projekt') or die('error connecting to mysql server'. mysqli_connect_error());
			?>
			<h2>
				Admin
			</h2>
			<hr>
			<?php
				$level = 0;
				session_start();
				if (isset($_SESSION['admin'])) {
					$level =$_SESSION['admin'];

					if ($level == 1) {
						$query = "SELECT * FROM news";
						$result = mysqli_query($abc, $query);
						echo'					
							<section class="flex_container">';
						while ($row = mysqli_fetch_array($result)) {
							$id = $row['ID'];
							$date = $row['date'];
							$title = $row['title'];
							$c_news = $row['c_news'];
							$news = $row['news'];
							$news_type = $row['news_type'];
							$img = $row['image'];
							$private = $row['private'];
							echo'
							<article class="m_article a_article">
								<hr>
								<p>
									tip vjesti: '.$news_type.'
								</p>
								<p>
									datum predaje: '.$date.'
								</p>
								<p>
									naslov: '.$title.'
								</p>
								<img class="simg" src="../img/'.$img.'">
								<p>
									'.$c_news.'
								</p>
								<button class="delete a_button" id="'.$id.'" onclick="deletePost(this.id)">
									Izbriši
								</button>

							</article>';
						};
						echo'
							</section>';
						mysqli_close($abc);
					}
					else{
						echo 'Nemate administratorska prava';
					}
				}
			?>
			<hr>
				
			</article>
	</section>
	<script src="../js/getID.js"></script>
	<script type="text/javascript">
		function deletePost(id) {
			location.href = "../php/delete.php?id="+id;
		}
	</script>
	<footer class="flex_container">
		<div id="foth"></div>
		<p id="pf">
			Suivez le monde
		</p>
	</footer>
</body>
</html>