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
        var_dump($_POST);
        $titre = addslashes($_POST['titre']);
        $plate= addslashes($_POST['sel1']);
        $edit= addslashes($_POST['edi']);
        $dateS= addslashes($_POST['dateS']);
        $prix= addslashes($_POST['prix']);
        $syno=addslashes($_POST['syno']); 
        $sql="insert into jeu(titre,plateforme,editeur,date_de_sortie,prix,synopsis)".
            "values('$titre',upper('$plate'),upper('$edit'),'$dateS','$prix','$syno')";
        var_dump($sql);
        $dbh->exec($sql);
    }
?>