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
<?php include('backend/interactDB.php'); ?>


<div class="container" id="main-content">
	<h2>Modifier une note</h2>
	<form action="backend/interactDB.php" method="post">
		<fieldset>
			<label>Eleve : </label>
			<select name="eleve">
			<?php getSelect_student(); ?>
			</select>
			<br>
			<label>Note : </label>
			<select name="matiere">
			<?php getSelect_matiere(); ?>
			</select>
			<br>
			<label>Nouvelle note : </label>
			<input type="number" name="note" min=0 max=20>
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
    header('Location: index.php'); // utilisateur ou mot de passe incorrect
 }
?>