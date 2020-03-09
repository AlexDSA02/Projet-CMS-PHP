<?php

class EleveDAO{


	static function getListEleves()
	{
		$Eleve=[];
		$ma_connexion = connexion_BDD();
		$q = $ma_connexion->query('SELECT id_eleve, mail, identifiant, annee FROM Eleves ORDER BY mail');


		while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
		{
			$Eleve[] = new Eleves($donnees);
		}
			
		return $Eleve;

	}



	//Ajoute un eleves dans la BDD avec les données qui sont dans l'objet rentré en paramétre de la methode
	static function addEleve(Eleve $Eleve)
	{
		$ma_connexion = connexion_BDD();
		$q = $ma_connexion->prepare('INSERT INTO eleves(mail,annee,identifiant) VALUES(:mail, :annee ,:identifiant)');

		$q->bindValue(':mail', $Eleve->mail());
		$q->bindValue(':identifiant', $Eleve->identifiant());
		$q->bindValue(':annee', $Eleve->annee());
		$q->execute();
	}

	//retourne le nombre d'eleves en INT qui sont en premiere année
	static function GetListElevesAnnee1(){
		$EleveAnnee1 = [];
		
		$ma_connexion = connexion_BDD();
		$q = $ma_connexion->query('SELECT COUNT(DISTINCT `id_eleve`) FROM eleves WHERE `annee`=1');
		$donnees = $q->fetch();
		return $donnees[0];

	}


	//retourne le nombre d'eleves en INT qui sont en deuxieme année
	static function GetListElevesAnnee2()
	{
		$EleveAnnee2 = [];
		
		$ma_connexion = connexion_BDD();
		$q = $ma_connexion->query('SELECT COUNT(DISTINCT `id_eleve`) FROM eleves WHERE `annee`=2');
		$donnees = $q->fetch();
		return $donnees[0];

	}

	//retourne l'ID de l'eleve passer en parametre
	static function get_id_eleve($pseudo)
	{
		
		$ma_connexion = connexion_BDD();
		$q = $ma_connexion->query('SELECT `id_eleve` FROM `eleves` WHERE `identifiant` = "'.$pseudo.'" ');
		$donnees = $q->fetch();
		$donnees=$donnees['id_eleve'];
		return $donnees;

	}

	//retourne l'ID de l'eleve passer en parametre
	static function get_nom_eleve($id)
	{
		
		$ma_connexion = connexion_BDD();
		$q = $ma_connexion->query('SELECT `identifiant` FROM `eleves` WHERE `id_eleve` = "'.$id.'" ');
		$donnees = $q->fetch();
		$donnees=$donnees['identifiant'];
		return $donnees;

	}

}

?>