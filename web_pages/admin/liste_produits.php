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
<div id="titre_btn" class="row">
    <p>  
        <h3 class="col-sm-6" style="margin: 3px 50px 3px">Liste des produits</h3>
    </p>
</div>
<?php
    $sql = "SELECT id,titre,plateforme,editeur,date_de_sortie,prix FROM jeu order by plateforme";
    $sth = $dbh->query($sql);

    if ($sth === FALSE) {
        echo("Erreur : la requete SQL est incorrecte. <br/>");
    } else {
        $prods = $sth->fetchAll(PDO::FETCH_ASSOC);?>
    <table class="table table-hover" style="margin: 3px 50px 3px;border-radius: 12px;width:900px"> 
          
        <thead>
                <tr>
                    <th>Id</th>
                    <th>Titre</th>
                    <th>Plateforme</th>
                    <th>Editeur</th>
                    <th>Date de sortie</th>
                    <th>Prix</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($prods as $prod){
                        echo("<tr>".
                                "<td>".$prod['id']."</td><td>".$prod['titre']."</td>".
                                "<td>".$prod['plateforme']."</td><td>".$prod['editeur']."</td>".
                                "<td>".$prod['date_de_sortie']."</td><td>".$prod['prix']." €</td>");
                ?>
            <td><a href="<?php echo("index.php?choix=mod_prod_formu&id=".$prod["id"]."");?>" class="btn fas fa-pencil-alt" style="color:orange;font-size: 15px"></a>
                <a href="<?php echo("index.php?choix=sup_prod&id=".$prod["id"]."");?>" class="btn fa fa-remove" style="color: red;font-size: 15px"></a></td></tr><?php
                }
                ?>
            </tbody>
        </table>
        <div class="row"style="margin: 3px 50px 3px">
            <a class="btn btn-info col-md-3" href="index.php?choix=ajout_prod_formu">
                <span class="fas fa-plus"></span> Ajout nouveau produit
            </a>
        </div>
    <?php }
    }