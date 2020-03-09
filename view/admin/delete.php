<?php
require_once('../../model/Para.php');
require_once('../../controller/bdd.php');
require_once('../../controller/ParaManager.php');  


echo '<link href="../../css/test.css" rel="stylesheet">';




include('headerPage.php');




			$bdd=connexion_BDD();
			$para= new ParaManager($bdd);
			$id_bloc=$_GET['id_bloc'];
			$localisation=$_GET['localisation'];




switch ($localisation) 
            {
            	case 'banniere':
                //On récupere $u qui ici est le plus grand id_bloc de la page $localisation (ici partenaire)
	  //          $u=$para->plus_grand_id_bloc($localisation);
	            // La on vas de $u qui est le plus grand des id_bloc à l'id bloc 0 pour parcourir tout les bloc 
	            /*for($u;$u>=0;$u--)
	            {*/
	                
	                $titre=$para->returnPara($id_bloc, $localisation, 'titre');
	                $image=$para->returnPara($id_bloc, $localisation, 'image');


	                echo '<form  id="para" novalidgdate method="post">';
					echo $titre;
					echo '</br><img src="../../img/'.$image.'"height="200">';
		            echo '</br><input type="submit" name="btn_delete" value="SUPPRIMER">';
              	
            
            
				if (isset($_POST['btn_delete']))
	               {
		               $para->deletePara($id_bloc, $localisation);
		               echo 'Elemennt supprimé.';
		               header('Location: choix_modif.php');
		           }


break;





				case 'partenaire':
                //On récupere $u qui ici est le plus grand id_bloc de la page $localisation (ici partenaire)
	  //          $u=$para->plus_grand_id_bloc($localisation);
	            // La on vas de $u qui est le plus grand des id_bloc à l'id bloc 0 pour parcourir tout les bloc 
	            /*for($u;$u>=0;$u--)
	            {*/
	                
	            	$titre=$para->returnPara($id_bloc, $localisation, 'titre');
                	$com_image=$para->returnPara($id_bloc, $localisation, 'com_image');
                	$image=$para->returnPara($id_bloc, $localisation, 'image');
                	$com=$para->returnPara($id_bloc, $localisation, 'com');


	                echo '<form  id="para" novalidgdate method="post">';
					echo $titre;
					echo '</br><img src="../../img/'.$image.'"height="200">';
					echo '</br>'.$com_image;
					echo '</br>'.$com;
		            echo '</br><input type="submit" name="btn_delete" value="SUPPRIMER">';
              	
            
            
					if (isset($_POST['btn_delete']))
	               {
		               $para->deletePara($id_bloc, $localisation);
		               echo 'Elemennt supprimé.';
		               header('Location: choix_modif.php');
		           }


				break;










            	case 'bde':
                //On récupere $u qui ici est le plus grand id_bloc de la page $localisation (ici partenaire)
	  //          $u=$para->plus_grand_id_bloc($localisation);
	            // La on vas de $u qui est le plus grand des id_bloc à l'id bloc 0 pour parcourir tout les bloc 
	            /*for($u;$u>=0;$u--)
	            {*/
	                
	                $titre=$para->returnPara($id_bloc, $localisation, 'titre');
	                $image=$para->returnPara($id_bloc, $localisation, 'image');
                	$com=$para->returnPara($id_bloc, $localisation, 'com');
                	$com_image=$para->returnPara($id_bloc, $localisation, 'com_image');


	                echo '<form  id="para" novalidgdate method="post">';
					echo $titre;
					echo '</br><img src="../../img/'.$image.'"height="200">';
					echo '</br>'.$com_image;
					echo '</br>'.$com;
		            echo '</br><input type="submit" name="btn_delete" value="SUPPRIMER">';
              	
            
            
					if (isset($_POST['btn_delete']))
		               {
			               $para->deletePara($id_bloc, $localisation);
			               echo 'Elemennt supprimé.';
			               header('Location: choix_modif.php');
			           }

				break;



				case 'accueil':
                //On récupere $u qui ici est le plus grand id_bloc de la page $localisation (ici partenaire)
	  //          $u=$para->plus_grand_id_bloc($localisation);
	            // La on vas de $u qui est le plus grand des id_bloc à l'id bloc 0 pour parcourir tout les bloc 
	            /*for($u;$u>=0;$u--)
	            {*/
	                
	                $titre=$para->returnPara($id_bloc, $localisation, 'titre');
                	$com=$para->returnPara($id_bloc, $localisation, 'com');


	                echo '<form  id="para" novalidgdate method="post">';
					echo $titre;
					echo '</br>'.$com;
		            echo '</br><input type="submit" name="btn_delete" value="SUPPRIMER">';
              	
            
            
					if (isset($_POST['btn_delete']))
		               {
			               $para->deletePara($id_bloc, $localisation);
			               echo 'Elemennt supprimé.';
			               header('Location: choix_modif.php');
			           }

				break;


}

include ('footerPage.php');
?>