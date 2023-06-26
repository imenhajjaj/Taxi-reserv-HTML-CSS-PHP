<?php
	session_start();
	if(!isset($_SESSION["username"])){
		header("Location: logi.php");
		exit(); 
	}
?>
<!DOCTYPE html>
<html>
	<head>
	<link rel="stylesheet" href="style.css" />
	</head>
	<body>
		<div class="sucess">
		<h1>Bienvenue <?php echo $_SESSION['username']; ?>!</h1>
		<p>C'est votre tableau de bord.</p>
		<a href="logout.php">Déconnexion</a>
		</div>
	</body>
</html>