<div class="jumbotron">

<?php
	if(isset($_GET['name'])){
		$name = $_GET['name'];
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