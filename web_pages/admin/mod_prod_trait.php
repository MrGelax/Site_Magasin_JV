<?php
    if((!isset($_SESSION['login'])||
            ((isset($_SESSION['login'])&&isset($_SESSION['admin']))&&
            $_SESSION['admin']===1))){
        ?>
        <script>
            alert("Vous n'avez pas les droit");
            document.location.href="http://localhost/DaSilva_Projet/index.php"
        </script>
        <?php
    }else{
        $req=$dbh->prepare("UPDATE jeu set titre=?,plateforme=?,editeur=?,date_de_sortie=?,prix=?,synopsis=? where id=?");
        $req->execute([$_POST['titre'],$_POST['sel1'],$_POST['edi'],$_POST['dateS'],$_POST['prix'],$_POST['syno'],$_GET['id']]);
    }
?>