<?php
if (isset($_SESSION['connecter'])) {
    if (isset($_GET['d'])) {
        session_destroy();
        $_SESSION['connecter'] = false;
    }
}

if (!isset($_SESSION['connecter']))
    $_SESSION['connecter'] = false;

if (!empty($_POST['email']) and !empty($_POST['pwd'])) {
    $inscrit1 = new Inscrit();

    if ($inscrit = $inscrit1->connexion($_POST['email'], $_POST['pwd'])) {

        $_SESSION['connecter'] = true;
        foreach ($inscrit as $inscrit_connecter) {

            $_SESSION['id_inscrit'] = $inscrit_connecter['id_inscrit'];
            $_SESSION['nom'] = $inscrit_connecter['nom'];
            $_SESSION['prenom'] = $inscrit_connecter['prenom'];
            $_SESSION['email'] = $inscrit_connecter['email'];
            $_SESSION['tel_portable'] = $inscrit_connecter['tel_portable'];
            $_SESSION['rue'] = $inscrit_connecter['rue'];
            $_SESSION['mdp'] = $inscrit_connecter['mdp'];
            $_SESSION['cp'] = $inscrit_connecter['cp'];
            $_SESSION['ville'] = $inscrit_connecter['ville'];
        }
    } else {
        ?>
        <script type="text/javascript"> window.alert('email ou mot de passe incorrect! ');</script>
        <?php

    }
}

?>