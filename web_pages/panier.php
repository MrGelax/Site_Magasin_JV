<?php
    if(isset($_GET['del'])){
        $panier->del($_GET['del']);
    }
?>
<table class="table table-hover" style="margin: 3px 50px 3px;border-radius: 12px;width:900px">  
    <thead>
        <tr>
            <th>Produit</th>
            <th>Prix Unitaire</th>
            <th>Quantité</th>
            <th>Sous-Total</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        var_dump($_SESSION);
        $ids= array_keys($_SESSION['panier']);
        var_dump($ids);
        if(empty($ids)){
            $products=array();
        }else{
            $products=$DB->query('SELECT * FROM jeu Where id IN('. implode(',',$ids).')');
        }
        foreach ($products as $prod):?>
    <form action="index.php?choix=panier"method="POST">
            <tr>
                <td><?=$prod->titre?></td>
                <td><?=$prod->prix;?>€</td>
                <td><input type="text" value="<?=$_SESSION['panier'][$prod->id];?>"style="width:40px;"></td>
                <td><?=number_format($prod->prix*$_SESSION['panier'][$prod->id],2,',',' ');?>€</td>
                <td><a href="index.php?choix=panier&del=<?=$prod->id;?>"class="btn fa fa-remove"
                       style="color: red;font-size: 15px"></a></td> 
            </tr>
            <input type="submit"value="Recalculer">
    </form>
        <?php endforeach;
        ?>
    </tbody>
    <tfoot>
        <tr>
            <td></td><td></td><td></td><td></td><td></td>
            <td class="totalPanier"><?=number_format($panier->total()*1.21,2,',',' ');?>€</td></tr>
    </tfoot>
</table>
