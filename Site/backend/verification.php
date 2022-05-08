<?php
session_start();
if(isset($_POST['username']) && isset($_POST['password']))
{
    // connexion à la base de données
    require('connectDB.php');
    
    // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
    // pour éliminer toute attaque de type injection SQL et XSS
    $username = mysqli_real_escape_string($connexion,htmlspecialchars($_POST['username'])); 
    $password = mysqli_real_escape_string($connexion,htmlspecialchars($_POST['password']));

    setcookie('username',"$username", time() + (24 * 3600),"/");
    setcookie('password',"$password", time() + (24 * 3600),"/");

    if($username !== "" && $password !== "")
    {
        $requete = "SELECT count(*) FROM utilisateurs WHERE
            username = '".$username."' and password = '".$password."' ";
        $exec_requete = mysqli_query($connexion,$requete);
        $reponse      = mysqli_fetch_array($exec_requete);
        $count = $reponse['count(*)'];
        if($count!=0) // nom d'utilisateur et mot de passe correctes
        {
            $requete = "SELECT * FROM utilisateurs WHERE username = '".$username."'";
            $exec_requete = mysqli_query($connexion,$requete);
            $reponse      = mysqli_fetch_assoc($exec_requete);
            $_SESSION['id'] = $reponse['id'];
            $_SESSION['name'] = $reponse['prenom'];
            $_SESSION['prof'] = $reponse['isProf'];

            setcookie('error',"0", time() + (24 * 3600),"/");
            header('Location: ../index.php');
        }
        else
        {
            setcookie('error',"1", time() + (24 * 3600),"/");
            header('Location: ../connexion.php'); // utilisateur ou mot de passe incorrect
        }
    }
    else
    {
        setcookie('error',"2", time() + (24 * 3600),"/");
        header('Location: ../connexion.php'); // utilisateur ou mot de passe vide
    }
}
else
{
   header('Location:../connexion.php');
}
mysqli_close($connexion); // fermer la connexion
?>