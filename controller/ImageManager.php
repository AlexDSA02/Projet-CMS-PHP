<?php
require_once('C:\wamp64\www\test_bootstrap\controller\bdd.php');	
require_once('C:\wamp64\www\test_bootstrap\model/Image.php');
require_once('C:\wamp64\www\test_bootstrap\model/ImageDAO.class.php');

	////////////////////////////Préparation de la class///////////////////////////////////////////
class ImageManager
{


//Cette fonction permet de retourner un tableau d'objet Image
		public function getListImage()
		{
			$ToutesLesImages = ImageDAO::getListImage();
			return$ToutesLesImages;
		}

		public function plusGrandIdImage()
		{
			$plusGrandIdImage=ImageDAO::plusGrandIdImage();
			return $plusGrandIdImage;
		}

//Retourne le nombre d'image qu'il y a dans la bdd (pretique pour savoir le nombre d'iteration )
		public function GetNombreImage()
		{
			$donnees = ImageDAO::GetNombreImage();
			return $donnees;
		}

		public function modifImage()
		{
			ImageDAO::modifImage();
		}
}		
?>