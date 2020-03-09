<?php
require_once('C:\wamp64\www\test_bootstrap\controller\bdd.php');	
require_once('C:\wamp64\www\test_bootstrap\model/Eleve.php');
require_once('C:\wamp64\www\test_bootstrap\model/EleveDAO.class.php');

	////////////////////////////Préparation de la class///////////////////////////////////////////
class EleveManager
{
	private $_bdd;

	

	/*public function __construct($bdd)
	{
		$this->setDb($bdd);
	}
*/
	

	public function setDb(PDO $bdd)		{$this->_bdd = $bdd;}

	////////////////////////////Fonctions de la class///////////////////////////////////////////



	//retourne un tableau d'ojets 'ELEVES' qui contient tout les eleves de la BDD
	public function getListEleves()
	{
		$resultat=EleveDAO::getListEleves();	
		return $resultat;

	}



	//Ajoute un eleves dans la BDD avec les données qui sont dans l'objet rentré en paramétre de la methode
	public function addEleve(Eleve $Eleve)
	{
		EleveDAO::addEleve( $Eleve);
	}

	//retourne le nombre d'eleves en INT qui sont en premiere année
	public function GetListElevesAnnee1(){

		$resultat = EleveDAO::GetListElevesAnnee1();
		return $resultat[0];

	}


	//retourne le nombre d'eleves en INT qui sont en deuxieme année
	public function GetListElevesAnnee2(){

		$resultat = EleveDAO::GetListElevesAnnee2();
		return $resultat[0];
	}

	//retourne l'ID de l'eleve passer en parametre
	public function get_id_eleve($pseudo){

		$resultat = EleveDAO::get_id_eleve($pseudo);
		return $resultat;

	}

	//retourne l'ID de l'eleve passer en parametre
	public function get_nom_eleve($id){

		$resultat = EleveDAO::get_nom_eleve($id);
		return $resultat;

	}
}
?>