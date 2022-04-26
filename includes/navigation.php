<div class="container">
	<ul class="nav nav-pills">
		<li class="nav-item">
			<a class="nav-link <?php if (basename($_SERVER['PHP_SELF']) == "index.php") {?>active<?php }?>" href="index.php">Home</a>
		</li>
		
		<?php
		if (!isset($_SESSION["name"])){
		?>
		<li class="nav-item">
			<a class="nav-link <?php if (basename($_SERVER['PHP_SELF']) == "connexion.php") {?>active<?php }?>" href="connexion.php">Se connecter</a>
		</li>
		<?php 
		}
		?>

		<?php
		if (isset($_SESSION["name"])){
			if (isset($_SESSION["prof"]) && ($_SESSION["prof"] == 0)){
			?>
				<li class="nav-item">
					<a class="nav-link <?php if (basename($_SERVER['PHP_SELF']) == "notes.php") {?>active<?php }?>" href="notes.php">Mes notes</a>
				</li>

				<li class="nav-item">
					<a class="nav-link <?php if (basename($_SERVER['PHP_SELF']) == "absences.php") {?>active<?php }?>" href="absences.php">Mes absences</a>
				</li>
			<?php 
			}
			if (isset($_SESSION["prof"]) && ($_SESSION["prof"] == 1)){
			?>
				<li class="nav-item">
					<a class="nav-link <?php if (basename($_SERVER['PHP_SELF']) == "ajouterNote.php") {?>active<?php }?>" href="ajouterNote.php">Ajouter une note</a>
				</li>

				<li class="nav-item">
					<a class="nav-link <?php if (basename($_SERVER['PHP_SELF']) == "ajouterAbsence.php") {?>active<?php }?>" href="ajouterAbsence.php">Ajouter une absence</a>
				</li>
			<?php 
			}
			?>

			<li class="nav-item">
				<a class="nav-link" href="backend/logout.php">Déconnexion</a>
			</li>
		<?php 
		}
		?>



		<!-- <li class="nav-item">
			<a class="nav-link <?php if (basename($_SERVER['PHP_SELF']) == "template.php") {?>active<?php }?>" href="template.php">TEMPLATE</a>
		</li> -->
	</ul>
</div>