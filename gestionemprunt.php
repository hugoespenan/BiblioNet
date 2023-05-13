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
                                <th>Emprunt
                                </th>
                                <th>Titre du livre emprunté
                                </th>
                                <th>Id de l'utilisateur qui a emprunté
                                </th>
                                <th>Date emprunt
                                </th>
                                <th>Délais
                                </th>
                                <th>
                                </th>
                                <th>
                                    <button name="ajoutemprunt" class="btn btn-outline-info" type="submit">Ajouter un
                                        Emprunt
                                    </button>

                                </th>
                            </tr>


                            <?php
                            require_once 'src/traitement/EmpruntController.php';
                            $emprunt = new EmpruntController();
                            $resultat = $emprunt->getAll();
                            $emp = 0;
                            foreach ($resultat as $emprunt) {
                                $idemprunt = $emprunt['id_emprunt'];
                                echo "<tr>" .
                                    "<td>" . $emprunt['id_emprunt'] .
                                    "</td><td>" . $emprunt['titre'] .
                                    "</td><td>" . $emprunt['inscrit'] .
                                    "</td><td>" . $emprunt['date'] .
                                    "</td><td>" . $emprunt['delais'] . " jours " .
                                    "</td><td>" . '<button value="' . $idemprunt . '" name="editemprunt" class="btn btn-outline-primary">Editer</button>' .
                                    "</td><td>" . '<button value="' . $idemprunt . '" name="deleteemprunt" class="btn btn-outline-danger" type="submit">Supprimer</button>' .
                                    "</td>" .
                                    "</tr>";
                            }
                            if (isset($_POST['ajoutemprunt'])) {
                                ?>
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Ajout Livre</h5>
                                            <button type="submit" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form>
                                                <div class="form-group">
                                                    <label for="exampleFormControlInput1">Date</label>
                                                    <input type="date" class="form-control"
                                                           name="dateaj">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleFormControlInput1">Delais</label>
                                                    <input type="number" class="form-control" placeholder="ex: 1997"
                                                           name="delaisaj">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleFormControlTextarea1">id inscrit</label>
                                                    <textarea class="form-control"
                                                              name="ref_inscrit"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleFormControlTextarea1">id exemplaire</label>
                                                    <textarea class="form-control"
                                                              name="ref_exemplaire"></textarea>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-outline-dark" data-dismiss="modal">
                                                Annuler
                                            </button>
                                            <button type="submit" name="ajouter" class="btn btn-outline-primary">
                                                Ajouter
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <?php

                            }
                            if (isset($_POST['ajouter'])) {
                                if (isset($_POST['dateaj']) and isset($_POST['delaisaj']) and isset($_POST['ref_exemplaire']) and isset($_POST['ref_inscrit'])){
                                    $emprunter = new EmpruntController();
                                    $emprunter->Emprunter($_POST['dateaj'], $_POST['delaisaj'], $_POST['ref_exemplaire'], $_POST['ref_inscrit']);
                                }
                            }
                            if (isset($_POST['deleteemprunt'])) {
                                $emp = $_POST['deleteemprunt'];
                                $emprunt0 = new EmpruntController();
                                $emprunt0->deleteEmrunt($emp);
                            }

                            if (isset($_POST['editemprunt'])) {
                                $emp = $_POST['editemprunt'];
                                ?>
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Modification d'un
                                                emprunt</h5>
                                            <button type="submit" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post">
                                                <div class="form-group">
                                                    <label for="exampleFormControlInput1">Nouveau delais</label>
                                                    <input type="text" class="form-control"
                                                           placeholder="ex: 10" name="newdelais">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleFormControlInput1">Nouvelle date</label>
                                                    <input type="date" class="form-control"
                                                           placeholder="ex: 2023-02-23"
                                                           name="newdate">
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-secondary" data-dismiss="modal">
                                                Annuler
                                            </button>
                                            <button value="<?php echo $emp ?>" type="submit" name="modifi"
                                                    class="btn btn-primary">Enregistrer
                                                les
                                                changements
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            if (isset($_POST['modifi'])) {
                                $emprunt2 = new EmpruntController();
                                $emprunt2->modifierEmprunt($_POST['modifi'], $_POST['newdelais'], $_POST['newdate']);
                            }
                            ?>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



