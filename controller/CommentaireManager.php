<?php
require_once('C:\wamp64\www\test_bootstrap\controller\bdd.php');	
require_once('C:\wamp64\www\test_bootstrap\model/Commentaire.php');
require_once('C:\wamp64\www\test_bootstrap\model/CommentaireDAO.class.php');

class CommentaireManager
{
	
	private $_bdd;
	/*public function __construct($bdd)
	{
		$this->setDb($bdd);
	}*/

	public function setDb(PDO $bdd)		{$this->_bdd = $bdd;}




	//retourne un tableau d'ojets 'Com' qui contient tout les commentaire de la BDD
	public function getListCommentaire()
	{
		$tousLesCommentaires = CommentaireDAO::getListCommentaire();
		return$tousLesCommentaires;
	}

	//retourne le nombre de commentaire en INT 
	public function GetNombreCom()
	{
		$donnees= [];
		$donnees = CommentaireDAO::GetNombreCom();
		return $donnees;

	}
	
	//Apublicjoute un commentaire dans la BDD avec les données qui sont dans l'objet rentré en paramétre de la methode
	public function addCom(Commentaire $Com)
	{

		CommentaireDAO::addCom($Com);
	}

	public function deleteCom($num_com)
	{
		CommentaireDAO::deleteCom($num_com);
	}





}


?>