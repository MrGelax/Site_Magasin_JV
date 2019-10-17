<?php
/**
 * Description of panier
 *
 * @author Pedro
 */
class panier {
    private $DB;
    public function __construct($DB){
        if(!isset($_SESSION)){
            session_start();
        }
        if(!isset($_SESSION['panier'])){
            $_SESSION['panier']=array();
        }
        $this->DB=$DB;
    }
    public function add($product_id){
        if(isset($_SESSION['panier'][$product_id])){
            $_SESSION['panier'][$product_id]++;
        }else{
            $_SESSION['panier'][$product_id]=1;
        }
    }
    public function del($prod_id){
        unset($_SESSION['panier'][$prod_id]);
    }
    public function total(){
        $total=0;
        $ids= array_keys($_SESSION['panier']);//fonctionne
        if(empty($ids)){
            $products=array();
        }else{
            $products=$this->DB->query('SELECT id,prix FROM jeu Where id IN('. implode(',',$ids).')');
        }
        foreach ($products as $prod):
            $total+=$prod->prix*$_SESSION['panier'][$prod->id];
        endforeach;
        return $total;
    }
    public function count(){
        return array_sum($_SESSION['panier']);
    }
}
