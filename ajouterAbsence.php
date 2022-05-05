<!-- si prof, on peut ajouter des notes -->

<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	if(isset($_POST['eleve']) and isset($_POST['heures'])){
		require('./backend/connectDB.php');
		$student = $_POST['eleve'];
		$count = (int)($_POST['heures']);
		$request="SELECT absences FROM utilisateurs WHERE nom='$student'";
		$resultat =mysqli_query($connexion,$request);
		$tmpCount = mysqli_fetch_assoc($resultat);
		if($tmpCount){
			$count += (int)$tmpCount['absences'];
		}
		$request="UPDATE utilisateurs SET absences = '$count' WHERE id='$student'";
		$resultat =mysqli_query($connexion,$request);
	}
}
?>

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
	<form action="ajouterAbsence.php" method="post">
		<fieldset>
			<label>Eleve : </label>
			<select name="eleve">
			<?php
			require("./backend/connectDB.php");
			$request = "SELECT id,nom FROM utilisateurs WHERE isProf = 0"; 
			$resultat =mysqli_query($connexion,$request); //Executer la requete	
			while($row = mysqli_fetch_assoc($resultat)){
				$nom = $row['nom'];
				$id = $row['id'];
				echo "<option value='$id'>$nom</option>";
			}
			?>
			</select>
			<br>
			<label for="nbHeures">Heures d'absences :</label>
			<input type="text" id="nbHeures" name="heures" size="30" maxlength="30">
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