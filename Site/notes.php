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
					<th scope="col">Date</th>
				</tr>
			</thead>
			<?php
				$moy = 0;
				while($row = mysqli_fetch_array($resultat)){ 
					$moy += $row["note"];
			?>  
				
					<tr>  
						<th><?php echo $row["nomMatiere"];?></th>  
						<th><?php echo $row["note"]; ?></th>
						<th><?php echo date('d-m-Y', strtotime($row["noteDate"])) ; ?></th>
					</tr>  
			<?php  
				}
			?>
			</table>


		<?php
		
		echo "<p>Moyenne générale :  <a style='color: #007bff;' >".round(($moy/mysqli_num_rows($resultat)),2)."</a></p>";
		}
		else{
			echo "<p> Vous n'avez pas de notes. </p>";
		} 
		?> 	
</div>

<?php include("includes/footer.php");?>

</body>
</html>