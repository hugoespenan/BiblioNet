<?php
require_once __DIR__ . '/../bdd/bdd.php';
class Notification
{

    public function afficherNotification(){
        $bdd = new bdd("biblionet", "localhost", "", "root");
        $requ = $bdd->b->query("SELECT * FROM notification WHERE visible = true");
        $res = $requ->fetchAll();
        return $res;
    }
    public function notificationLue($id_notif){
        $bdd = new bdd("biblionet", "localhost", "", "root");
        $requ = $bdd->b->prepare("UPDATE notification SET visible = :lu WHERE id_notification = :id");
        $requ->execute(array('lu' => false, 'id' => $id_notif));
    }
    /*public function envoyerNotification($titre, $description, $id_user){
        $bdd = new bdd("biblionet", "localhost", "", "root");
        $requ = $bdd->b->prepare("INSERT INTO notification (titre, description, visible) VALUES (:titre, :descri, true)");
    }*/
}