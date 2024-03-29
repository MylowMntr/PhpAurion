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
    $date = date('Y-m-d', strtotime($_POST['date']));
    require("connectDB.php");
    $request ="INSERT INTO notes (idEleve,idMatiere,note,noteDate) VALUES ($idEleve,$idMatiere,$note,'$date')";
    $resultat =mysqli_query($connexion,$request); //Executer la requete
    header('location:../ajouterNote.php');
}

function edit_note(){
    $note = $_POST['new_note'];
    $idEleve = $_POST['eleve'];
    $idMatiere = $_POST['matiere'];
    $date = date('Y-m-d', strtotime($_POST['date']));
    require("connectDB.php");
    $request ="UPDATE notes SET note = $note WHERE (idEleve = $idEleve  AND idMatiere = $idMatiere AND noteDate = '$date')";
    $resultat =mysqli_query($connexion,$request); //Executer la requete
    header('location:../modifierNote.php');
}

function delete_note(){
    $idEleve = $_POST['eleve'];
    $idMatiere = $_POST['matiere'];
    $date = date('Y-m-d', strtotime($_POST['date']));
    require("connectDB.php");
    $request ="DELETE FROM notes WHERE (idEleve = $idEleve AND idMatiere = $idMatiere AND noteDate = '$date')";
    $resultat =mysqli_query($connexion,$request); //Executer la requete
    if(!$resultat){
        setcookie('error',"4", time() + (24 * 3600),"/");
        header('location:../modifierNote.php');
    }
    header('location:../modifierNote.php');
}

if($_SERVER["REQUEST_METHOD"] == 'POST') { 
    if(isset($_POST['note'])){
        addNote();
    }
    if(isset($_POST['new_note'])){
        if($_POST['new_note'] < 0) {
            delete_note();
         }
         else{
            edit_note();
         }
    }
    if(isset($_POST['duree'])){
        if(date('Y-m-d', strtotime($_POST['date'])) != '1970-01-01') addAbsence();
        else header('location:../ajouterAbsence.php');
    }
}
?>