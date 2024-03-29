<?php
    //var_dump($DB->query('SELECT * FROM jeu order by plateforme'));
    $prods = $DB->query('SELECT * FROM jeu order by plateforme');
    if(isset($_GET['plat'])){
        $plat=$_GET['plat'];
        echo $plat;
    }else{
        $plat="null";
    }
?>
<div class="clearfix col-auto">
    <aside class="float-left"style="display: inline-block;">
        <h3 style="color:#C4C3C3;"> &nbsp; &nbsp;Filtre</h3>
            <div style="border-radius:12px">
                <br>
                <div style="margin: 3px 20px 3px;">
                    <div id="formplate">
                        <h4>Plateforme</h4>
                        <input type="radio" name="plat" value="PS4"> PS4<br>
                        <input type="radio" name="plat" value="XBOX"> XBOX<br>
                        <input type="radio" name="plat" value="PC"> PC<br>
                        <input type="radio" name="plat" value="WII"> WII<br>
                    </div>
                    <hr>
                    <div id="formedit">
                        <h4>Editeur</h4>
                        <input type="radio"name="edit" value="Sony"> SONY<br>
                        <input type="radio"name="edit" value="UBISOFT"> Ubisoft<br>
                        <input type="radio"name="edit" value="BANDAI"> Bandai<br>
                    </div>
                    <hr>
                    <div class="slidecontainer">
                        <p>Prix: <span id="sliderOutPut"></span></p>
                        <div id="slider" style="color:red"></div>
                    </div>
                </div><br>
               <?php include("./web_pages/searchbar.php");?>
                <br>
            </div>
            <!--<span style="margin: 3px 12px 3px;border-radius: 50px"class="reset btn btn-info center-block">Réinitialiser</span><br>-->
            <a id="boutton" style="margin: 3px 12px 3px;border-radius: 50px"class="btn btn-info center-block" href="./index.php?choix=prod">Réinitialiser</a>
    </aside>
    <section class="col-9"id="produits"style="display: inline-block;border: solid;">
        <?php echo("<br><p class='sous_titre'style='color:#C4C3C3;'>&nbsp &nbsp &nbsp &nbsp<strong>JEUX ".$plat."</strong></p>");?>

            <?php
            $i=1;
            foreach($prods as $prod):?>
            <div class="col col-3 card bg-dark <?=$prod->id." ".$prod->plateforme." ".$prod->editeur?>"
                style="margin: 0px 25px 25px;display: inline-block;" data-price="<?=$prod->prix;?>">
                <div class="card-header"><?= $prod->titre." - ".$prod->plateforme;?></div>
                <div class="card card-body <?=$prod->plateforme." ".$prod->editeur;?>"data-price="<?=$prod->prix;?>">
                    <a href="./index.php?choix=prod_page&prod=<?=$prod->id;?>"class="rounded">
                        <img src="./img/Anthem.png" class="center-block img-responsive" style="width:140px;">
                    </a>
                </div><br>
                <div class="card-footer text-center" style="color: white;border-color: white">
                    <?= number_format($prod->prix,2,',',' ');?> €
                    <a href="./index.php?choix=addpanier&prod=<?=$prod->id;?>" class="fas fa-cart-arrow-down addCart"></a>
                </div>
            </div>
            <?php endforeach ?>
    </section>
</div>
<!--Script filtre de prix quand je prend plateforme via nav, il affcihe tous les produits-->
<script>
        $(document).ready(function(){
            function showProducts(minPrice, maxPrice) {
                $(".card").hide().filter(function() {
                    var price = parseInt($(this).data("price"));
                    return price >= minPrice && price <= maxPrice;
                }).show();
            };
            var outPut=$("#sliderOutPut");
            $("#slider").slider({
                range : true,
                min:5,
                max:500,
                values:[5,500],
                slide:function(event,ui){
                    outPut.html(ui.values[0]+'- '+ui.values[1]+' €');
                    showProducts(ui.values[0],ui.values[1]);
                }
            });
            outPut.html($("#slider").slider('values',0)+' - '+$("#slider").slider('values',1)+'€');
            showProducts($("#slider").slider('values',0),$("#slider").slider('values',1));
        });
</script>
<!-- script pour le afficher selon $_GET['plate'] avec check de box adéquate ok-->
<script>
    var plat="<?=$plat?>";
    console.log(plat);
    if(plat=="null"){
        $(".card").hide();
    }else{
        $(".card").hide();
        $("input[value= <?=$plat?>]").prop('checked',true);
        $("."+"<?=$plat?>").show();
    }
</script>
<!-- Script pour réinitialiser la page, à travailler -->
<script>
    $("#reset").click(function(){
        
        $("input[type='radio']").prop('checked',false);
        
    });
</script>
<script>
     //script pour le afficher selon filtre plateforme ok
    $("input[type='radio']").click(function(){
        var radioValue=$("input[name='plat']:checked").val();
        if(radioValue){
            $(".card").hide();
            $("."+radioValue).show();
            $(".sous_titre").text("Jeux "+radioValue);
        }
    });
</script>
<script>
    //script pour le afficher selon filtre editeur ok
    $("input[type='radio']").click(function(){
        var radioValue=$("input[name='edit']:checked").val();
        if(radioValue){
            $(".card").hide();
            $("."+radioValue).show();
            $(".sous_titre").text("Jeux "+radioValue);
        }
    });
</script>