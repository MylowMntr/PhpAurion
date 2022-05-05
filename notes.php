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
	<h2>Notes</h2>
	<?php
		require("./backend/connectDB.php");
		$request = "SELECT * FROM notes INNER JOIN matiere ON  matiere.matiereID = notes.idMatiere WHERE idEleve = '".$_SESSION['id']."' ";
		$resultat =mysqli_query($connexion,$request); //Executer la requete	  
		if(mysqli_num_rows($resultat) > 0)  
		{ ?>
			<table class="table table-hover">
			<thead>
				<tr>
					<th scope="col">Matiere</th>
					<th scope="col">Note</th>
				</tr>
			</thead>
			<?php
				while($row = mysqli_fetch_array($resultat)){  
			?>  
				<tr>  
					<th><?php echo $row["nomMatiere"];?></th>  
					<th><?php echo $row["note"]; ?></th>  
				</tr>  
			<?php  
				}  
			?>
			</table>


		<?php
		}
		else{
			echo "<p> Vous n'avez pas d'absence. </p>";
		} 
		?> 	
</div>

<?php include("includes/footer.php");?>

</body>
</html>