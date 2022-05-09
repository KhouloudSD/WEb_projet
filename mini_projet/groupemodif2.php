<?php
 session_start();
 if($_SESSION["autoriser"]!="oui"){
	header("location:login.php");
	exit();
 }
 $id=$_SESSION["id"];

 else {


     include ("connexion.php");


    $classe = $_POST['classe'];
    $matiere = $_POST['matiere'];
    $nmatiere = $_POST['nmatiere'];
    echo $classe;
    alert($classe);

    if (isset($_POST['modifier']))  {
    
    $req ="UPDATE enseignant_groupe SET matiere='$nmatiere' WHERE id_prof = '$id' AND classe='$classe'";
    $reponse = $pdo->query($req);
    $msg= "La modification a été effectuée!";
    echo $msg;
    }
    else{ echo 'Erreur';
    }
    header('location:modifier_groupe.php');
    }
 ?>

