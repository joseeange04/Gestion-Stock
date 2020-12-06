<!DOCTYPE html>
<html>
<head>
    <title>Produit</title>
    <meta charset='utf-8' />
    <link rel="stylesheet" href="bootstrap.min.css" />
    <link rel="stylesheet" href="bingo.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" crossorigin="anonymous"/>
</head>

<body>
<div align="center">
<?php 
    try{
        $bdd= new PDO("mysql:host=localhost; dbname=gestionstock", 'root', '');
    }
    catch(Exception $e)
    {
        die('Erreur'.$e->getMessage());
    }

?>
     <h1 align="center"> PHP_CRUD Gestion de stock </h1>
    <div class="card" width="40%">
        <div class="card-header">
        <h5>Ajouter de nouveaux produits:</h5></br>
    

        <a href="Add.php" id="add" class="btn btn-dark"><i class="fa fa-plus-circle"></i>Ajouter </i></a>
        </div>
        <div class="card-body">
                    <h5>Rechercher un produit:</h5>
                    <form method="GET" action="verification.php">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
                            <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
                            </svg>
                            <input type= "search" name="terme" id="terme" width="80%" />
                            <input type="submit"  value="Rechercher" name="envoi" id="name" class="btn btn-primary"/>           
                    </form> 
    
        </div>
    </div>

                  
</br></br>
<?php

    //on récupère les données dans produits
     $reponse=$bdd->query("SELECT * FROM produit");

    //récupération
    $donnee= $reponse->fetch();
    
 ?>
   
<div align="center" >
     <table class="table table-striped">
            <thead>
                 <tr>
                    <th scope="col">Identifiant</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Quantités</th>
                    <th scope="col">Fabriquant</th>
                    <th colspan="2" scope="col">Actions</th>
                </tr>
            </thead>

        
        
            
            <tbody>
                <?php
                while ($donnee=$reponse-> fetch())
                {
                   
                ?>             
                
                <tr>
                <td><?php echo $donnee['id'] ?></td>
                <td><?php echo $donnee['nom'] ?></td>
                <td><?php echo $donnee['Quantite'] ?></td>
                <td><?php echo $donnee['Fabriquant'] ?></td>
                <td>
                <a href="Update.php?updateid=<?php echo $donnee['id'] ?>" class="btn btn-primary stretched link"> Modifier </a>
                <a href="Delete.php?delid=<?php echo $donnee['id'] ?>" class="btn btn-danger stretched link"> Supprimer </a>
                </td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
            
</body>
</html>
