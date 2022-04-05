<?php 
	session_start(); //Démarrer la session
	if(isset($_SESSION["username"])){ // si un utilisateur est authentifié
		unset($_SESSION["username"]); //détruire les variable
		session_destroy();//détruire la session
	}
    header("Location:../index.php");
?>
