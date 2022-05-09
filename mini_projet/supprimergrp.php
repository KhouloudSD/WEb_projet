

<?php
 session_start();
 if($_SESSION["autoriser"]!="oui"){
	header("location:login.php");
	exit();
 }
else {
$classe=$_REQUEST['classe'];

$id=$_SESSION["id"];


include("connexion.php");
         $sel=$pdo->prepare("select classe from enseignant_groupe where id_prof = ? limit 1 ");
         $sel->execute(array($id));
         $tab=$sel->fetchAll();
         if(count($tab)==0)
            $erreur="NOT OK";// Groupe n'existe pas 
         else{
            $req="DELETE FROM enseignant_groupe WHERE (classe =$classe and id_prof =$id )";
            $reponse = $pdo->exec($req) or die("error");
            $erreur ="OK";
         }  
         echo $erreur;
}
?>