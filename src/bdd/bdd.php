<?php




class bdd
{
    private $nombdd;
    private $host;
    private $mdpbdd;
    private $username;


    public function __construct($nombdd, $host, $mdp, $username)
    {
        try {

            $this->b = new PDO('mysql:host=' . $this->host = $host . ';dbname=' . $this->nombdd = $nombdd . ';charset=utf8', $this->username = $username, $this->mdpbdd = $mdp);

        } catch (Exception $e) {

            die('Erreur : ' . $e->getMessage());

        }

    }
}
?>