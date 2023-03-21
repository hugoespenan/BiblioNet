<?php

include("src/vue/head.php");
include ("src/traitement/Inscrit.php");

if(!isset($_SESSION['connecter']))
    $_SESSION['connecter']=false;


if(!empty($_POST['nom']) AND
    !empty($_POST['prenom']) AND
    !empty($_POST['email']) AND
    !empty($_POST['mdp']) AND
    !empty($_POST['telephone']) AND
    !empty($_POST['rue']) AND
    !empty($_POST['cp']) AND
    !empty($_POST['ville'])
){

    $inscrit= new Inscrit($_POST['nom'],$_POST['prenom'],$_POST['email'],$_POST['mdp'],$_POST['telephone'],$_POST['rue'],$_POST['cp'], $_POST['ville']);
    try
    {
        if(1)
        {
            $inscrit->inscription($_POST['nom'],$_POST['prenom'],$_POST['email'],$_POST['mdp'],$_POST['telephone'],$_POST['rue'],$_POST['cp'], $_POST['ville']);
        }
        else
        {
            throw new Exception("Un probleme s'est produit lors de votre inscription!!! Merci de ressayer plus tard");
        }
    }
    catch(Exception $e)
    {
        echo $e->getMessage();
    }
}

var_dump($_POST);
var_dump($inscrit);
?>


<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="assets/css/theme.css"/>
    <script type="text/javascript"></script>
    <title>BiblioNet Inscription</title>
</head>
<body>


<div class="col-lg-6">
    <ul class="nav nav-pills">
        <li><a href="index.php">Acceuil</a></li>

        <?php

        if(!$_SESSION['connecter']){
        ?>
        <li class="active"><a href="inscription.php">Inscription</a></li>
        <?php
        }
        ?>

        <li><a href="reglement.php">Reglement</a></li>

        <li><a href="bibliotheque.php">Bibliotheque</a></li>
    </ul>
</div>


<div class="row">
    <div class="col-lg-12">


        <div class="panel panel-success panel1">
            <div class="panel-body">
                <fieldset>

                    <form action="inscription.php" method="post">
                        <table class="login_table">

                            <tr>
                                <td>Nom<span>*</span></td>
                                <td><input type="text" name="nom" id="nom" placeholder="Nom" required></td>
                            </tr>
                            <tr>
                                <td>Prenom<span>*</span></td>
                                <td><input type="text" name="prenom" id="prenom" placeholder="Prenom" required></td>
                            </tr>

                            <tr>
                                <td>Email<span>*</span></td>
                                <td><input type="text" name="email" id="email" placeholder="Email" required></td>
                            </tr>

                            <tr>
                                <td>Mot de passe<span>*</span></td>
                                <td><input type="password" name="mdp" id="mdp" placeholder="Mot de passe" required></td>
                            </tr>
                            <tr>
                                <td>Telephone<span>*</span></td>
                                <td><input type="text" name="telephone" id="telephone" placeholder="Telephone Portable" required></td>
                            </tr>

                            <tr>
                                <td>Adresse<span>*</span></td>
                                <td><input type="text" name="rue" id="rue" placeholder="Adresse" required>
                                </td>
                            </tr>

                            <tr>
                                <td>Code Postale<span>*</span></td>
                                <td><input type="text" name="cp" id="cp" placeholder="Code Postale (ex:93300)" required>
                                </td>
                            </tr>

                            <tr>
                                <td>Ville<span>*</span></td>
                                <td><input type="text" name="ville" id="ville" placeholder="Ville" required>
                                </td>
                            </tr>

                            <tr>
                                <td><small>Se souvenir </small><input type="checkbox" name="keep" value="true"></td>
                                <td><input type="submit" value="S'inscrire"/><input type="reset" value="Effacer"/></td>
                            </tr>
                        </table>
                    </form>

                </fieldset>
            </div>
        </div>

    </div>
</div>
</body>
</html>




