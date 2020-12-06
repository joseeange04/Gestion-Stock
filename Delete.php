<?php
    $bdd= new PDO("mysql:host=localhost; dbname=gestionstock", 'root', '');

    if(isset($_REQUEST['delid'])) {
        $delete= $bdd->prepare("DELETE nom, Quantite, Fabriquant FROM produit WHERE id LIKE ? ");
        $delete->execute(array('$_REQUEST["delid"]'));
        header('location: action.php?');
    }
?>