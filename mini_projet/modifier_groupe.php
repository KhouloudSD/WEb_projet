
<?php
   session_start();
   if($_SESSION["autoriser"]!="oui"){
      header("location:login.php");
      exit();
   }

 $id=$_SESSION["id"];

    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SCO-ENICAR Afficher Etudiants</title>
    <!-- Bootstrap core CSS -->
<link href="./assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap core JS-JQUERY -->
<script src="./assets/dist/js/jquery.min.js"></script>
<script src="./assets/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom styles for this template -->
    <link href="./assets/jumbotron.css" rel="stylesheet">

</head>
<body onload="refresh()">
<?php  include_once("navbar.php") ;?>






<main role="main">
                <div class="jumbotron">
                    <div class="container">
                      <h1 class="display-4">Modifier Groupe</h1>
                      <p>Remplir le formulaire ci-dessous afin de modifier le groupe!</p>
                    </div>
                  </div> 
                  <div class="container">
                      
                    <form id="myForm" method="POST" >
                         
                        <?php  echo $id; ?>

                        <div class="form-group">
                        <label for="classe">Classe:</label><br>
                        <input type="text" id="classe" name="classe"  class="form-control" />
                       </div>
                       
                        <div class="form-group">
                        <label for="matiere">Matiére:</label><br>
                        <input type="text" id="matiere" name="matiere"  class="form-control" required >
                       </div>
                       <div class="form-group">
                        <label for="matiere">New Matiére:</label><br>
                        <input type="text" id="nmatiere" name="nmatiere" class="form-control" >
                       </div>
                       <button type="button" style="background-color: rgb(251, 104, 104); font-family:Georgia, 'Times New Roman', Times, serif" class="btn btn-primary btn-block" onclick="modifier()">Enregistrer</button>
                    </form> 
                    <div id="demo"></div>
                   </div> 
</main>

                   
           
     <script>
      function modifier() 
        {
         alert('azaza');
        var xmlhttp = new XMLHttpRequest();
        var url="http://localhost/mini_projet/groupemodif2.php";
        //Envoie Req
        xmlhttp.open("POST",url,true);

        form=document.getElementById("myForm");
        formdata=new FormData(form);

        xmlhttp.send(formdata);        
    }
    </script>


    <footer class="container">
      <p>&copy; ENICAR 2021-2022</p>
    </footer>
 

    </body>
    </html>