
<?php
include("src/vue/head.php");
include("src/traitement/Inscrit.php");
include("src/vue/login.php");
include("src/traitement/Admin.php");
?>
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
        <div class="col-lg-3">
            <div class="header__logo">
                <a href="index.php">
                    <img src="assets/img/BiblioNet.png" alt="">
                </a>
            </div>
        </div>
        <div class="col-lg-7">
            <nav class="header__menu">

                <h3>Tableau de bord - Administrateurs</h3>

            </nav>
        </div>
    </div>


    <form method="post" action="adminpage1.php">
        <div class="d-grid gap-2 col-7 mx-auto">
            <button name="user" class="btn btn-outline-success" type="submit">Gestion Utilisateurs</button>
            <button name="book" class="btn btn-outline-success" type="submit">Gestion Livres</button>
            <button name="emprunt" class="btn btn-outline-success" type="submit">Gestion Emprunts</button>
            <button name="deco" class="btn btn btn-primary" type="submit">Déconnexion</button>
        </div>
    </form>
    <?php

    if (isset($_POST['deco'])) {
        $_SESSION['admin'] = false;
        header("location: adminlogin.php");
    }
    ?>
    <?php

    if (isset($_POST['user'])) {
        header("location: gestionuser.php");
    }

    if (isset($_POST['emprunt'])) {
        header("Location: gestionemprunt.php");
    }

    if (isset($_POST['book'])) {
        header("Location: gestionbook.php");
    }
    ?>


</div>
</body>
</html>