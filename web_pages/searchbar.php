<input id="search" name="search" type="text" class="form-control" placeholder="Search...." style="width: 150px;margin:0px 10px 0px">
<div class=" list-group" style="width: 150px;margin: 0px 20px 0px;height: 100px;overflow:auto"><?php
    $sql = "SELECT id,titre,plateforme,editeur,date_de_sortie,prix FROM jeu order by plateforme";
    $sth = $dbh->query($sql);
    if ($sth === FALSE) {
        echo("Erreur : la requete SQL est incorrecte. <br/>");
    } else {
        $prods = $sth->fetchAll(PDO::FETCH_ASSOC);
        foreach($prods as $prod){ ?>
            <a class="row list-group-item"href="index.php?choix=prod_page&id=<?php echo(" ".$prod['id']." ");?>">
                <img class="img-responsive" style="width:50px;display: inline-block" src="img/Anthem.png" alt="photos3">
                <?php echo($prod['titre']." ".$prod['prix']."€");?>
            </a><?php
        }
    }?>
</div>
<script>
    $(function(){
        $(".list-group ").hide();
	$('#search').keyup(function(){
            if ($('#search').val() !== "") {
                $(".list-group a").hide();
                $(".list-group a").each(function(){
                    if ($(this).text().indexOf($('#search').val())>0) {
                        $(".list-group").show();
                        $(this).show();    	 	
                    };
                });    	
            } else {
                $(".list-group").hide();
                $(".list-group a").hide();        
            };
        });
    });
    document.get
</script>