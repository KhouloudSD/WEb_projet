<?php
 session_start();
 if($_SESSION["autoriser"]!="oui"){
	header("location:login.php");
	exit();
 }
 else {
     include ("connexion.php");
    @$cin=$_REQUEST['cin'];
    $nom=$_REQUEST['nom'];
    $prenom=$_REQUEST['prenom'];
    $pwd=$_REQUEST['pwd'];
    $adresse=$_REQUEST['adresse'];

    if (isset($_POST['modifier']))  {

    $req1="UPDATE etudiant SET nom='$nom' WHERE cin = '$cin'";
    $reponse = $pdo->query($req1);
    $req2="UPDATE etudiant SET prenom='$prenom' WHERE cin = '$cin'";
    $reponse = $pdo->query($req2);
    $req3="UPDATE etudiant SET  password='$pwd' WHERE cin = '$cin'";
    $reponse = $pdo->query($req3);
    $req5="UPDATE etudiant SET  cpassword='$pwd' WHERE cin = '$cin'";
    $reponse = $pdo->query($req5);
    $req4="UPDATE etudiant SET adresse='$adresse' WHERE cin = '$cin'";
    $reponse = $pdo->query($req4);
    $msg= "La modification a été effectuée!";
    echo $msg;
    }
    else{ echo 'Erreur';
    }
    header('location:modifierEtudiant.php');
    }
 ?>