<?php
class Etudiant{
    private $nom;
    private $prenom;
    private $matricule;
    public $born;

    public function __construct($_nom,$_prenom, $_matricule, $_born){
        $this->setNom($_nom);
        $this->setPrenom($_prenom);
        $this->setMatricule($_matricule);
        $this->setBorn($_born);
    }

    public function getNom(){
        return $this->nom;
    }
    public function setNom($nom){
        if(!is_numeric($nom)){
        $this->nom = $nom;
    }
    else{
        throw new Exception('Erreur');
    }

    }

    public function getPrenom(){
        
        return $this->prenom;
    }
    public function setPrenom($prenom){
        if(!is_numeric($prenom)){
        $this->prenom = $prenom;
    }
    else{
        throw new Exception('erreur');
    }
    }

    public function getMatricule(){
        
        return $this->matricule;
    }
    public function setMatricule($matricule){
        if(preg_match('/^[a-zA-Z0-9ä-ÿÄ-Ÿ\s]*$/',$matricule)){
        $this->matricule = $matricule;
        }
        else{
            throw new Exception('Erreur');
        }
    }

    public function getBorn(){
        return $this->born;
    }
    public function setBorn($born){
        if(preg_match('/^[0-9]{4}-(0[1-9]|1 [0-2])-(0[1-9]|[12][0-9]|3[01])$/', $born)){
        $this->born = $born;
        }
        else{
            throw new Exception('Erreur');
        }
    }

    public function presentation(){
        echo "Bonjour je me nomme $this->prenom $this->nom, né(e) le $this->born je suis apprenant(e) a Simplon ayant comme matricule: $this->matricule <br>";
    }
    public function faireCours(){
        echo  "je fais un cours en poo";
    }
    
    public function faireEvaluation(){
        echo "je suis entrain de faire une evaluation en competence numeriques";
    }
}

interface Iprofesseur{
    public function presentation();
    public function EvaluerEtudiant();
}

class Professeur extends Etudiant implements Iprofesseur {
    public $voiture;
    public $salaire;
    public $specialite;
    
    public function __construct($_nom,$_prenom, $_matricule, $_born, $_voiture, $_salaire, $_specialite ){

        parent::__construct($_nom,$_prenom, $_matricule,$_born);
        $this->voiture = $_voiture;
        $this->salaire = $_salaire;
        $this->specialite = $_specialite;
    }

    public function presentation(){
        echo "Bonjour je me nomme"." " .parent::getPrenom()." ". parent::getNom()." "." né(e) le" .$this->born ." "."je suis professeur a Simplon ayant comme matricule:"." " .parent::getMatricule()." ". "Je conduis un"." ". $this->voiture."je gagne". " ".$this->salaire." "." et je  posséde comme spacialité"." ". $this->specialite. "<br>";
    }
    public function EvaluerEtudiant(){
        echo "Aujourd\'hui on fera une evaluation en compétence numériques";
    }
}

$etudiantDiarra = new Etudiant('Ndiaye', 'Modou', 'SO455mp', '2001-01-25');
$etudiantDiarra->presentation();

$profMbaye = new Professeur('Fagne','Alou','SOP14522M', '1994-04-15' ,'Toyota', 245000, 'Community Manager');
$profMbaye->presentation();


?>