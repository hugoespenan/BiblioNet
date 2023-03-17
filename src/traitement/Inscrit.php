<?php
require_once __DIR__ . '/../bdd/bdd.php';
class Inscrit
{
    protected $nom;
    protected $prenom;
    protected $email;
    protected $mdp;
    protected $tel_fixe;
    protected $tel_portable;
    protected $rue;
    protected $cp;
    protected $ville;

    public function construct($nom,$prenom,$email,$mdp,$tel_fixe,$tel_portable,$rue,$cp,$ville){
        $this->nom=$nom;
        $this->prenom=$prenom;
        $this->email=$email;
        $this->mdp=$mdp;
        $this->tel_fixe=$tel_fixe;
        $this->tel_portable=$tel_portable;
        $this->rue=$rue;
        $this->cp=$cp;
        $this->ville=$ville;
    }

    public function connexion($email, $mdp)
    {
        $cobdd = new bdd("biblionet", "localhost", "", "root");
        $c = $cobdd->b->prepare("SELECT * FROM inscrit WHERE email = :email and mdp = :mdp");
        $c->execute(array('email' => $email, 'mdp' => $mdp));
        $resultat = $c->fetchAll();
        if (!empty($resultat)) {
            foreach ($resultat as $item) {
                $this->setId($item['id_utilisateur']);
            }
        } else {
            header("Location: index.php");
        }
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getMdp()
    {
        return $this->mdp;
    }

    /**
     * @param mixed $mdp
     */
    public function setMdp($mdp)
    {
        $this->mdp = $mdp;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    /**
     * @return mixed
     */
    public function getTelPortable()
    {
        return $this->tel_portable;
    }

    /**
     * @param mixed $tel_portable
     */
    public function setTelPortable($tel_portable)
    {
        $this->tel_portable = $tel_portable;
    }

    /**
     * @return mixed
     */
    public function getTelFixe()
    {
        return $this->tel_fixe;
    }

    /**
     * @param mixed $tel_fixe
     */
    public function setTelFixe($tel_fixe)
    {
        $this->tel_fixe = $tel_fixe;
    }

    /**
     * @return mixed
     */
    public function getRue()
    {
        return $this->rue;
    }

    /**
     * @param mixed $rue
     */
    public function setRue($rue)
    {
        $this->rue = $rue;
    }

    /**
     * @return mixed
     */
    public function getCp()
    {
        return $this->cp;
    }

    /**
     * @param mixed $cp
     */
    public function setCp($cp)
    {
        $this->cp = $cp;
    }

    /**
     * @return mixed
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * @param mixed $ville
     */
    public function setVille($ville)
    {
        $this->ville = $ville;
    }

}