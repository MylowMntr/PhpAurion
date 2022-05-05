<!-- si prof, on peut ajouter des notes -->



<!DOCTYPE html>
<html>
<head>
	<?php include("includes/head.php");?>
</head>
<body>

<?php include("includes/top.php");?>
<?php include("includes/navigation.php");?>

<?php 
if(isset($_SESSION["prof"]) && $_SESSION["prof"] == 1){
include("includes/mainconfig.php");?>


<div class="container" id="main-content">
	<h2>Ajouter une note</h2>		
	<form action="gestion.php" method="post">
		<fieldset>
			<label>Eleve</label>
			<select name="eleve">
			<?php
			require("./backend/connectDB.php");
			$request = "SELECT prenom FROM utilisateurs WHERE isProf = 0"; 
			$resultat =mysqli_query($connexion,$request); //Executer la requete	
			while($row = mysqli_fetch_assoc($resultat)){
				$nom = $row['prenom'];
				$id = $row['id'];
				echo "<option value='$id'>$nom</option>";
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
    header('Location: index.php'); // utilisateur ou mot de passe incorrect
 }
?>