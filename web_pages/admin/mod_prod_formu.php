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
        $sql="SELECT * FROM jeu where id=".$_GET['id'];
        //var_dump($sql);
        $sth=$dbh->query($sql);
        $prod=$sth->fetch(PDO::FETCH_ASSOC);
?>
<h3 style="margin: 3px 50px 3px" class="row"><u>Formulaire de modification du produit id :<?php echo($_GET["id"]);?></u></h3><br>
<form style="margin: 3px 50px 3px" <?php echo("action='index.php?choix=mod_prod_trait&id=".$_GET['id']."'");?>method="post">
    <div class="row">
        <div class='form-group col-sm-4'>
            <label for="titre">Titre : </label> 
            <input id="titre" name="titre" type="text" class="form-control" value="<?php echo($prod['titre']);?>">
        </div>
        <div class="form-group col-sm-4">
            <label for="sel1">Plateforme : </label>
            <select id="sel1" name="sel1" class="form-control" value="<?php echo($prod['plateforme']);?>">
                <option <?php if($prod['plateforme']=='PS4'){echo(" selected ");}?> value="PS4">PS4</option>
                <option <?php if($prod['plateforme']=='XBOX'){echo(" selected ");}?> value="XBOX">XBOX</option>
                <option <?php if($prod['plateforme']=='WII'){echo(" selected ");}?> value="WII">WII</option>
                <option <?php if($prod['plateforme']=='PC'){echo(" selected ");}?> value="PC">PC</option>
            </select>
        </div>
        <div class='form-group col-sm-4'>
            <label for="edi">Editeur : </label> 
            <input id="edi" name="edi" type="text" class="form-control" value="<?php echo($prod['editeur']);?>">
        </div>
    </div>
    <div class="row">
        <div class='form-group col-sm-4'>
            <label for="dateS">Date de Sortie : </label> 
            <input id="dateS" name="dateS" type="date" class="form-control"value="<?php echo($prod['date_de_sortie']);?>">
        </div>
        <div class='form-group col-sm-4'>
            <label for="prix">Prix : </label> 
            <input id="prix" name="prix" type="number" class="form-control" value="<?php echo($prod['prix']);?>">
        </div>
    </div>
    <div class="row">
        <div class="form-group col-sm-6">
            <label for="syno">Synopsis : </label> 
            <input id="syno" name="syno" type="text" class="form-control" value="<?php echo($prod['synopsis']);?>">
        </div>
        <div class='form-group col-sm-2 text-right'>
            <br/><input type="submit" class="btn btn-info" value="Modifier le produit">
        </div>
    </div>
</form>
<?php }?>