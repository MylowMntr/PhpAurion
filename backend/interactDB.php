<?php

function getSelect_student(){
    require("connectDB.php");
    $request = "SELECT id,prenom FROM utilisateurs WHERE isProf = 0"; 
    $resultat =mysqli_query($connexion,$request); //Executer la requete	
    while($row = mysqli_fetch_assoc($resultat)){
        $nom = $row['prenom'];
        $id = $row['id'];
        echo "<option value='$id'>$nom</option>";
    }
}

function getSelect_matiere(){
    require("connectDB.php");
    $request = "SELECT matiereID as ID,nomMatiere FROM matiere"; 
    $resultat =mysqli_query($connexion,$request); //Executer la requete
    if(mysqli_num_rows($resultat) != 0) {
        while($row = mysqli_fetch_assoc($resultat)){
            $matiere = $row['nomMatiere'];
            $id = $row['ID'];
            echo "<option value='$id'>$matiere</option>";
        }
    }
}

function addAbsence(){
    $idEleve = $_POST['eleve'];
    $idMatiere = $_POST['matiere'];
    $heure = $_POST['duree'];
    $date = date('Y-m-d', strtotime($_POST['date']));
    require("connectDB.php");
    $request ="INSERT INTO absences (idEleve,idMatiere,duree,dateObj) VALUES ($idEleve,$idMatiere,$heure,'$date')";
    $resultat =mysqli_query($connexion,$request); //Executer la requete
    header('location:../ajouterAbsence.php');
}

function addNote(){
    $idEleve = $_POST['eleve'];
    $idMatiere = $_POST['matiere'];
    $note = $_POST['note'];
    require("connectDB.php");
    $request ="INSERT INTO notes (idEleve,idMatiere,note) VALUES ($idEleve,$idMatiere,$note)";
    $resultat =mysqli_query($connexion,$request); //Executer la requete
    header('location:../ajouterNote.php');
}

if($_SERVER["REQUEST_METHOD"] == 'POST') { 
    if(isset($_POST['note'])){
        addNote();
    }
    if(isset($_POST['duree'])){
        if(date('Y-m-d', strtotime($_POST['date'])) != '1970-01-01') addAbsence();
        else header('location:../ajouterAbsence.php');
    }
}
?>