<?php

include("src/vue/head.php");
include("src/traitement/Inscrit.php");
include("src/vue/login.php");
include("src/traitement/Admin.php");


if (!isset($_SESSION['admin'])) {
    $_SESSION['admin'] = false;
}


if (
    !empty($_POST['email']) and
    !empty($_POST['mdp'])
) {

    $admin = new Admin();
    try {
        if (1) {
            $admin->connexion($_POST['email'], $_POST['mdp']);
        } else {
            throw new Exception("Un probleme s'est produit lors de votre connexion!!! Merci de ressayer plus tard");
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}


?>


<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="assets/css/theme.css"/>
    <script type="text/javascript"></script>
    <title>BiblioNet ConnexionADM</title>
</head>
<body>


<div class="container">
    <div class="row">
        <div class="col-lg-3">
            <div class="header__logo">
                <a href="index.php">
                    <img src="assets/img/BiblioNet.png" alt="">
                </a>
            </div>
        </div>
        <div class="col-lg-7">
            <nav class="header__menu">

                <h3>Connexion en tant qu'Administrateur</h3>

            </nav>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-lg-12">


        <?php if ($_SESSION['admin'] == false
        ){ ?>
        <div class="panel panel-success panel1">
            <div class="panel-body">
                <fieldset>

                    <form action="adminpage.php" method="post">
                        <table class="login_table">

                            <tr>
                                <td>Email<span>*</span></td>
                                <td><input type="text" name="email" id="email" placeholder="Email" required></td>
                            </tr>

                            <tr>
                                <td>Mot de passe<span>*</span></td>
                                <td><input type="password" name="mdp" id="mdp" placeholder="Mot de passe" required></td>
                            </tr>

                            <tr>
                                <td><small>Se souvenir </small><input type="checkbox" name="keep" value="true"></td>
                                <td><input type="submit" value="Connexion"/><input type="reset" value="Effacer"/></td>
                            </tr>
                        </table>
                    </form>

                </fieldset>
            </div>
            <?php }

            if ($_SESSION['admin'] == true) {
            $admin = new Admin();
            try {
                if (1) {
                    $admin->listerInscrit();
                } else {
                    throw new Exception("Un probleme s'est produit lors du chargement des inscrits...");
                }
            } catch (Exception $e) {
                echo $e->getMessage();
            }



                ?>
            <form action="adminpage.php" method="post">
                <table class="login_table">
                    <tr>
                        <td><input type="submit" value="Déconnexion" name="deco" href="adminpage.php"></td>


                            <?php

                            if (isset($_POST['deco'])) {
                                $_SESSION['admin'] = false;
                                header("location: adminpage.php");
                            }
                        }
                        ?>
                    </tr>
                </table>
            </form>

        </div>

    </div>
</div>
</body>
</html>