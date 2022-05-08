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
	<!-- <form action="backend/verification.php" method="POST"> -->
	<form action="backend/verification.php" method="POST">
		<h1>Connexion</h1>
		
		<label><b>Nom d'utilisateur</b></label>		
		<input type="text" <?php if(isset($_COOKIE['username'])){echo "value=".$_COOKIE['username']."";} ?> placeholder="Entrer le nom d'utilisateur" name="username" required>

		<label><b>Mot de passe</b></label>
		<input type="password" placeholder="Entrer le mot de passe" name="password" required>

		<input type="submit" id='submit' value='LOGIN' >
		<?php
		if(isset($_COOKIE['error'])){
			$err = $_COOKIE['error'];
			if($err==1)
				echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
			if($err==2)
				echo "<p style='color:red'>Utilisateur ou mot de passe invalide</p>";
		}
		?>
	</form>
</div>

<?php include("includes/footer.php");?>

</body>
</html>