<nav class="row navbar navbar-expand-md navbar-dark navbar-default" style="background-color:#595959;border-radius: 5px;height: 55px">
    <div class="container-fluid">
        <a class="navbar-brand active col-md-1" href="index.php"><img src="img/logo.jpg" alt=""style="width:40px;"></a>
        <ul class="navbar-nav col-md-6">
            <li class="nav-item" style="margin-left:10px ;margin-right: 10px">
                <a class="nav-link" href="index.php?choix=prod&plat=PS4">PS4</a>
            </li>
            <li class="nav-item" style="margin-left:10px ;margin-right: 10px">
                <a class="nav-link"href="index.php?choix=prod&plat=XBOX">XBOX</a>
            </li>
            <li class="nav-item" style="margin-left:10px ;margin-right: 10px">
                <a class="nav-link"href="index.php?choix=prod&plat=WII">Wii</a>
            </li>
            <li class="nav-item" style="margin-left:10px ;margin-right: 10px">
                <a class="nav-link"href="index.php?choix=prod&plat=PC">PC</a>
            </li>
        </ul>
        <ul class="navbar-nav col-md-5"style="margin-left: 200px">
            <li  class="nav-item">
                <a class="nav-link" href="index.php?choix=magasins"><span class="fas fa-map-marker-alt"  style='font-size:20px;color:white' ></span>&nbsp; &nbsp;</a>
            </li>
            <li class="dropdown col nav-item">
                <button class="dropdown-toggle btn btn-secondary" style="margin: 8px 0px 6px;" type="button" data-toggle="dropdown">
                    <span class="fas fa-user"  style='font-size:20px'></span> Se connecter
                    <span class="caret"></span>
                </button>&nbsp; &nbsp; &nbsp; &nbsp;
                <div class="dropdown-menu dropdown-menu-lg" style="width: 260px;border-radius: 15px">
                    <form class="form-inline ml-auto"name="login" action="index.php?choix=authentification_start" method="post">
                        <div class="input-group ">
                            <input style="width: 230px;margin: 3px 12px 3px;border-radius: 50px" id="login" type="text" name="login"placeholder="Adresse email" class="form-control"/>
                            <input style="width: 230px;margin: 3px 12px 3px;border-radius: 50px"id="pswd"type="password" name="pswd"placeholder="Mot de passe" class="form-control"><br/>
                        </div>
                        <button style="border-radius: 50px;width: 230px;margin: 3px 12px 3px;" type="submit" class="btn btn-success btn-block">
                            <span style="font-size: 16px"class="fas fa-sign-in-alt"></span> &nbsp; &nbsp; Se connecter
                        </button>
                    </form>
                    <p class="text-center">
                        <a href="">Mot de passe oublié ?</a>
                    </p>
                    <div class="divider"></div>
                    <a style="border-radius: 50px;width: 230px;margin: 3px 12px 3px;" class=" btn btn-info btn-block" href="./index.php?choix=crea_compte"><span style="font-size: 16px"class="fas fa-chevron-circle-right"></span>&nbsp; &nbsp; Créer un Compte</a>
                </div>    
            </li>
        </ul>
    </div>
</nav>
<div id="err" class="row alert alert-danger alert-dismissible err invisible" style="width: 90%;margin: 0px 50px 0px;">
    <a href="#" id="close" class="close" data-dismiss="alert" aria-label="close">&times;</a>
</div>
<?php
    if(isset($_GET['msg'])){?>
        <script>
            var regex=/login/;
            if((regex.test("<?php echo($_GET['msg']);?>"))===true){
                $(".dropdown-menu").toggle();
                $('#login').attr('placeholder','Login Incorrect');
                $('#login').attr('class', 'form-control is-invalid');
            }else{
                $('#login').attr('class', 'form-control is-valid');
            }
            var regex=/pswd/;
            if((regex.test("<?php echo($_GET['msg']);?>"))===true){
                $(".dropdown-menu").toggle();
                $('#pswd').attr('placeholder','Mot de passe Incorrect');
                $('#pswd').attr('class', 'form-control is-invalid');
            }else{
                $('#pswd').attr('class', 'form-control is-valid');
            }
            
        </script>
    <?php }?>