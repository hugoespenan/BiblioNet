<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="assets/css/theme.css"/>
    <script type="text/javascript"></script>
    <title>BiblioNet ConnexionADM</title>
</head>
<body>


<div class="container">
    <?php
    include("adminpage1.php");
    require_once("src/traitement/Inscrit.php")
    ?>
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-9">
            <div class="tableau">


                <div class="panel panel-default">
                    <div class="panel-body">

                    </div>
                    <form method="post">
                        <table class="table">


                            <tr>
                                <th>Id</th>
                                <th>Nom</th>
                                <th>Prenom</th>
                                <th>Email</th>
                                <th>Telephone</th>

                                <th></th>

                                <th>Adresse</th>

                                <th></th>
                                <th></th>

                                <th>CP</th>
                                <th>Ville</th>
                                <th>
                                    <button name="ajoutuser" class="btn btn-outline-info" type="submit">Ajouter</button>
                                </th>

                            </tr>


                            <?php
                            $admin = new Admin();
                            $tableau_id = [];
                            $resultat = $admin->listerInscrit();
                            foreach ($resultat as $lesInscrits) {
                                $iduser = $lesInscrits['id_inscrit'];
                                echo "<tr>" .
                                    "<td>" . $lesInscrits['id_inscrit'] .
                                    "</td><td>" . $lesInscrits['nom'] .
                                    "</td><td>" . $lesInscrits['prenom'] .
                                    "</td><td>" . $lesInscrits['email'] .
                                    "</td><td>" . $lesInscrits['tel_portable'] .
                                    "</td><td colspan='4'>" . $lesInscrits['rue'] .
                                    "</td><td>" . $lesInscrits['cp'] .
                                    "</td><td>" . $lesInscrits['ville'] .
                                    "</td><td>" . '<button name="edituser"  value=' . $iduser . ' class="btn btn-outline-primary" type="submit" >Editer</button>' .
                                    "</td><td>" . '<button name="deletuser" value=' . $iduser . ' onclick= myFunction() class="btn btn-outline-danger" type="submit">Supprimer</button>' .
                                    "</td>" .
                                    "</tr>";
                            }


                            if (isset($_POST['ajoutuser'])) {

                                ?>
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Ajout Utilisateurs </h5>
                                            <button type="submit" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <form>
                                                        <div class="col-md-6">
                                                            <label for="exampleFormControlInput1">Nom</label>
                                                            <input type="text" class="form-control"
                                                                   placeholder="Zidane"
                                                                   name="nom">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="exampleFormControlInput1">Prenom</label>
                                                            <input type="text" class="form-control"
                                                                   placeholder="Zinedine"
                                                                   name="prenom">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="exampleFormControlInput1">Email</label>
                                                            <input type="text" class="form-control"
                                                                   placeholder="test@test.fr"
                                                                   name="email">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleFormControlInput1">Telephone</label>
                                                            <input type="text" class="form-control"
                                                                   placeholder="0123456789"
                                                                   name="tel_portable">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="exampleFormControlInput1">Adresse</label>
                                                            <input type="text" class="form-control"
                                                                   placeholder="11 Avenue de Victor Hugo"
                                                                   name="rue">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleFormControlInput1">Cp</label>
                                                            <input type="text" class="form-control" placeholder="75300"
                                                                   name="cp">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="exampleFormControlInput1">Ville</label>
                                                            <input type="text" class="form-control" placeholder="Paris"
                                                                   name="ville">
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-outline-dark" data-dismiss="modal">
                                                Annuler
                                            </button>
                                            <button type="submit" name="ajouter" class="btn btn-outline-primary">
                                                Valide
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <?php

                            }

                            if (isset($_POST['ajouter'])) {
                                $admin->ajoutUtilisateur($_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['tel_portable'], $_POST['rue'], $_POST['cp'], $_POST['ville']);

                                ?>
                                <div class="alert alert-success" role="alert">
                                    L'utilisateur a été Ajouter !
                                </div>
                                <?php
                            }


                            if (isset($_POST['deletuser'])) {
                                $admin->supprimerUser($_POST['deletuser']); ?>
                                <div class="alert alert-danger" role="alert">
                                L'utilisateur <?= $lesInscrits['nom'] ?> a été Supprimer !
                                </div><?php

                            }

                            if (isset($_POST['edituser'])) {
                                $empla = $_POST['edituser'];
                                $_SESSION['empla'] = $empla;
                                var_dump($empla);
                                $admin = new Admin();
                                $tableau_id = [];
                                $resultat = $admin->listerSelectedInscrit($_POST['edituser']);

                                foreach ($resultat as $resSelected) {

                                    ?>
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Modification
                                                    Utilisateurs </h5>
                                                <button type="submit" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="container-fluid">
                                                    <div class="row">
                                                        <form method="post">
                                                            <div class="col-md-6">
                                                                <label for="exampleFormControlInput1">Nom</label>
                                                                <input type="text" class="form-control"
                                                                       name="newnom"
                                                                       placeholder=<?= $resSelected['nom'] ?>>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="exampleFormControlInput1">Prenom</label>
                                                                <input type="text" class="form-control"
                                                                       name="newprenom"
                                                                       placeholder=<?= $resSelected['prenom'] ?>>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="exampleFormControlInput1">Email</label>
                                                                <input type="email" class="form-control"
                                                                       name="newemail"
                                                                       placeholder=<?= $resSelected['email'] ?>>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleFormControlInput1">Telephone</label>
                                                                <input type="text" class="form-control"
                                                                       name="newtel_portable"
                                                                       placeholder=<?= $resSelected['tel_portable'] ?>>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="exampleFormControlInput1">Adresse</label>
                                                                <input type="text" class="form-control"
                                                                       name="newrue"
                                                                       placeholder=<?= $resSelected['rue'] ?>>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleFormControlInput1">Cp</label>
                                                                <input type="text" class="form-control"
                                                                       name="newcp"
                                                                       placeholder=<?= $resSelected['cp'] ?>>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="exampleFormControlInput1">Ville</label>
                                                                <input type="text" class="form-control"
                                                                       name="newville"
                                                                       placeholder=<?= $resSelected['ville'] ?>>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-outline-dark" data-dismiss="modal">
                                                    Annuler
                                                </button>
                                                <button type="submit" name="modifuser" class="btn btn-outline-primary">
                                                    Modifier
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                <?php


                                }
                            }

                            if (!empty($_POST['newnom'])) {
                                $admin->modifierNom($_POST['newnom'], $_SESSION['empla']);
                            }
                            if (!empty($_POST['newprenom'])) {
                                $admin->modifierPrenom($_SESSION['empla'], $_POST['newprenom']);
                            }
                            if (!empty($_POST['newemail'])) {
                                $admin->modifierMail($_SESSION['empla'], $_POST['newemail']);
                            }
                            if (!empty($_POST['newtel_portable'])) {
                                $admin->modifierTel($_SESSION['empla'], $_POST['newtel_portable']);
                            }
                            if (!empty($_POST['newrue'])) {
                                $admin->modifierRue($_SESSION['empla'], $_POST['newrue']);
                            }
                            if (!empty($_POST['newcp'])) {
                                $admin->modifierCP($_SESSION['empla'], $_POST['newcp']);
                            }
                            if (!empty($_POST['newville'])) {
                                $admin->modifierVille($_SESSION['empla'], $_POST['newville']);
                            }


                            ?>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


</body>
</html>