

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="assets/css/theme.css"/>
    <script type="text/javascript"></script>
    <title>BiblioNet</title>
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
                                <th>Livre
                                </th>
                                <th>
                                </th>
                                <th>
                                </th>
                                <th>
                                    <button name="ajoutbook" class="btn btn-outline-info" type="submit">Ajouter un
                                        Livre
                                    </button>

                                </th>
                            </tr>


                            <?php
                            $admin = new Admin();
                            $resultat = $admin->listerLivre();
                            foreach ($resultat as $livre) {
                                $iddulivre = $livre['id_livre'];
                                echo "<tr>" .
                                    "<td>" . $livre['id_livre'] .
                                    "</td><td>" . $livre['titre'] .
                                    "</td><td>" . '<button name="editbook"  value=' . $iddulivre . ' class="btn btn-outline-primary" type="submit" >Editer</button>' .
                                    "</td><td>" . '<button name="deletebook" onclick= myFunction() value=' . $iddulivre . ' class="btn btn-outline-danger" type="submit">Supprimer</button>' .
                                    "</td>" .
                                    "</tr>";
                            }


                            if (isset($_POST['ajoutbook'])) {

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
                                                    <label for="exampleFormControlInput1">Titre du livre</label>
                                                    <input type="text" class="form-control"
                                                           placeholder="ex: Harry Potter"
                                                           name="titre">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleFormControlInput1">Annee</label>
                                                    <input type="text" class="form-control" placeholder="ex: 1997"
                                                           name="annee">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleFormControlTextarea1">Resume</label>
                                                    <textarea class="form-control" placeholder="Il était une fois..."
                                                              name="resume"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <input type="file" name="image" class="form-control-file">
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
                                $admin->ajoutLivre($_POST['titre'], $_POST['annee'], $_POST['resume'], $_POST['image']);

                                ?>
                                <div class="alert alert-success" role="alert">
                                    Le livre a été Ajouter !
                                </div>
                                <?php
                            }


                            if (isset($_POST['deletebook'])) {
                                $admin->supprimerLivre($_POST['deletebook']); ?>
                                <div class="alert alert-danger" role="alert">
                                    Le livre a été Supprimer !
                                </div><?php

                            }

                            if (isset($_POST['editbook'])) {



                                ?>
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Modification d'un livre</h5>
                                            <button type="submit" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post">
                                                <div class="form-group">
                                                    <label for="exampleFormControlInput1">Nouveau Titre</label>
                                                    <input type="text" name="newtitre" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleFormControlInput1">Nouvelle Annee</label>
                                                    <input type="text" class="form-control"
                                                           name="newannee">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleFormControlTextarea1">Nouveau Resume</label>
                                                    <textarea class="form-control"
                                                              name="newresume"></textarea>
                                                </div>

                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-secondary" data-dismiss="modal">
                                                Annuler
                                            </button>
                                            <button type="submit" name="modifi" class="btn btn-primary">Enregistrer les
                                                changements
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            if (isset($_POST['modifi'])) {
                                //if (!empty(!$_POST['newtitre']) AND !empty(!$_POST['newannee']) AND !empty(!$_POST['newresume']) AND !empty(!$_POST['newimage'])){
                                $admin->modifierLivre($iddulivre, $_POST['newtitre'], $_POST['newannee'], $_POST['newresume']);

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