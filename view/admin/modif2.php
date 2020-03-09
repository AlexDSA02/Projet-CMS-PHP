<?php
require_once('../../model/Para.php');
require_once('../../controller/bdd.php');
require_once('../../controller/ParaManager.php');  


echo '<link href="../../css/test.css" rel="stylesheet">';




include('headerPage.php');


			
			$bdd=connexion_BDD();
			$para= new ParaManager;
			$id_bloc=$_GET['id_bloc'];
			$localisation=$_GET['localisation'];
			/*$num_Titre=$num_Com-1;
			$ancien_Com=$para->returnPara($num_Com);
			$ancien_Titre=$para->returnPara($num_Titre);
			echo '<form  id="para" novalidgdate method="post">';
			echo '<input  class="comm" type="text" name="titre" value="'.$ancien_Titre.'" id="titre" >';
			echo '<input name="com"  value="'.$ancien_Com.'" >';	
            echo '<input type="submit" name="paraok">';*/
                




            switch ($localisation) 
            {
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
					echo '<textarea name="titre" id="titre" rows=10 COLS=60>'.$titre.'</textarea>';


//Si la personne appuis sur l'image alors cela ouvre une fenetre qui le redirige dan s la biblio d'image
					echo '<A HREF="#" onClick="window.open(\'choix_image.php?localisation='.$localisation.'&amp;id_bloc='.$id_bloc.'\',\'plan_site\',\'toolbar=0, location=0, directories=0, status=0, scrollbars=0, resizable=0, copyhistory=0, menuBar=0\');return(false)">';
					

					echo '</br><img src="../../img/'.$image.'"height="200">';
					

					echo '</A>';
//Si la personne appuis sur l'image alors cela ouvre une fenetre qui le redirige dan s la biblio d'image
 
					

					echo '</br><textarea name="com" id="com" rows=15 COLS=150>'.$com.'</textarea>';
		            echo '<input type="submit" name="paraok">';
              	
            
            
			if (isset($_POST['paraok']))
               {
	                
	               $para->modifPara($id_bloc, $localisation, 'titre', $_POST['titre']);
	               $para->modifPara($id_bloc, $localisation, 'com', $_POST['com']);
	               echo 'OK';
	               //echo $num_Com;
	               //echo '//<br>';
	              // echo 'Com : '.$_POST['com'].'<br>Titre : '.$_POST['titre'];
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
	                $image=$para->returnPara($id_bloc, $localisation, 'image');
                	$com=$para->returnPara($id_bloc, $localisation, 'com');
                	$com_image=$para->returnPara($id_bloc, $localisation, 'com_image');


	                echo '<form  id="para" novalidgdate method="post">';
					echo '<textarea name="titre" id="titre" rows=10 COLS=60>'.$titre.'</textarea>';
					

//Si la personne appuis sur l'image alors cela ouvre une fenetre qui le redirige dan s la biblio d'image
					echo '<A HREF="#" onClick="window.open(\'choix_image.php?localisation='.$localisation.'&amp;id_bloc='.$id_bloc.'\',\'plan_site\',\'toolbar=0, location=0, directories=0, status=0, scrollbars=0, resizable=0, copyhistory=0, menuBar=0\');return(false)">';
					

					echo '</br><img src="../../img/'.$image.'"height="200">';
					

					echo '</A>';
//Si la personne appuis sur l'image alors cela ouvre une fenetre qui le redirige dan s la biblio d'image
	




					echo '</br><textarea name="com_image" id="com_image" rows=3 COLS=100>'.$com_image.'</textarea>';
					echo '</br><textarea name="com" id="com" rows=15 COLS=150>'.$com.'</textarea>';
		            echo '<input type="submit" name="paraok">';
              	
            
            
			if (isset($_POST['paraok']))
               {
	                
	               $para->modifPara($id_bloc, $localisation, 'titre', $_POST['titre']);
	               $para->modifPara($id_bloc, $localisation, 'com_image', $_POST['com_image']);
	               $para->modifPara($id_bloc, $localisation, 'com', $_POST['com']);
	               echo 'OK';
	               //echo $num_Com;
	               //echo '//<br>';
	              // echo 'Com : '.$_POST['com'].'<br>Titre : '.$_POST['titre'];
	               header('Location: index.html');
	           }



break;





	           case 'accueil':
                //On récupere $u qui ici est le plus grand id_bloc de la page $localisation (ici partenaire)
	  //          $u=$para->plus_grand_id_bloc($localisation);
	            // La on vas de $u qui est le plus grand des id_bloc à l'id bloc 0 pour parcourir tout les bloc 
	            /*for($u;$u>=0;$u--)
	            {*/
	                
	                $titre=$para->returnPara($id_bloc, 'accueil', 'titre');
                	$com=$para->returnPara($id_bloc, 'accueil'	, 'com');


	                echo '<form  id="para" novalidgdate method="post">';
					echo '<textarea name="titre" id="titre" rows=10 COLS=60>'.$titre.'</textarea>';
					echo '</br><textarea name="com" id="com" rows=15 COLS=150>'.$com.'</textarea>';
		            echo '<input type="submit" name="paraok">';
              	
            
            
			if (isset($_POST['paraok']))
               {
	                
	               $para->modifPara($id_bloc, $localisation, 'titre', $_POST['titre']);
	               $para->modifPara($id_bloc, $localisation, 'com', $_POST['com']);
	               echo 'OK';
	               //echo $num_Com;
	               //echo '//<br>';
	              // echo 'Com : '.$_POST['com'].'<br>Titre : '.$_POST['titre'];
	               header('Location: choix_modif.php');
	           }

break;
}


include ('footerPage.php');
?>
