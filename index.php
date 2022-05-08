<!DOCTYPE html>
<html>
<head>
	<?php include("includes/head.php");?>
</head>
<body>

<?php include("includes/top.php");?>
<?php include("includes/navigation.php");?>

<div class="container" id="main-content">
	<h2>PhpAurion, votre site de gestion scolaire !</h2>
	<p>Ceci est un site de gestion de scolarité créé par Milo Montuori et Sacha Evain.</p>

	<p>Vous pouvez vous connecter en tant que professeur pour ajouter des notes et des absences,<br>
	ou en tant qu'élève pour voir ses notes et absences.</p>

	<p>Pour utiliser le site, une page <a href="connexion.php">de connexion</a> est à disposition pour se connecter.</p>

	<ul>
		<li>
			<p>Les identifiants pour se connecter en tant que professeur sont:</p>
			<ul>
				<li>Nom d'utilisateur: prof</li>
				<li>Mot de passe: prof</li>
			</ul>
		</li>
		
		<li>
			<p>Les identifiants pour se connecter en tant qu'élève sont:</p>
			<ul>
				<li>Nom d'utilisateur: eleve</li>
				<li>Mot de passe: eleve</li>
			</ul>
		</li>
	</ul>
</div>

<?php include("includes/footer.php");?>

</body>
</html>	