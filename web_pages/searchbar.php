<input id="search" name="search" type="text" class="form-control" placeholder="Search...." style="width: 150px;margin:0px 10px 0px">
<div class=" list-group" style="width: 150px;margin: 0px 20px 0px;height: 100px;overflow:auto"><?php
    $prods = $DB->query("SELECT id,titre,plateforme,editeur,date_de_sortie,prix FROM jeu order by plateforme");
    foreach($prods as $prod): ?>
        <a class="row list-group-item"href="index.php?choix=prod_page&id=<?=$prod->id;?>">
            <img class="img-responsive" style="width:50px;display: inline-block" src="img/Anthem.png" alt="photos3">
            <?php echo($prod->titre." ".$prod->prix."€");?>
        </a><?php
    endforeach ?>
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