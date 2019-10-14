<?php
    session_start();
    include('db/connexion_db.php');
    if(isset($_GET['choix'])&&$_GET['choix']=="authentification_start"){
            include("web_pages/authentification_start.php");
        }
        if(isset($_GET['choix'])&&$_GET['choix']=="crea_compte_trait"){
            include("web_pages/creer_compte_trait.php");
        }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>GameShop</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">      
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">    
        
        <!-- Jquery link-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        
        <script src="popper/popper.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
    </head>
    <body class="container" style="background-color: #393939">
        <?php
        if(!isset($_SESSION['login'])&&(!isset($_SESSION['admin']))){
            include("include/menu_non_authentifier.php");
        }elseif($_SESSION['admin']==0){
            include("include/menu_authentifier.php");
        }else{
            include("include/menu_admin.php");
        }
        if(isset($_GET['msg'])&&$_GET['msg']==="ajout"){
            echo("Votre ajout à bien été effectué");
        }
        if (isset($_GET['choix'])) {
            $choix = $_GET['choix'];
        }else{
            $choix = "accueil";
        }
        switch ($choix) {
            case "accueil" ://tout le monde
                include("./web_pages/accueil.php");
        break;
        case "ajout_prod_formu"://admin
            include("./web_pages/admin/ajout_produit_formu.php");
        break;
        case "ajout_prod_trait" ://admin
            include("./web_pages/admin/ajout_produit_traitement.php");
        break;
                        case "authentification_stop" ://pas dans le nav
                            include("./web_pages/authentification_stop.php");
                        break;
                        case "liste_prod" ://admin
                            include("./web_pages/admin/liste_produits.php");
                        break;
                        case "mod_prod_formu" ://admin
                            include("./web_pages/admin/mod_prod_formu.php");
                        break;
                        case "mod_prod_trait"://pas dans le nav et admin
                            include("./web_pages/mod_prod_trait.php");
                        break;
                        case "sup_prod" ://pas dans le nav et admin
                            include("./web_pages/admin/sup_prod_traitement.php");
                        break;
                        case "prod" ://tout le monde
                            include("./web_pages/produits.php");
                        break;
                        case "contact" ://tout le monde
                            include("./web_pages/contact.php");
                        break;
                        case "crea_compte" ://pas montrer
                            include("./web_pages/creer_compte.php");
                        break;
                        case "crea_compte_trait" ://nouveau user
                            include("./web_pages/creer_compte_trait.php");
                        break;
                        case "liste_user" ://admin
                            include("./web_pages/admin/liste_users.php");
                        break;
                        case "sup_user" ://pas montrer et admin
                            include("./web_pages/admin/supprimer_user.php");
                        break;
                        case "prod_page" ://pas montrer
                            include("web_pages/produit_page.php");
                        break;
                        case "magasins" ://pas montrer
                            include("./web_pages/contact.php");
                        break;
                        default :
                            include("./web_pages/accueil.php");
                        break;
                    }?>
                    <br><br><br>
                    <?php
                    include("include/footer.php");
                ?>
    </body>
</html>