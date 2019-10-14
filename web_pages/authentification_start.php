<?php
$login_tentative = $_POST['login'];
$password_tentative = $_POST['pswd'];
$sql="SELECT * from membre where login='$login_tentative'";
$sth=$dbh->query($sql);
if($sth==FALSE){
    header('Location:./index.php?choix=accueil&msg=err_sql');
}else{
    $user=$sth->fetch(PDO::FETCH_ASSOC);
    if(empty($user)){
        header('Location:./index.php?choix=accueil&msg=err_login');
    }elseif($password_tentative==$user['password']){
        session_regenerate_id();
        ini_set('session.gc_maxlifetime',10800);
        $_SESSION['login']=$user['login'];
        $_SESSION['admin']=$user['admin'];
        header('Location:./index.php');
    }else{
        header('Location:./index.php?choix=accueil&msg=err_pswd');
    }
}
?>