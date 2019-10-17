<?php
    if(isset($_GET['prod'])){
        $prod=$DB->query("Select id from jeu where id=:id",array('id'=>$_GET['prod']));
        if(empty($prod)){
            die("Nous ne vendons pas/plus le produit");
        }else{
            var_dump($prod[0]);
            var_dump($_SESSION);
            var_dump($_SESSION['panier']);
            $panier->add($prod[0]->id);
            die('Le produit à bien été ajouter au panier <a href="javascript:history.back()">retourner sur le catalogue</a>');
        }
    }else{
        die("Vous n'avez pas selectionner de produit");
    }
