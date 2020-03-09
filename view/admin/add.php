<?php
require_once('../../model/Para.php');
require_once('../../controller/bdd.php');
require_once('../../controller/ParaManager.php');  

include ('headerPage.php');



$localisation=$_GET['localisation'];
$para = new ParaManager();
switch ($localisation) 
            {


              case 'partenaire':
              echo '<a href="add.php?localisation='.$localisation.'">ADD</a>';


                { 
                  	                echo '<form  id="para" novalidgdate method="post">';
					echo '<textarea name="titre" id="titre" rows=10 COLS=60>Titre de l\'image</textarea>';
					

					echo'<a href="#" onclick="window.open("../img/a.jpg", "photo", "height=100, width=200, top=100, left=100, toolbar=no, menubar=yes, location=no, resizable=yes, scrollbars=no, status=no"));>';
 
echo '</br><img src="../img/toto.jpg"height="200"></a>';
					

					echo '</br><textarea name="com_image" id="com_image" rows=3 COLS=100>Commentaire de l\'image</textarea>';
					echo '</br><textarea name="com" id="com" rows=15 COLS=150>Commentaire entier de l\'article</textarea>';
		            echo '<input type="submit" name="paraok">';     
                }
                			if (isset($_POST['paraok']))
               {
               	$nouvel_id_bloc=$para->plus_grand_id_bloc($localisation);
               	$nouvel_id_bloc=$nouvel_id_bloc+1;


	               $nouvel_objet_titre= new Para('',$_POST['titre'],$localisation,$nouvel_id_bloc,'titre');
	               $nouvel_objet_commentaire= new Para('',$_POST['com'],$localisation,$nouvel_id_bloc,'com');

	               $para->addPara($nouvel_objet_titre);
	               $para->addPara($nouvel_objet_commentaire);
	               echo 'OK';
	               header('Location: choix_modif.php');
	           }
              

                  break;



              

              








              




              case 'accueil':
              echo '<a href="add.php?localisation='.$localisation.'">ADD</a>';


                { 
                                    echo '<form  id="para" novalidgdate method="post">';
          echo '<textarea name="titre" id="titre" rows=10 COLS=60>Titre de l\'image</textarea>';
          

          echo'<a href="#" onclick="window.open("../img/a.jpg", "photo", "height=100, width=200, top=100, left=100, toolbar=no, menubar=yes, location=no, resizable=yes, scrollbars=no, status=no"));>';
 
echo '</br><img src="../img/toto.jpg"height="200"></a>';
          

          echo '</br><textarea name="com_image" id="com_image" rows=3 COLS=100>Commentaire de l\'image</textarea>';
          echo '</br><textarea name="com" id="com" rows=15 COLS=150>Commentaire entier de l\'article</textarea>';
                echo '<input type="submit" name="paraok">';     
                }
                      if (isset($_POST['paraok']))
               {
                $nouvel_id_bloc=$para->plus_grand_id_bloc($localisation);
                $nouvel_id_bloc=$nouvel_id_bloc+1;


                 $nouvel_objet_titre= new Para('',$_POST['titre'],$localisation,$nouvel_id_bloc,'titre');
                 $nouvel_objet_commentaire= new Para('',$_POST['com'],$localisation,$nouvel_id_bloc,'com');

                 $para->addPara($nouvel_objet_titre);
                 $para->addPara($nouvel_objet_commentaire);
                 echo 'OK';
                 header('Location: choix_modif.php');
             }
                                break;

/*


              



             



              case 'bde':
                            //On récupere $u qui ici est le plus grand id_bloc de la page $localisation (ici partenaire)
              $u=$para->plus_grand_id_bloc($localisation);
              // La on vas de $u qui est le plus grand des id_bloc à l'id bloc 0 pour parcourir tout les bloc 
              for($u;$u>=0;$u--)
              {
                $titre=$para->returnPara($u, $localisation, 'titre');
                $com_image=$para->returnPara($u, $localisation, 'com_image');
                $image=$para->returnPara($u, $localisation, 'image');
                $com=$para->returnPara($u, $localisation, 'com');
                //$id_titre=$para->get_id_para($titre, $u, $localisation);

                //Fais apparaitre dans un tableau tout les para de la page partenaire
                if (!empty($com))
                { 
                  echo '<table>';
                  echo '<tr><td>'.$titre.'</br>';
                  echo '</br><img src="../img/'.$image.'"height="100"></br>';
                  echo '</br>'.$com_image.'</br>';
                  echo '</br>'.$com.'</td>';
                  echo '<td><a href="modif2.php?id_bloc='.$u.'&amp;localisation='.$localisation.'"><img src="../img/modif.png" width="50px"></a></td>';
                  echo '<td><a href="delete.php?id_bloc='.$u.'&amp;localisation='.$localisation.'"><img src="../img/delete.png" width="50px"></a></td></tr>';
                  echo '</table>';
                  echo '</form>';       
                }
              }
            }*/
}

include('footerPage.php');
            ?>