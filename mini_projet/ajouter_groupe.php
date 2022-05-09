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
              <h1 class="display-4">Ajouter un GROUPE</h1>
              <p>Remplir le formulaire ci-dessous afin d'ajouter un groupe!</p>
            </div>
          </div>
          
<div class="container">
 <form id="myForm" method="POST"  >
  
     <?php
     echo $id;
   ?>
     
     <!--<input type="text" id="classe" name="classe" class="form-control" required pattern="INFO[1-3]{1}-[A-E]{1}"
     title="Pattern INFOX-X. Par Exemple: INFO1-A, INFO2-E, INFO3-C"> 
    
    <label for="matiere">matiere:</label><br>
     <input type="text" id="matiere" name="matiere" class="form-control" required >
    --> 
    

    <div class="form-group">

      <label for="classe">Classe:</label><br>
      <select id="classe" name="classe"  class="custom-select custom-select-sm custom-select-lg">
      <option value="1-INFOA">1-INFOA</option>
      <option value="1-INFOB">1-INFOB</option>
      <option value="1-INFOC">1-INFOC</option>
      <option value="1-INFOD">1-INFOD</option>
      <option value="1-INFOE">1-INFOE</option>
      </select>
    </div>

    
    
    <div class="form-group">
    <label for="matiere">matiere:</label><br>
      <select id="matiere" name="matiere"  class="custom-select custom-select-sm custom-select-lg">
      <option value="POO">POO</option>
      <option value="RESEAU">RESEAU</option>
      <option value="TECH WEB">TECH WEB</option>
      <option value="BASE DE DONNEE">BASE DE DONNEE</option>
      <option value="STRUCTURE DE DONNEE">STRUCTURE DE DONNEE</option>
      <option value="ARCHI SYST MICROPROCESSEUR">ARCHI SYST MICROPROCESSEUR</option>

      </select>
    </div>



     <button  type="button"  style="background-color: rgb(251, 104, 104); font-family:Georgia, 'Times New Roman', Times, serif" onclick="ajouter()" class="btn btn-primary btn-block">Ajouter</button>


 </form> 
</div> 
<div id="demo"></div>
</main>
<div id="demo"></div>
<script>
    function ajouter()
    {
        var xmlhttp = new XMLHttpRequest();
        var url="http://localhost/mini_projet/ajouterG.php";
        
        //Envoie Req
        xmlhttp.open("POST",url,true);

        form=document.getElementById("myForm");
        formdata=new FormData(form);

        xmlhttp.send(formdata);

        //Traiter Res

        xmlhttp.onreadystatechange=function()
            {   
                if(this.readyState==4 && this.status==200){
                 //alert(this.responseText);
                    if(this.responseText=="OK")
                    {
                        document.getElementById("demo").innerHTML="L'ajout du groupe a été bien effectué";
                        document.getElementById("demo").style.backgroundColor="green";
                    }
                    else
                    {
                        document.getElementById("demo").innerHTML="ce groupe deja existe dans sa liste des groupes";
                        document.getElementById("demo").style.backgroundColor="red";
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