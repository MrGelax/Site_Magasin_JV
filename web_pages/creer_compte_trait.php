<?php
    var_dump($_POST);
    $login =addslashes($_POST['login']);
    $psw= addslashes($_POST['psw']);
    $admin=0;
    if($psw==="isfce1040"){
        $admin=1;
    }
    $sql="insert into membre(login,password,admin) values('$login','$psw','$admin')";
    $dbh->exec($sql);
    header("Location:index.php");
    exit();
?>