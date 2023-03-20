<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="assets/css/theme.css"/>
    <script type="text/javascript"></script>
    <title>BiblioNet Sign-in</title>
</head>
<body>

<?php
include("src/vue/head.php");
?>

<div class="col-lg-6">
    <ul class="nav nav-pills">
        <li><a href="index.php">Acceuil</a></li>
        <li class="active"><a href="inscription.php">Inscription</a></li>

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
                                <td><input type="text" name="username" id="username" placeholder="Email"
                                           required></td>
                            </tr>

                            <tr>
                                <td>Mot de passe<span>*</span></td>
                                <td><input type="password" name="password" id="password" placeholder="password"
                                           required></td>
                            </tr>
                            <tr>
                                <td>Telephone<span>*</span></td>
                                <td><input type="text" name="telephone" id="telephone" placeholder="Telephone Portable" required></td>
                            </tr>

                            <tr>
                                <td>Adresse<span>*</span></td>
                                <td><input type="text" name="adresse" id="adresse" placeholder="Adresse" required>
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




