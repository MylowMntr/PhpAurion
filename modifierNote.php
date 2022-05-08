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
// include("includes/mainconfig.php");
include('backend/interactDB.php'); ?>


<div class="container" id="main-content">
	<h2>Modifier une note</h2>
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
			<label>Date : </label>
			<input type="date" name="date">
			<br>
			<label>Nouvelle note (-1 pour supprimer) : </label>
			<input type="number" name="new_note" min=-1 max=20>
		</fieldset>
		<input type="submit" value='Modifier'>

	</form>
	<br>
<?php
if(isset($_COOKIE['error'])){
	$err = $_COOKIE['error'];
	if($err==4)
		echo "<p style='color:red'>Problème lors de la suppression de la note.</p>";
}
?>
</div>


<div class="container" id="main-content">
<?php
	require("./backend/connectDB.php");
	$request = "SELECT * FROM notes INNER JOIN matiere ON  (matiere.matiereID = notes.idMatiere) INNER JOIN utilisateurs ON (utilisateurs.id = notes.idEleve)";
	$resultat =mysqli_query($connexion,$request); //Executer la requete
	if(mysqli_num_rows($resultat) > 0)  
	{ 
?>
	<h4> Liste des notes actuelles </h4>
	<table class="table table-hover">
		<thead>
			<tr>
				<th scope="col">Matiere</th>
				<th scope="col">Eleve</th>
				<th scope="col">Note</th>
				<th scope="col">Date</th>
			</tr>
		</thead>
		<?php
			while($row = mysqli_fetch_array($resultat)){ 
		?>  
			
				<tr>  
					<th><?php echo $row["nomMatiere"];?></th>
					<th><?php echo $row["prenom"];?></th> 
					<th><?php echo $row["note"]; ?></th>
					<th><?php echo date('d-m-Y', strtotime($row["noteDate"])) ; ?></th>
				</tr>  
		<?php  
			}
		?>
	</table>
	<?php  
		}
	?>	
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