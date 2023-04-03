<?php

include("src/vue/head.php");
include("src/traitement/Inscrit.php");
include("src/vue/login.php");
include("src/traitement/Admin.php");
?>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
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
                                echo "<tr>" .
                                    "<td>" . $livre['id_livre'] .
                                    "</td><td>" . $livre['titre'] .
                                    "</td><td>" . '<button name="editbook" class="btn btn-outline-primary" type="submit">Editer</button>' .
                                    "</td><td>" . '<button name="deletebook" class="btn btn-outline-danger" type="submit">Supprimer</button>' .
                                    "</td>".
                                    "</tr>";
                            }


                            if (isset($_POST['ajoutbook'])) {

                                ?>
                                <div class="container">
                                    <form>
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Titre du livre</label>
                                            <input type="text" class="form-control" placeholder="ex: Harry Potter" name="titre" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Annee</label>
                                            <input type="text" class="form-control" placeholder="ex: 1997" name="annee" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1">Resume</label>
                                            <textarea class="form-control" name="resume" required" rows="3"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <input type="file" name="image" class="form-control-file">
                                        </div>
                                        <div class="row">
                                            <button type="submit" class="btn btn-outline-info" name="ajouter">Ajouter</button>
                                        </div>

                                    </form>
                                </div>
                                <?php

                            }

                            if (isset($_POST['ajouter'])) {

                                var_dump($_POST['image']);
                                $admin->ajoutLivre($_POST['titre'], $_POST['annee'], $_POST['resume'], $_POST['image'] );

                                ?>
                                <script type="text/javascript"> window.alert('Le livre a été ajouté avec succés !');</script>
                                <?php
                            }
                            if (isset($_POST['deletebook'])) {
                            }

                            if (isset($_POST['editbook'])) {

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