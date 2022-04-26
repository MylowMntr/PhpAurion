<?php
session_start();
if(isset($_POST['username']) && isset($_POST['password']))
{
   $_SESSION['name'] = $_POST['username'];
   // echo $_SESSION['name'];
   header('Location: ../index.php');
}
else
{
   header('Location: ../connexion.php');
}
?>