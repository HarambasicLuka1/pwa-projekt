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
			<a class="nav_a" href="admin.php">
				Admin
			</a>
			<a class="nav_a" href="#">
				Log in
			</a>
		</nav>
	</header>
	<section class="flex_container main">
		<article class="container">

			    <form method="post" action="login.php" name="reg">
			        
			        <br/>

			        <label for="u_name_u">Korisničmo ime:</label>
			        <br/>
			        <input class="reg" type="text" name="u_name_u" id="u_name_u"/>
			        <span id="u_name_u_msg" class="error"></span>

			        <br/>
			    
			        <label for="pass_u">Lozinka:</label>
			        <br/>
			        <input class="reg" type="password" name="pass_u" id="pass_u"/>
			        <span id="pass_u_msg" class="error"></span>

			        <br/>
			        <br/>


			        <input type="submit" name="submit" id="submit" value="Ulogiraj se">			 
			    </form>

			    <a href="register.php">
			    	<button class="reg_button">Registriraj se</button>
			    </a>

			    <?php
				    if(isset($_POST["submit"])){
				        $u_name=$_POST["u_name_u"];
				        $abc = mysqli_connect('localhost', 'root', '', 'projekt') or die('error connecing to MySQL server.'. mysqli_connect_error());

				        $query = "SELECT * FROM user WHERE u_name='$u_name'";
				        $result = mysqli_query($abc, $query);
				        if ($result) {
				        	$row = mysqli_fetch_array($result);
				        	if (isset($row['u_name'])) {
					        	if (password_verify($_POST['pass_u'], $row['pass'])) {
					        		echo 'Prijava uspiješna';
					        		session_start();
					        		$_SESSION['user'] = $row['u_name'];
					        		if ($row['level'] == 1) {
					        			$_SESSION['admin'] = 1;
					        		}
					        		else{
					        			$_SESSION['admin'] = 0;
					        		}
					        	}
					        	else{
					        		echo 'pogrešna lozinka';
					        	}
					        }
					        else{
					        	echo 'Unjeli sete nepostojeće korisničko ime';
					        }
				    	}
				    mysqli_close($abc);
				    }
				    ?>
		</article>
	</section>
    
	<script src="../js/log_validation.js"></script>
	<footer class="flex_container">
		<div id="foth"></div>
		<p id="pf">
			Suivez le monde
		</p>
	</footer>
</body>
</html>