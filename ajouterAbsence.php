<!-- si prof, on peut ajouter des absences -->



<!DOCTYPE html>
<html>
<head>
	<?php include("includes/head.php");?>
</head>
<body>
<?php include("includes/top.php");?>

<?php include("includes/navigation.php");?>
<?php 
if(isset($_SESSION['prof']) && ($_SESSION['prof'] == 1)){
include("includes/mainconfig.php");?>


<div class="container" id="main-content">
	<h2>Ajouter une absence</h2>		
	<form action="gestion.php" method="post">
		<fieldset>
			<label>Eleve</label>
			<select name="eleve">
			<?php
			require("./backend/connectDB.php");
			$request = "SELECT nom FROM utilisateurs WHERE isProf = false"; 
			$resultat =mysqli_query($connexion,$request); //Executer la requete	
			while($row = mysqli_fetch_assoc($resultat)){
				$nom = $row['nom'];
				$id = $row['id'];
				echo "<option value='$id>$nom</option>";
			}
			?>
		</fieldset>
	</form>
			
</div>

<?php include("includes/footer.php");?>

</body>
</html>


<?php 
}

else{
	// echo $_SESSION['prof'];
    header('Location: index.php'); // utilisateur ou mot de passe incorrect
 }
?>