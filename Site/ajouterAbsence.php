<!-- si prof, on peut ajouter des absences -->

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
// include("includes/mainconfig.php");
?>
<?php include('backend/interactDB.php'); ?>



<div class="container" id="main-content">
	<h2>Ajouter une absence</h2>
	<form action="backend/interactDB.php" method="post">
		<fieldset>
			<label>Eleve : </label>
			<select name="eleve">
			<?php getSelect_student(); ?>
			</select>
			<br>
			<label>Matière : </label>
			<select name="matiere">
			<?php getSelect_matiere(); ?>
			</select>
			<br>
			<label>Durée :</label>
			<input type="number" name="duree" min=1>
			<br>
			<label>Date : </label>
			<input type="date" name="date">
		</fieldset>
		<input type="submit" value='Ajouter'>
	</form>
	<br>

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