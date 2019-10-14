<nav class="row navbar navbar-expand-md navbar-dark navbar-default" style="background-color:#595959;border-radius: 5px">
    <div class="container-fluid">
        <a class="navbar-brand col-md-1" href="index.php?choix=accueil"><img class="img-responsive" src="./img/logo.jpg" alt="Logo_du_Magasin"style="width:40px;"></a>
        <ul class="navbar-nav col-md-6">
            <li class="nav-item" style="margin-left:10px ;margin-right: 10px"><a class="nav-link" href="index.php?choix=liste_prod">Liste Produits</a></li>
            <li class="nav-item" style="margin-left:10px ;margin-right: 10px"><a class="nav-link" href="index.php?choix=liste_user">Liste User</a></li>
            <li class="nav-item" style="margin-left:10px ;margin-right: 10px"><a class="nav-link" href="index.php?choix=ajout_prod_formu">Ajouter Produits</a></li>
        </ul>
        <ul class="navbar-nav col-md-5"style="margin-left: 270px">
            <li id="magasin"class="nav-item" style="margin-left:10px ;margin-right: 10px">
                <a class="nav-link"href="index.php?choix=magasins">
                    <span class="fas fa-map-marker-alt"></span>
                </a>
            </li>
            <li class="nav-item " style="margin-left:10px ;margin-right: 10px">
                <a class="btn nav-link" href="index.php?choix=authentification_stop">
                    <span class="fas fa-sign-out-alt"></span> Log-Out
                </a>
            </li>
        </ul>
    </div>
</nav>
<div id="err" class="row alert alert-danger alert-dismissible err invisible" style="width: 90%;margin: 0px 50px 0px;">
    <a href="#" id="close" class="close" data-dismiss="alert" aria-label="close">&times;</a>
</div>