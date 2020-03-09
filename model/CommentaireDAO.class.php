<?php


class CommentaireDAO{
	
	static function getListCommentaire(){
		$ma_connexion = connexion_BDD();
		$resultat = $ma_connexion->query("SELECT * FROM sondage");
		while ($donnees = $resultat->fetch())
		{
			$tousLesCommentaires[] = new Commentaire($donnees["id_sondage"],$donnees["id_eleve"],$donnees["commentaire"]);
		}
			
		return $tousLesCommentaires;
	}


	//retourne le nombre de commentaire en INT 
	static function GetNombreCom()
	{
		$ma_connexion = connexion_BDD();
		$cnbr_com = [];
											//Le select distinct peut etre remplacer par id eleve pour avoir le nombre de commentaire par eleve different
		$q = $ma_connexion->query('SELECT COUNT(DISTINCT `id_sondage`) FROM sondage ');
		$donnees = $q->fetch();
		return $donnees[0];

	}
	
	//Ajoute un commentaire dans la BDD avec les données qui sont dans l'objet rentré en paramétre de la methode
	static function addCom(Commentaire $Com)
	{
		$ma_connexion = connexion_BDD();
		$q = $ma_connexion->prepare('INSERT INTO `sondage`(`commentaire`, `id_eleve`) VALUES (:commentaire, :id_eleve)');

		$q->bindValue(':commentaire', $Com->com());
		$q->bindValue(':id_eleve', $Com->idEleve());
		$q->execute();
	}

	static function deleteCom($num_com)
	{
		$ma_connexion = connexion_BDD();
		$q = $ma_connexion->query('DELETE FROM `sondage` WHERE `id_sondage` = `'.$num_com.'`');

		$q->execute();
	}



}
?>