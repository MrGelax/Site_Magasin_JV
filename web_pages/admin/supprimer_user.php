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
?>
<h3>DELETE en DB du spectacle n°<?php echo($_GET['id']); ?></h3>

<?php
    var_dump($_GET['id']);
    $sql = "DELETE FROM membre where id=:id";
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':id', $_GET['id'], PDO::PARAM_INT);   
    $stmt->execute();
    //header('Location:index.php?choix=accueil&msg=sup');
    }
    ?>
