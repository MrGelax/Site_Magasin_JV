<?php
    if((!isset($_SESSION['login'])||
            ((isset($_SESSION['login'])&&isset($_SESSION['admin']))&&
            $_SESSION['admin']===1))){
        ?>
        <script>
            alert("Vous n'avez pas les droit");
            document.location.href="http://localhost/DaSilva_Projet/index.php"
        </script>
        <?php
    }else{
?>
<div id="titre_btn" class="row">
    <h3 class="col-sm-9"style="margin: 3px 50px 3px;"><u>Liste des membres</u></h3>
</div><br>
<?php
    $sql = "SELECT * FROM membre order by id";
    $sth = $dbh->query($sql);
    if ($sth === FALSE) {
        echo("Erreur : la requete SQL est incorrecte. <br/>");
    } else {
        $users=$sth->fetchAll(PDO::FETCH_ASSOC);?>
        <table class="table table-hover"
               style="margin: 3px 50px 3px;border-radius: 12px;width:500px"> 
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Login</th>
                    <th>Password</th>
                    <th>Admin</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($users as $user){
                        echo("<tr><td>".$user['id']."</td><td>".$user['login']."</td>".
                                "<td>".$user['password']."</td><td class='text-center'style='width:50px'>"
                                .$user['admin']."</td><td class='text-center'style='width:50px;'>");?>
                        <a href="<?php echo("index.php?choix=sup_user&id=".$user["id"]);?>"
                           class="btn fa fa-remove" style="color: red">
                        </a></td></tr><?php
                    }
                ?>
            </tbody>
        </table>
            <?php 
    }
    }
?>
