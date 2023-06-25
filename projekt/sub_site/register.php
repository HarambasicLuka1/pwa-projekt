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
			<a class="nav_a" href="login.php">
				Log in
			</a>
		</nav>
	</header>
	<section class="flex_container main">
		<article class="container">

			    <form method="post" action="register.php" name="reg">
			        <br/>

			        <label for="name_u">ime:</label>
			        <br/>
			        <input class="reg" type="text" name="name_u" id="name_u"/>
			        <span id="name_u_msg" class="error"></span>

			        <br/>

			        <label for="s_name_u">prezime:</label>
			        <br/>
			        <input class="reg" type="text" name="s_name_u" id="s_name_u"/>
			        <span id="s_name_u_msg" class="error"></span>

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
			    
			        <label for="rep_pass_u">potvrda lozinke:</label>
			        <br/>
			        <input class="reg" type="password" name="rep_pass_u" id="rep_pass_u"/>
			        <span id="rep_pass_u_msg" class="error"></span>

			        <br/>

			        <label for="">Admin:</label>
			        <input type="checkbox" name="admin" id="admin" value="1">
			        <br/>
			    
			        <input type="submit" name="submit" id="submit" value="Registriraj se">			 
			    </form>
			    <?php
				    if(isset($_POST["submit"])){
				    	$name=$_POST["name_u"];
				    	$s_name=$_POST["s_name_u"];
				        $u_name=$_POST["u_name_u"];
				        $pass=password_hash($_POST["pass_u"], CRYPT_BLOWFISH);
				        if(isset($_POST["admin"])){
				        	$level = 1;
				        }
				        else{
				        	$level = 0;
				        }
				        $abc = mysqli_connect('localhost', 'root', '', 'projekt') or die('error connecing to MySQL server.'. mysqli_connect_error());
				        $query = "SELECT * FROM user WHERE u_name='$u_name'";
				        $result = mysqli_query($abc, $query);
				        if ($result){
				        	$row = mysqli_fetch_array($result);
				        	if (isset($row['u_name'])) {
				            	echo "Korisničko ime se već koristi";
				        	}
				        	else{
					            $query = "INSERT INTO user (name, s_name, u_name, pass, level)
					            VALUES ('$name','$s_name','$u_name','$pass','$level')";
					            $result = mysqli_query($abc, $query) or die('Error querying database.');
					            echo "Registracija je uspješna";
					        }
				        }
				        
				    mysqli_close($abc);
				    }
				    ?>
		</article>
	</section>
	<script src="../js/reg_validation.js"></script>
    
	<footer class="flex_container">
		<div id="foth"></div>
		<p id="pf">
			Suivez le monde
		</p>
	</footer>
</body>
</html>