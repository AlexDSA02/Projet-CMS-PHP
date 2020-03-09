<?php


class ImageDAO{
	
//Cette fonction permet de retourner un tableau d'objet Image
		static function getListImage(){
			$ma_connexion = connexion_BDD();
			$resultat = $ma_connexion->query("SELECT * FROM image");
			while ($donnees = $resultat->fetch())
			{
				$ToutesLesImages[] = new Image($donnees["id_image"],$donnees["nom"],$donnees["extension"]);
			}
			
			return $ToutesLesImages;
		}


		static function plusGrandIdImage()
		{
			$ma_connexion = connexion_BDD();
			$q = $ma_connexion->query('SELECT `id_image` FROM `image`');
			$test=0;
			while ($result=$q->fetch()) 
			{
				if($result['id_image']>$test)
				{
					$test=$result['id_image'];
				}	
			}
			return $test;
		}

			//retourne le nombre de commentaire en INT 
		static function GetNombreImage()
		{
			$ma_connexion = connexion_BDD();
												//Le select distinct peut etre remplacer par id eleve pour avoir le nombre de commentaire par eleve different
			$q = $ma_connexion->query('SELECT COUNT(DISTINCT `id_image`) FROM image ');
			$donnees = $q->fetch();
			return $donnees[0];

		}




}


?>