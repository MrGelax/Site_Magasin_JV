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
<h1 style="margin: 3px 50px 3px" class="row"><u>Formulaire d'ajout d'un produit</u></h1><br>
<form action="index.php?choix=ajout_prod_trait"method="POST"style="margin: 3px 50px 3px">
    <div class="row">
        <div class='form-group col-sm-4'>
            <label for="titre" class="control-label">Titre : </label> 
            <input id="titre" name="titre" type="text" class="form-control" value="" placeholder="Infamous" required>
        </div>
        <div class="form-group col-sm-4">
            <label for="sel1" class="control-label">Plateforme : </label>
            <select id="sel1" name="sel1" class="form-control"required>
                <option value="PS4">PS4</option>
                <option value="XBOX">XBOX</option>
                <option value="WII">WII</option>
                <option value="PC">PC</option>
            </select>
        </div>
        <div class="form-group col-sm-4">
            <label for="edi" class="control-label">Editeur : </label> 
            <input id="edi" name="edi" type="text" class="form-control" value=""placeholder="SONY"required>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-sm-4">
            <label for="dateS" class="control-label">Date de Sortie : </label> 
            <input id="dateS" name="dateS" type="date" class="form-control"required>
        </div>
        <div class="form-group col-sm-4">
            <label for="prix" class="control-label">Prix : </label> 
            <input id="prix"style="" name="prix" type="text" class="form-control" placeholder="125.05,025.05"required>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-sm-6">
            <label for="syno" class="control-label">Synopsis : </label> 
            <input id="syno" name="syno" type="text" class="form-control" value=""placeholder="Un jeune héro...">
        </div>
        <div class="form-group col-sm-2 text-right" style="margin-top: 8px">
            <br><button id="button_submit" type="SUBMIT" class="btn btn-info">Ajouter un produit</button>
        </div>
    </div>
    
</form>
<br/>
    <?php }?>
<script>
    $(document).ready(function(){
        var form_completement_valide;
        $('#button_submit').click(function(evenement){
            form_completement_valide=true;
            var reg1=/^\d+(.\d{1,2})?$/;
            var result=reg1.test($("#prix").val());
            if(result===false){
                form_completement_valide = false;
                $('#prix').attr('placeholder','Prix invalide');
                $('#prix').attr('class', 'form-control is-invalid');
            }else{
                $('#prix').attr('class', 'form-control is-valid');
            }
            if (form_completement_valide === false) {
                evenement.preventDefault();
            }
        }); 
    });
</script>