<div class="jumbotron">

<?php
	session_start();
	if(isset($_SESSION['name'])){
		$name = $_SESSION['name'];
		?>
		<h1>Bonjour <?php echo $name;?> !</h1>
	<?php 
	}
	else{?>
		<h1>Bienvenue sur PhpAurion !</h1>
	<?php
	}
?>

</div>