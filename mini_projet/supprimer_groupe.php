<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SCO-ENICAR Etudiants Par CLasse</title>
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
              <h1 class="display-4">Suppression d'un groupe</h1>
              <p>Cliquer sur la liste afin de choisir une classe!</p>
            </div>
          </div>
          <div class="container">
<div class="row">
<div class="table-responsive"> 
  
<div class="table table-striped table-hover ">
<p id="demo">  </p>
  </div>
  </div>
  </div>
  </div> 

<div class="container">
<form id ="myForm"  method="POST">
<div class="form-group">
<label for="classe" >Choisir une classe:</label><br>
<!--
<input list="classe">
<datalist id="classe" name="classe">
    <option value="1-INFOA">1-INFOA</option>
    <option value="1-INFOB">1-INFOB</option>
    <option value="1-INFOC">1-INFOC</option>
    <option value="1-INFOD">1-INFOD</option>
    <option value="1-INFOE">1-INFOE</option>
</datalist>
-->
<select id="classe"  name="classe"  class="custom-select custom-select-sm custom-select-lg">
    <option value="INFO1-A">INFO1-A</option>
    <option value="INFO1-B">INFO1-B</option>
    <option value="INFO1-C">INFO1-C</option>
    <option value="INFO1-D">INFO1-D</option>
    <option value="INFO1-E">INFO1-E</option>
</select>
</div>
<button type="button"style="background-color: rgb(251, 104, 104);font-family:Georgia, 'Times New Roman', Times, serif;" onclick="supprimer_grp()" class="btn btn-primary btn-block active" >supprimer</button>
</form>
</div>  
</main>

<div id="demo"></div>


<script>

    function supprimer_grp()
    {
        var xmlhttp = new XMLHttpRequest();
        var url="http://localhost/mini_projet/supprimergrp.php";
        //Envoie Req
        xmlhttp.open("POST",url,true);

        form=document.getElementById("myForm");
        formdata=new FormData(form);

        xmlhttp.send(formdata);

        //Traiter Res

        xmlhttp.onreadystatechange=function()
            {    //  alert(this.readyState);

                if(this.readyState==4 && this.status==200){
               // alert(this.responseText);
                    if(this.responseText=="OK")
                    {
                        document.getElementById("demo").innerHTML="La suppression du groupe a été bien effectué";
                        document.getElementById("demo").style.backgroundColor="green";
                        alert("kkkk");

                    }
                    else
                    {
                        //alert("hhkkkk");
                    }
                }
            }
        
        
    }













    function rechercher()
    {
        var xmlhttp = new XMLHttpRequest();
        var url="http://localhost/mini_projet/afficher_parCL.php";
        
        //Envoie Req
        xmlhttp.open("POST",url,true);
        form=document.getElementById("myForm");
        formdata=new FormData(form);
        xmlhttp.send(formdata);


     //Traiter la reponse
     xmlhttp.onreadystatechange=function()
            {  // alert(this.readyState+" "+this.status);
                if(this.readyState==4 && this.status==200){
                
                    myFunction(this.responseText);
                    alert(this.responseText);
                    console.log(this.responseText);
                    //console.log(this.responseText);
                }
            }


    //Parse la reponse JSON
	function myFunction(response){
		var obj=JSON.parse(response);
        //alert(obj.success);

        if (obj.success==1 && obj.etudiants!=[])
        {
		var arr=obj.etudiants;
		var i;
		var out="<table  bordre=1 class='table table-striped table-hover'  ><tr><th> CIN</th><th> Nom </th> <th> Prénom </th><th>adresse</th><th> Email</th><th>Classe </th></tr>"


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
    document.getElementById("demo").style.backgroundColor="#98fb98";
   
       }
       else{
        document.getElementById("demo").innerHTML="dans ce classe n'existe aucun etudiant! ";
       document.getElementById("demo").style.backgroundColor="red";
       }

    }
}
</script>

<footer class="container">
    <p>&copy; ENICAR 2021-2022</p>
  </footer>
</body>
</html>