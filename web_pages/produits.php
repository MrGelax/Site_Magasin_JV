<?php
    $sql = "SELECT * FROM jeu order by plateforme";
    $sth = $dbh->query($sql);
    if ($sth === FALSE) {
        echo("Erreur : la requete SQL est incorrecte. <br/>");
    }else{
        $prods = $sth->fetchAll(PDO::FETCH_ASSOC);
    }
    if(!isset($_GET['plat'])){
        $plat="toutes plateforme";
    } else {
        $plat=$_GET['plat'];
    }
?>
<div class="clearfix">
    <aside class="float-left">
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
            <a id="boutton" style="margin: 3px 12px 3px;border-radius: 50px"class="btn btn-info center-block" href="./index.php?choix=prod">Réinitialiser</a>
    </aside>
    <section class="float-left" id="produits">
        <?php echo("<br><p class='sous_titre'style='color:#C4C3C3;'>&nbsp &nbsp &nbsp &nbsp<strong>JEUX ".$plat."</strong></p>");?>

            <?php
            $i=1;
            foreach($prods as $prod){?>
            <div class="card bg-dark <?php echo($prod['plateforme']);?> <?php echo($prod['editeur']);?>"
                 style="margin: 0px 25px 25px;display: inline-block" data-price="<?php echo($prod['prix']);?>">
                <div class="card card-img-top <?php echo($prod['plateforme']);?> <?php echo($prod['editeur']);?>"data-price="<?php echo($prod['prix']);?>">
                    <a href="./index.php?choix=prod_page&id=<?php echo($prod['id']);?>"class="rounded">
                        <img src="./img/Anthem.png" class="center-block img-responsive" style="width:140px;">
                    </a>
                </div><br>                
                <div style="height:60px;max-width:150px" class=" text-center <?php echo($prod['plateforme']);?> <?php echo($prod['editeur']);?>"data-price="<?php echo($prod['prix']);?>">
                    <a href="./index.php?choix=prod_page&id=<?php echo($prod['id']);?>"><?php echo($prod["titre"]);?></a>
                    <?php echo("<div class=' card-text"." ".$prod['plateforme']." ".$prod['editeur']." ".$prod['prix']."'></div>");?>
                </div>
                
                <div class="card-footer text-center" style="color: white;border-color: white"><?php echo($prod['prix']." €");?></div>
            </div>
            <?php
                if(($i%4)===0) {
                    echo("<br>");
                    $i=1;
                }
                $i=$i+1;    
            }?>
    </section>
</div>

<!-- script pour le afficher selon $_GET['plate'] avec check de box adéquate ok-->
<?php
    if(isset($_GET['plat'])){
        ?><script>
            $("input[value= <?php echo($_GET['plat'])?>]").prop('checked',true);
            $(".card").hide();
            $("."+"<?php echo($_GET['plat']);?>").show();</script><?php
    }else{
        ?><script>$(".card").show();</script><?php
    }
?>
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
        }
    });
</script>
<script>
    $("#button").click(function(){
        $(".card").show();
    });
</script>

<!--Script filtre de prix-->
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