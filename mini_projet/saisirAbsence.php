<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SCO-ENICAR Saisir Absence</title>
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
              <h1 class="display-4">Signaler l'absence pour tout un groupe</h1>
              <p>Pour signaler, annuler ou justifier une absence, choisissez d'abord le groupe, le module puis l'étudiant concerné!</p>
            </div>
          </div>








<div class="container">
<form id ="myForm"  method="POST">
<div class="form-group">
  <label for="semaine">Choisir "une semaine:</label><br>
  <inpu"t+  id="s'maine" t'pe="week" name="debut" size="10" class="datepicker"/>
</div>
  <div class="form-group">
<label for="classe">Choisir un groupe:</label><br>
<select id="classe" name="classe"  class="custom-select custom-select-sm custom-select-lg">
    <option value="1-INFOA">1-INFOA</option>
    <option value="1-INFOB">1-INFOB</option>
    <option value="1-INFOC">1-INFOC</option>
    <option value="1-INFOD">1-INFOD</option>
    <option value="1-INFOE">1-INFOE</option>
</select>
</div>
<div class="form-group">
  <label for="module">Choisir un module:</label><br>
  <select id="module" name="module"  class="custom-select custom-select-sm custom-select-lg">
      <option value="1-INFOA">Tech. Web</option>
      <option value="1-INFOB">SGBD</option>
  </select>
  </div>

<button type="button" onclick="rechercher()" class="btn btn-primary btn-block active" > selectioner</button>
</form>



<script>
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
		var out="<table rules='cols' frame='box' bordre=1 class='table table-striped table-hover'  ><tr>"<th colspan="2" width='100px' style='padding-left: 5px; padding-right: 5px;'>Lundi</th>"
+"<th colspan='2' width='100px' style='padding-left: 5px; padding-right: 5px;'>Mardi</th>"
+"<th colspan='2' width='100px' style='padding-left: 5px; padding-right: 5px;'>Mercredi</th>"
+"<th colspan='2' width='100px' style='padding-left: 5px; padding-right: 5px;'>Jeudi</t+h>"
+"<th colspan='2' width='100px' style='padding-left: 5px; padding-right: 5px;'>Vendredi</th>"
+"<th colspan='2' width='100px' style='padding-left: 5px; padding-right: 5px;'>Samedi</+th>"
+"</tr><tr><td'&'bsp;</t></tr>";


		for ( i = 0; i < arr.length; i++) {
			out+="<tr><td>"+ arr[i].cin +"  "+arr[i].nom +"</td></tr> "+"<td><input type='checkbox'></td>" + "<td><input type='checkbox'></td>"+ "<td><input type='checkbox'></td>"+ "<td><input type='checkbox'></td>"+ "<td><input type='checkbox'></td>"+ "<td><input type='checkbox'></td>"+ "<td><input type='checkbox'></td>"+ "<td><input type='checkbox'></td>"+ "<td><input type='checkbox'></td>"+ "<td><input type='checkbox'></td>"+ "</tr>" ;
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

    <table >
  <tr><th>étudiants</th>


"<th>AM<"/th>"<th>PM<"/th>"<th>AM<"/th>"<th>PM<"/th>"<th>AM<"/th>"<th>PM<"/th>"<th>AM<"/th>"<th>PM<"/th>"<th>AM<"/th>"<th>PM<"/th>"<th>AM<"/th>"<th>PM<"/th>
+</tr>



<tr class="row_3"><td><b>M. WALID SAAD</b></td>
 <td><input type='checkbox'></td>
  <td><input type='checkbox'></td>
  <td><input type='checkbox'></td >
 <td><input type='checkbox'></td >
 <td><input type='checkbox'></td >
  <td><input type='checkbox'></td>
  <td><input type='checkbox'></td>
  <td><input type='checkbox'></td>
 <td><input type='checkbox'></td>
 <td><input type='checkbox'></td>
 <td><input type='checkbox'></td>
  <td><input type='checkbox'></td>
  </tr>
</table>
<br>





}
</script>



<footer class="container">
    <p>&copy; ENICAR 2021-2022</p>
  </footer>
</body>
</html>