<?php
include("src/vue/head.php");
require_once("src/traitement/Inscrit.php");
require_once 'src/traitement/AuteurController.php';
include("src/vue/login.php");
include("src/vue/header.php");
?>

<header class="header">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="header__logo">
                    <a href="index.php">
                        <img src="assets/img/BiblioNet.png" alt="">
                    </a>
                </div>
                <nav class="header__menu">
                    <ul>
                        <li class="active"><a href="profil.php">Mon compte</a></li>
                        <li><a href="emprunt.php">Mes emprunts</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    </div>
</header>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="assets/css/theme.css"/>
    <script type="text/javascript"></script>
    <title>BiblioNet</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-lg-12">


            <div class="panel panel-success panel1">
                <div class="panel-body">
                    <fieldset>
                        <form action="profil.php" method="post">
                            <table class="login_table">
                                <tr>
                                    <td>Nom<span>*</span> :</td>
                                    <td><input type="text" name="nom" id="nom"
                                               value=<?php echo $_SESSION['nom'] ?> onclick="this.value='' " required>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Prenom<span>*</span></td>
                                    <td><input type="text" name="prenom" id="prenom"
                                               value=<?php echo $_SESSION['prenom'] ?> onclick="this.value='' "
                                        required>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Email<span>*</span></td>
                                    <td><input type="email" name="email" id="email"
                                               value=<?php echo $_SESSION['email'] ?> onclick="this.value='' " required>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Mot de Passe<span>*</span></td>
                                    <td><input type="password" name="mdp" id="pwd"
                                               value=<?php echo $_SESSION['mdp'] ?> onclick="this.value='' " required>
                                    </td>
                                </tr>
                                <tr>
                                    <td>adresse <span>*</span></td>
                                    <td><input type="text" name="tel_portable" id="tel_portable"
                                               value=<?php echo $_SESSION['tel_portable'] ?> onclick="this.value='' "
                                        required>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Adresse <span>*</span></td>
                                    <td><input type="text" name="rue" id="rue"
                                               value=<?php echo $_SESSION['rue'] ?> onclick="this.value='' " required>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Code Postale<span>*</span></td>
                                    <td><input type="text" name="cp" id="cp"
                                               value=<?php echo $_SESSION['cp'] ?> onclick="this.value='' " required>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Ville<span>*</span></td>
                                    <td><input type="text" name="ville" id="ville"
                                               value=<?php echo $_SESSION['ville'] ?> onclick="this.value='' " required>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><input type="submit" value="modifier"> <input type="reset" value="repeter"/>
                                    </td>
                                </tr>
                            </table>
                        </form>

                    </fieldset>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</body>
</html>

<?php

if(!empty($_SESSION['id_inscrit']) AND !empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['email']) AND !empty($_POST['mdp']) AND !empty($_POST['tel_portable']) AND !empty($_POST['rue'])AND !empty($_POST['cp'])AND !empty($_POST['ville'])){

    $inscrit=new Inscrit();
    $inscrit->updateUtilisateur($_SESSION['id_inscrit'],$_POST['nom'],$_POST['prenom'],$_POST['email'],$_POST['mdp'],$_POST['tel_portable'], $_POST['rue'], $_POST['cp'], $_POST['ville']);
    $_SESSION['nom'] = $_POST['nom'];
    $_SESSION['prenom'] = $_POST['prenom'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['tel_portable'] = $_POST['tel_portable'];
    $_SESSION['rue'] = $_POST['rue'];
    $_SESSION['mdp'] = $_POST['mdp'];
    $_SESSION['cp'] = $_POST['cp'];
    $_SESSION['ville'] = $_POST['ville'];
    ?>
    <script type="text/javascript"> window.alert('Votre compte a ete modifie !');</script>

<?php
}

?>


