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
              <h1 class="display-4">supprimer un étudiant</h1>
              <p>Remplir le formulaire ci-dessous afin de supprimer un étudiant!</p>
            </div>
          </div>
          <div class="container">

 <form id="myForm" method="POST"  >
 <div class="form-group">
     <label for="cin">CIN:</label><br>
     <input type="text" id="cin" name="cin"  class="form-control" required pattern="[0-9]{8}" title="8 chiffres"/>
 </div>
    <button  type="button"style="background-color: rgb(251, 104, 104);font-family:Georgia, 'Times New Roman', Times, serif;" onclick="supprimer()" class="btn btn-primary btn-block">supprimer</button>
  </form> 

</div>  

</main>
<div id="demo"></div>
<script>
    function supprimer()
    {
        var xmlhttp = new XMLHttpRequest();
        var url="http://localhost/mini_projet/supprimer.php";
        
        //Envoie Req
        xmlhttp.open("POST",url,true);

        form=document.getElementById("myForm");
        formdata=new FormData(form);

        xmlhttp.send(formdata);

        //Traiter Res

        xmlhttp.onreadystatechange=function()
            {   
                if(this.readyState==4 && this.status==200){
                // alert(this.responseText);
                    if(this.responseText=="OK")
                    {
                        document.getElementById("demo").innerHTML="La suppression de l'étudiant a été bien effectué";
                        document.getElementById("demo").style.backgroundColor="green";
                    }
                    else
                    {
                        document.getElementById("demo").innerHTML="L'étudiant n'existe pas, merci de vérifier le CIN";
                        document.getElementById("demo").style.backgroundColor="#fba";
                    }
                }
            }
        
        
    }
    </script>

<footer class="container">
    <p>&copy; ENICAR 2021-2022</p>
  </footer>


</body>
</html>




