<?php
require_once __DIR__ . '/../bdd/bdd.php';
require_once 'src/traitement/Emprunt.php';

class Notification
{

    public function afficherNotification()
    {
        $bdd = new bdd("biblionet", "localhost", "", "root");
        $requ = $bdd->b->query("SELECT * FROM notification WHERE visible = true");
        $res = $requ->fetchAll();
        return $res;
    }

    public function notificationLue($id_notif)
    {
        $bdd = new bdd("biblionet", "localhost", "", "root");
        $requ = $bdd->b->prepare("UPDATE notification SET visible = :lu WHERE id_notification = :id");
        $requ->execute(array('lu' => false, 'id' => $id_notif));
    }

    public function envoyerNotificationPerso($titre, $description, $id_user)
    {
        $bdd = new bdd("biblionet", "localhost", "", "root");
        $requ = $bdd->b->prepare("INSERT INTO notification_perso (titre, description, visible, ref_inscrit) VALUES (:titre, :descri, true, :id)");
        $requ->execute(array('titre' => $titre, 'descri' => $description, 'id' => $id_user));
    }

    public function retard($id)
    {
        $bdd = new bdd("biblionet", "localhost", "", "root");
        $requ = $bdd->b->prepare("SELECT DATE_ADD(emprunt.date, INTERVAL emprunt.delais DAY) AS NewDate, id_emprunt FROM emprunt WHERE ref_inscrit = :id");
        $requ->execute(array('id' => $id));
        $res = $requ->fetchAll();
        $b = array();
        $i = 0;
        foreach ($res as $re) {
            if ($re['NewDate'] < date('Y-m-d')) {
                $b[$i] = $re['id_emprunt'];
                $i = $i + 1;
            }
        }
        if (!empty($b)) {
            $em = new Emprunt();
            foreach ($b as $item) {
                $id_ex = $em->getExemplaire($item);
                $rr = $bdd->b->prepare("SELECT * FROM notification_perso WHERE ref_exemplaire = :ref");
                $rr->execute(array('ref' => $id_ex));
                $rres = $rr->fetchAll();
                if (empty($rres)) {
                    $nomlivre = $em->getTitreLivre($item);
                    $nbjours = $em->NbJoursDepasse($item);
                    $r = $bdd->b->prepare("INSERT INTO notification_perso (titre, description, visible, ref_inscrit, ref_exemplaire) VALUES ('Rendez votre livre', CONCAT('Vous avez un livre à rendre : ', :nomlivre, ', retard de ',:nbjours, ' jours !') , true, :id, :id_ex)");
                    $r->execute(array('id' => $id, 'nomlivre' => $nomlivre, 'id_ex' => $id_ex, 'nbjours' => $nbjours));
                }
            }
        }

    }

    public function afficherNotificationPerso($id_inscrit)
    {
        $bdd = new bdd("biblionet", "localhost", "", "root");
        $requ = $bdd->b->prepare("SELECT * FROM notification_perso WHERE visible = true and ref_inscrit = :id");
        $requ->execute(array('id' => $id_inscrit));
        $res = $requ->fetchAll();
        return $res;
    }

    public function notificationPersoLue($id_notif)
    {
        $bdd = new bdd("biblionet", "localhost", "", "root");
        $requ = $bdd->b->prepare("UPDATE notification_perso SET visible = :lu WHERE id_notification_perso = :id");
        $requ->execute(array('lu' => false, 'id' => $id_notif));
    }
}