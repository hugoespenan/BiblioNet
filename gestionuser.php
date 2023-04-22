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
                                                                   name="newnom">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="exampleFormControlInput1">Prenom</label>
                                                            <input type="text" class="form-control"
                                                                   name="newprenom">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="exampleFormControlInput1">Email</label>
                                                            <input type="text" class="form-control"
                                                                   placeholder="test@test.fr"
                                                                   name="newemail">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleFormControlInput1">Telephone</label>
                                                            <input type="text" class="form-control"
                                                                   placeholder="0123456789"
                                                                   name="newtel_portable">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="exampleFormControlInput1">Adresse</label>
                                                            <input type="text" class="form-control"
                                                                   placeholder="11 Avenue de Victor Hugo"
                                                                   name="newrue">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleFormControlInput1">Cp</label>
                                                            <input type="text" class="form-control" placeholder="75300"
                                                                   name="newcp">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="exampleFormControlInput1">Ville</label>
                                                            <input type="text" class="form-control" placeholder="Paris"
                                                                   name="newville">
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-outline-dark" data-dismiss="modal">
                                                Annuler
                                            </button>
                                            <button type="submit" name="modifi" class="btn btn-outline-primary">
                                                Modifier
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                var_dump($_POST['edituser']);
                            }
                            if (isset($_POST['modifi'])) {
                                //if (!empty(!$_POST['newtitre']) AND !empty(!$_POST['newannee']) AND !empty(!$_POST['newresume']) AND !empty(!$_POST['newimage'])){
                                $admin->modifierUtilisateur($iduser, $_POST['newnom'], $_POST['newprenom'], $_POST['newemail'], $_POST['newtel_portable'],$_POST['newrue'],$_POST['newcp'],$_POST['newville']);

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