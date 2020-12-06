
<!DOCTYPE html>
 <html>
 <head>
 <meta charset=  "utf-8" />
 <title> Gestion de stock </title>
 <link rel="stylesheet" href="style.css" />
 <link rel="stylesheet" href="bootstrap.min.css" />
 </head>

 <?php
    $bdd= new PDO("mysql:host=localhost; dbname=gestionstock", 'root', '');
    if(isset($_POST['nom']) AND isset($_POST['quantite']) AND isset($_POST['fabriquant']))
    {
        $nom= htmlspecialchars($_POST['nom']);
        $quantite= htmlspecialchars($_POST['quantite']);
        $fabriquant= htmlspecialchars($_POST['fabriquant']);

        if(!empty($nom) AND !empty($quantite) AND !empty($fabriquant))
        {
            $reqproduct=$bdd->prepare("SELECT * FROM produit WHERE nom=? AND Quantite=? AND Fabriquant=?");
            $reqproduct->execute(array($nom, $quantite, $fabriquant));
            $productexist= $reqproduct->rowCount();
            if($productexist==0)
            {
                $data	=	array(
                    'nom'=>$nom,
                    'Quantite'=>$quantite,
                    'Fabriquant'=>$fabriquant,
                );
                $insert= $bdd->prepare("INSERT  INTO  produit(nom, Quantite, Fabriquant) Values (?, ?, ?)");
                $insert->execute(array($nom, $quantite, $fabriquant));

                if($insert)
                {
                    header("Location:action.php");
                }
                else
                {
                    $erreur="Une erreur s'est produite lors de l'enregistrement";
                }
            }
            else
            {
                $erreur="Ce produit existe déjà dans la base";
            }
        }
        else
        {
            $erreur="Remplissez toutes les cases";
        }
    }
 ?>
 
 <body>
     <div class="card" align="center">
         <div class="card-header"><h2>Add product</h2></div>
         <form method="POST" action="">
     
             <table>
                 <tr>
                 <td align= "left">
                 <label for="nom"> Nom: </label>
                 </td>
                 <td align= "right">
                 <input type="text" name="nom" id="name"/>
                 </td>
                 </tr>
          
                 </br> </br>
                 <tr>
                 <td align= "left">
                 <label for="quantite"> Quantités: </label>
                 </td>
                 <td align= "right">
                 <input type="number" name="quantite" id="quantite"/>
                 </td>
                 </tr>

                 <tr>
                 <td align= "left">
                 <label for="fabriquant"> Fabriquant: </label>
                 </td>
                 <td align= "right">
                 <input type="text" name="fabriquant" id="fabriquant"/>
                 </td>
                 </tr>
         
                 </br> </br>
                 <tr>
                 <td></td>
                 <td align="center" >
                 <input type="submit" value="Ajouter" name="ajouter" id="ajouter" width="40px"/>
                 </td>
                 </tr>
             </table>
         </form>
        <?php
            if(isset($erreur))
            {
                echo"<font color=red>" .$erreur. "</font>";
            }
        ?>
     </div>
 </body>
 </html>