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
	<h2>Absences</h2>
	<?php
		require("./backend/connectDB.php");
		$request = "SELECT * FROM absences INNER JOIN matiere ON  matiere.matiereID = absences.idMatiere WHERE idEleve = '".$_SESSION['id']."' ";

		$resultat =mysqli_query($connexion,$request); //Executer la requete	  
		if(mysqli_num_rows($resultat) > 0)  
		{ ?>
			<table class="table table-hover">
			<thead>
				<tr>
					<th scope="col">Matiere</th>
					<th scope="col">Date</th>
					<th scope="col">Durée d'absence</th>
				</tr>
			</thead>
			<?php
				while($row = mysqli_fetch_array($resultat)){  
			?>  
				<tr>  
					<th scope="col"><?php echo $row["nomMatiere"];?></th>  
					<th scope="col"><?php echo date('d-m-Y', strtotime($row["date"])) ; ?></th>
					<th scope="col"><?php echo $row["duree"]."h"; ?></th>
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