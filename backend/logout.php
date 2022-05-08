<?php 
	session_start(); //Démarrer la session
	if(isset($_SESSION["name"])){ // si un utilisateur est authentifié
		unset($_SESSION["name"]); //détruire les variable
		session_destroy();//détruire la session

		setcookie('username',"", time() - (24 * 3600),"/");
		setcookie('password',"", time() - (24 * 3600),"/");
		setcookie('error',"", time() - (24 * 3600),"/");

	}
    header("Location:../index.php");
?>
