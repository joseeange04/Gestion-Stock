            <?php
            try{
                $bdd= new PDO("mysql:host=localhost; dbname=gestionstock", 'root', '');
            }
            catch(Exception $e)
            {
                die('Erreur'.$e->getMessage());
            }
                  if(isset($_GET['envoi']) AND $_GET['envoi']=="Rechercher")
                  {
                      
                          $terme=htmlspecialchars($_GET['terme']);
                          $terme= trim($terme); //pour supprimer les espaces de la requette
                          $terme= strip_tags($terme); //pour enlever les balise html           
                          $reqprod= $bdd->prepare("SELECT * FROM produit WHERE nom LIKE? OR Quantite LIKE ? OR Fabriquant LIKE ?");
                          $reqprod->execute(array("%".$terme."%", "%".$terme."%", "%".$terme."%"));
                  }
                  else
                  {
                      $message= "entrez votr requette dans la barre de recherche"; 
                  }
            ?>
            <?php
                while($terme_trouve = $reqprod->fetch())
                {
                echo "<div><h2>".$terme_trouve['nom']."</h2><p> ".$terme_trouve['Quantite']."</p><p> ".$terme_trouve['Fabriquant']."</p>";
                }
                $reqprod->closeCursor();
                header('location: action.php?');
            ?>