<!doctype html>
<html>
<head>
<meta charset="utf-8" />
<title>Gestion stock</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/style.css" />
</head>
<body onload=showDate();>
<script src="jquery-3.5.1.js"></script>
<h1>Gestion Stock</h1>
<div class="row">
<div class="col-md-3">
<img src="admin.jpg" alt="admin" width="30%"/></br></br>
<button class="btn btn-primary" id="administrator">Administrateur</button>

<div align="left">
    <div class="card" id="identify" >
    <div class="card-header">
        <h1>S'identifier </h1>
    </div>
    <div class="card-body">
        <form method="POST" action="">
    <!--login-->
            
                <label for="login"> Login: </label></br>
                <input type="mail" name="login" id="login" placeholder="Votre adresse électronique" width="200px"/>
                
         <!--mot de passe-->
                </br> 
                
                <label for="Password"> Password: </label>
                <input type="password" name="password" id="password" placeholder="mot de passe" width="200px"/>
               
               
                <input type="submit" value="Se connecter" name="connection" id="connection"/>
                </td>
                </tr>
            </table>
        </form>
        </div>
    </div>
</div>
</div>
<div class="col-md-6">
<div class="card">
<div class="card-header"><h2>Objectives</h2></div>
<div class="card-body">
<p>Mis en place de données du magasin tout en sachant les entrants et les sortant.</br>
Gérez les stock de l'entreprise en utlisant les algèbres relationnelle en fonction du besoins
</p>

</div>
</div>
<img src="donnée.png" alt="donnée" width="100%"/>
</div>
<div class="col-md-3">
<script type="text/javascript"> 
         function refresh(){
             var t = 1000; // rafraîchissement en millisecondes
             setTimeout('showDate()',t)
         }
         
         function showDate() {
             var date = new Date()
             var h = date.getHours();
             var m = date.getMinutes();
             var s = date.getSeconds();
             if( h < 10 ){ h = '0' + h; }
             if( m < 10 ){ m = '0' + m; }
             if( s < 10 ){ s = '0' + s; }
             var time = h + ':' + m + ':' + s
             document.getElementById('horloge').innerHTML = time;
             refresh();
          }
      </script>
<h2> Produit exixtants</h2>
<img src="images/téléchargement.jpg" alt="blog" width="60%"/></br></br></br>
<img src="images/website.jpg" alt="web" width="60%"/>
</div>
</div>

</body>
</html>