<div class="container">
	<ul class="nav nav-pills">
		<li class="nav-item">
			<a class="nav-link <?php if ($CURRENT_PAGE == "Index") {?>active<?php }?>" href="index.php">Home</a>
		</li>
		
		<li class="nav-item">
			<a class="nav-link <?php if ($CURRENT_PAGE == "Connexion") {?>active<?php }?>" href="connexion.php">Se connecter</a>
		</li>

		<li class="nav-item">
			<a class="nav-link" href="backend/logout.php">Déconnexion</a>
		</li>


		<li class="nav-item">
			<a class="nav-link <?php if ($CURRENT_PAGE == "Template") {?>active<?php }?>" href="template.php">TEMPLATE</a>
		</li>
	</ul>
</div>