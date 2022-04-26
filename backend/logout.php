<?php 
	session_start(); //Démarrer la session
	if(isset($_SESSION["name"])){ // si un utilisateur est authentifié
		unset($_SESSION["name"]); //détruire les variable
		session_destroy();//détruire la session
	}
    header("Location:../index.php");
?>
