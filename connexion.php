<?php include("includes/mainconfig.php");?>

<!DOCTYPE html>
<html>
<head>
	<?php include("includes/head.php");?>
</head>
<body>

<?php include("includes/top.php");?>
<?php include("includes/navigation.php");?>

<div class="container" id="main-content">
            <!-- zone de connexion -->
	<form action="verification.php" method="POST">
		<h1>Connexion</h1>
		
		<label><b>Nom d'utilisateur</b></label>
		<input type="text" placeholder="Entrer le nom d'utilisateur" name="username" required>

		<label><b>Mot de passe</b></label>
		<input type="password" placeholder="Entrer le mot de passe" name="password" required>

		<input type="submit" id='submit' value='LOGIN' >
		<?php
		if(isset($_GET['erreur'])){
			$err = $_GET['erreur'];
			if($err==1 || $err==2)
				echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
		}
		?>
	</form>
</div>

<?php include("includes/footer.php");?>

</body>
</html>