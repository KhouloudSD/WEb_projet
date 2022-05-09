<?php
 session_start();
 if($_SESSION["autoriser"]!="oui"){
	header("location:login.php");
	exit();
 }
else {
$classe=$_REQUEST['classe'];
$matiere=$_REQUEST['matiere'];
$id_prof=$_SESSION["id"];



include("connexion.php");
         
            
            $req="insert into enseignant_groupe values ($id_prof,'$classe','$matiere')";
            $reponse = $pdo->exec($req) or die("error");
            $erreur ="OK";
         
         echo $erreur;
}
?>