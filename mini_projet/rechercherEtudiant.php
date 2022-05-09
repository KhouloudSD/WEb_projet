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
              <h1 class="display-4">rechercher un étudiant</h1>
              <p>Remplir le formulaire ci-dessous afin de rechercher un étudiant!</p>
            </div>
          </div>
          <div class="container">
<div class="row">
<div class="table-responsive"> 
  
<div class="table table-striped table-hover ">
<p id="demo" ></p>
  </div>
  </div>
  </div>
  </div> 
          <div class="container">
 <form id="myForm" method="POST"  >
 <div class="form-group" >
     <label for="cin">CIN:</label><br>
     <input type="text" id="cin" name="cin"  class="form-control" required pattern="[0-9]{8}" title="8 chiffres"/>
    </div>
    <button  type="button" style="background-color: rgb(251, 104, 104); font-family:Georgia, 'Times New Roman', Times, serif" onclick="rechercher()" class="btn btn-primary btn-block active">rechercher</button>
    </form> 
</div> 


</main>



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
</script>

<footer class="container">
    <p>&copy; ENICAR 2021-2022</p>
  </footer>


</body>
</html>