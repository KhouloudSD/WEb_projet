<?php
   session_start();
   if($_SESSION["autoriser"]!="oui"){
      header("location:login.php");
      exit();
   }
   
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SCO-ENICAR Ajouter Etudiant</title>
    <!-- Bootstrap core CSS -->
<link href="./assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap core JS-JQUERY -->
<script src="./assets/dist/js/jquery.min.js"></script>
<script src="./assets/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom styles for this template -->
    <link href="./assets/jumbotron.css" rel="stylesheet">

</head>
<body>
<?php  include_once("navbar.php") ;?>

   
      
      <main role="main">
        <div class="jumbotron">
            <div class="container">
              <h1 class="display-4">Modifier Etudiant</h1>
              <p>Remplir le formulaire ci-dessous afin de modifier un étudiant!</p>
            </div>
          </div>
          



<div class="container">
 <form id="myForm" method="POST"  >
     <!--
                        TODO: Add form inputs
                        Prenom - required string with autofocus
                        Nom - required string
                        Email - required email address
                        CIN - 8 chiffres
                        Password - required password string, au moins 8 letters et chiffres
                        ConfirmPassword
                        Classe - Commence par la chaine INFO, un chiffre de 1 a 3, un - et une lettre MAJ de A à E
                        Adresse - required string
                    -->


                    <div class="container">
                    <div class="row">
                    <div class="table-responsive"> 
                    
                    <div class="table table-striped table-hover ">
                    <p id="demo"></p>
                    </div>
                    </div>
                    </div>
                    </div> 
                    
            <!--CIN etudiant a modifier-->
            <div class="container">
        <form id="myForm1" method="POST"  >
        <div class="form-group" id="rech">
            <label for="cin">CIN:</label><br>
            <input type="text" id="cin" name="cin"  class="form-control" required pattern="[0-9]{8}" title="8 chiffres"/>
            </div>
            <button  type="button" style="background-color: rgb(251, 104, 104); font-family:Georgia, 'Times New Roman', Times, serif" onclick="rechercher()" class="btn btn-primary btn-block active">rechercher</button>

            </form> 
            </div> 

    <form id="myForm1" method="POST"  >

     <!--Nom-->

     <div class="form-group">
     <label for="nom">nonveau nom:</label><br>
     <input type="text" id="nom" name="nom" class="form-control" required autofocus>
    </div>
     <!--Prénom-->
     <div class="form-group">
     <label for="prenom">nouveau Prénom:</label><br>
     <input type="text" id="prenom" name="prenom" class="form-control" required>
    </div>
    
     <div class="form-group">
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" class="form-control" required>
       </div>
   
     <!--Password-->
     <div class="form-group">
     <label for="pwd">Mot de passe:</label><br>
     <input type="password" id="pwd" name="pwd" class="form-control"  required pattern="[a-zA-Z0-9]{8,}" title="Au moins 8 lettres et nombres"/>
    </div>
    <!--ConfirmPassword-->
  
    <div class="form-group">
     <label for="pwd">Mot de passe:</label><br>
     <input type="password" id="cpwd" name="cpwd" class="form-control"  required pattern="[a-zA-Z0-9]{8,}" title="Au moins 8 lettres et nombres"/>
    </div>
     <!--Classe-->
     <div class="form-group">
     <label for="classe">Classe:</label><br>
     <input type="text" id="classe" name="classe" class="form-control" required pattern="INFO[1-3]{1}-[A-E]{1}" placeholder="INFO[1-3]{1}-[A-E]{1}"
     title="Pattern INFOX-X. Par Exemple: INFO1-A, INFO2-E, INFO3-C">
    </div>
    
    


     <!--Adresse-->
     <div class="form-group">
     <label for="adresse">Adresse:</label><br>
     <textarea id="adresse" name="adresse" rows="1" cols="30" class="form-control" required>
     </textarea>
    </div>
     <!--Bouton Ajouter-->
     <button  type="button" style="background-color: rgb(251, 104, 104); font-family:Georgia, 'Times New Roman', Times, serif"  onclick="modifier()" class="btn btn-primary btn-block">modifier</button>


 </form> 
</div> 
<div id="demo"></div>
</main>
<div id="demo"></div>
     <script>



function rechercher()
    {

        var xmlhttp = new XMLHttpRequest();
        var url="http://localhost/mini_projet/rechercher.php";
        
        //Envoie Req
        xmlhttp.open("POST",url,true);
        form=document.getElementById("myForm");
        formdata=new FormData(form);
        xmlhttp.send(formdata);
        document.getElementById('rech').style.visilility='hidden';


     //Traiter la reponse
     xmlhttp.onreadystatechange=function()
            {   //alert(this.readyState+" "+this.status);
                if(this.readyState==4 && this.status==200){
                
                    myFunction(this.responseText);
                    //alert(this.responseText);
                    console.log(this.responseText);
                    //console.log(this.responseText);
                }
            }


    //Parse la reponse JSON
	function myFunction(response){
		var obj=JSON.parse(response);
        //alert(obj.success);

        if (obj.success==1)
        {
		var arr=obj.etudiants;
		var i;
		var out="<table  bordre=1><tr><th> CIN</th><th> Nom </th> <th> Prénom </th><th>adresse</th><th> Email</th><th>Classe </th></tr>"


		for ( i = 0; i < arr.length; i++) {
			out+="<tr><td>"+
			arr[i].cin +
			"</td><td>"+
			arr[i].nom+
			"</td><td>"+
			arr[i].prenom+
			"</td><td>"+
			arr[i].adresse+
			"</td><td>"+
			arr[i].email+
      "</td><td>"+
      arr[i].classe+
			"</td></tr> " ;
		}
		out +="</table>";
		document.getElementById("demo").innerHTML=out;
   
       }
       else
           {
        document.getElementById("demo").innerHTML="cin introuvable!";
        document.getElementById("demo").style.backgroundColor="red";
           }

    }
}
















      function modifier()
    {
        //alert ('&&&&&&&&');
        var xmlhttp = new XMLHttpRequest();
        var url="http://localhost/mini_projet/modifier.php";
        
        //Envoie Req
        xmlhttp.open("POST",url,true);

        form=document.getElementById("myForm1");
        formdata=new FormData(form);

        xmlhttp.send(formdata);        

        xmlhttp.onreadystatechange=function()
            {   
                if(this.readyState==4 && this.status==200){
                 //alert(this.responseText);
                 header("location:modifierEtudiant.php");

                    if(this.responseText=="OK")
                    {
                        document.getElementById("demo").innerHTML="L'ajout de l'étudiant a été bien effectué";
                        document.getElementById("demo").style.backgroundColor="green";
                    }
                    else
                    {
                        document.getElementById("demo").innerHTML="L'étudiant est déjà inscrit, merci de vérifier le CIN";
                        document.getElementById("demo").style.backgroundColor="red";
                    }
                }
            }
        



    }
    </script>
    </body>
    </html>




    