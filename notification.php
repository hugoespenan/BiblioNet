<?php
include("src/vue/head.php");
require_once("src/traitement/Inscrit.php");
require_once 'src/traitement/AuteurController.php';
require_once 'src/traitement/Notification.php';
include("src/vue/login.php");
include("src/vue/header.php");
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

<header class="header">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="header__logo">
                    <a href="index.php">
                        <img src="assets/img/BiblioNet.png" alt="">
                    </a>
                </div>
            </div>
            <div class="col-lg-6">
                <nav class="header__menu">
                    <ul>


                        <li><a href="index.php">Acceuil</a></li>
                        <?php

                        if (!$_SESSION['connecter']) {
                            ?>
                            <li><a href="inscription.php">Inscription</a></li>
                            <?php
                        }
                        ?>
                        <li class="active"><a href="reglement.php">Réglement</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>
<body>
<div class="container align-content-center">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-warning panel1">
                <div class="panel-body">
                    <div id="reglement_ecrire">
                        <center><h2 style="color: black; font-size: 40px"><b>Notifications</b></h2></center>
                        <ul>
                            <?php $notif = new Notification();
                            foreach ($notif->AfficherNotification() as $item) {
                                ?>
                                <a href="notification.php?f=<?php echo $item['id_notification'] ?>">
                                    <li>
                                        <div class="alert alert-success" role="alert">
                                            <h4 class="alert-heading"><?php echo $item['titre'] ?></h4>
                                            <hr>
                                            <p><?php echo $item['description'] ?></p>
                                        </div>
                                    </li>
                                </a>
                                <?php
                                if (isset($_GET['f'])) {
                                    if ($_GET['f'] == $item['id_notification']) {
                                        $notif->notificationLue($item['id_notification']);
                                    }
                                }
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</body>
</html>



