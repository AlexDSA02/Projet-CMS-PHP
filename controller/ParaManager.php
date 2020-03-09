<?php
require_once('C:\wamp64\www\test_bootstrap\controller\bdd.php');	
require_once('C:\wamp64\www\test_bootstrap\model/Para.php');
require_once('C:\wamp64\www\test_bootstrap\model/ParaDAO.class.php');

	////////////////////////////Préparation de la class///////////////////////////////////////////
class ParaManager
{
	/*private $_bdd;

	

	public function __construct($bdd)
	{
		$this->setDb($bdd);
	}*/

	

	public function setDb(PDO $bdd)		{$this->_bdd = $bdd;}

	////////////////////////////Fonctions de la class///////////////////////////////////////////

	//Ajoute un para dans la BDD avec les données qui sont dans l'objet rentré en paramétre de la methode
	public function addPara(Para $Para)
	{
		ParaDAO::addPara($Para);
	}

		public function deletePara($id_bloc, $localisation)
	{
		ParaDAO::deletePara($id_bloc, $localisation);
	}

	public function echoParaTest($num_para)
	{
		ParaDAO::echoPara($num_para);
	}



	public function modifPara($id_bloc , $localisation, $fonction, $para)
	{
		ParaDAO::modifPara($id_bloc , $localisation, $fonction, $para);
	}

	public function plus_grand_id()
	{
		$resultat=ParaDAO::plus_grand_id();
		return $resultat;
	}

	public function plus_grand_id_bloc($localisation)
	{
		$resultat=ParaDAO::plus_grand_id_bloc($localisation);
		return $resultat;
	}

	//Vérifie que le paragraphe existe dans la bdd
	public function returnPara($id_bloc, $localisation, $fonction)
	{
		$resultat=ParaDAO::returnPara($id_bloc, $localisation, $fonction);
		return $resultat;
		
	}
/*
	public function return_texte_partenaire($id_bloc)
	{
		$resultat=ParaDAO::return_texte_partenaire($id_bloc);
		return $resultat;
	}
*/
	public function get_id_para($para, $id_bloc, $localisation)
	{
		$resultat=ParaDAO::get_id_para($para, $id_bloc, $localisation);
		return $resultat;
	}
}

?>