<?php
    if(!isset($_GET['prod'])){
        ?>
<script>
    $(".err").text("Page introuvable");
    $(".err").removeClass("invisible");
    $(".close").removeClass("invisible");
</script> 
        <?php
    }else{    
        $prod=$DB->query("SELECT * FROM jeu where id=".$_GET['prod']);
        if ($prod === FALSE) {
            echo("Erreur : la requete SQL est incorrecte. <br/>");
        }else{?>
            
            <div class="row" style="margin: 0px 0px 50px">            
                <asside class="col-md-3" style="display: inline">
                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                        <ul class="carousel-indicators">
                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarousel" data-slide-to="1"></li>
                            <li data-target="#myCarousel" data-slide-to="2"></li>
                        </ul>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="img/Anthem.png" alt="photos1"class="img-responsive" style="width: 200px;height: 250px">
                            </div>
                            <div class="carousel-item">
                                <img src="img/Anthem.png" alt="photos2" class="img-responsive"  style="width: 200px;height: 250px">
                            </div>
                            <div class="carousel-item">
                                <img src="img/Anthem.png" alt="photos3"class="img-responsive"  style="width: 200px;height: 250px">
                            </div>
                        </div>
                    </div>
                </asside>
                <section style="display: inline;margin:10px 20px 30px;">
                    <h3>Desciption du produit</h3>
                    <p><?=$prod[0]->synopsis?></p>
                </section>
            </div><?php
        }
    }
    ?>