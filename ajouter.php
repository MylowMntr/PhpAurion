<?php 
if(isset($_SESSION["prof"]) && $_SESSION["prof"] == true)){
include("includes/mainconfig.php");?>

<!DOCTYPE html>
<html>
<head>
	<?php include("includes/head.php");?>
</head>
<body>

<?php include("includes/top.php");?>
<?php include("includes/navigation.php");?>

<div class="container" id="main-content">
	<h2>Ajouter une note</h2>
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