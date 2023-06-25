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

<?php
	if (isset($_POST['submit'])) {

		$title=$_POST['title'];
		$c_news=$_POST['c_news'];
		$news=$_POST['news'];
		$news_type=$_POST['news_type'];
		$img=$_FILES['image']['name'];
		$private=$_POST['privae'];



		if ($private == 'n') {
			$private = 0;
		}
		else if ($private == 'y') {
			$private = 1;
		}

		$date = date('Y-m-d');

		$abc = mysqli_connect('localhost', 'root', '', 'projekt') or die('error connecting to mysql server'. mysqli_connect_error());

		$query = "INSERT INTO news (date, title, c_news, news, news_type, image, private) VALUES ('$date', '$title', '$c_news', '$news', '$news_type', '$img', '$private')";

		move_uploaded_file($_FILES['image']['tmp_name'], "../img/$img");

		$result = mysqli_query($abc, $query) or die('Error queryng database.');

		mysqli_close($abc);

	}
?>


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
		</nav>
	</header>
	<section class="flex_container main">
		<article class="container">
	<?php
		if (isset($_POST['submit'])) {
			
			if ($private != 'n') {
				echo '	<h3 class="a_title">'
						. $news_type .'
						</h3>
						<h2 class="a_descr">'
						. $title .'
						</h2>
						<p class="a_subtitle">'
						.$c_news.'
						</p>
						<hr class="a_hr">
						<img class="a_img" src="../img/'.$img.'">
						<p class="article">'
						.$news.'
						</p>';
			}
			else if ($private == 'n') {
				echo 'Vjest je spremljena privatno';
			}
		}
		mysqli_close($abc);
	?>
		</article>
	</section>
	<footer class="flex_container">
		<div id="foth"></div>
		<p id="pf">
			Suivez le monde
		</p>
	</footer>
</body>
</html>
