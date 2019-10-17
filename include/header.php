<?php
    require 'db/db.class.php';
    require 'web_pages/panier.class.php';
    $DB=new DB('localhost','root','','jeuxvideo');
    $panier=new panier($DB);
?>