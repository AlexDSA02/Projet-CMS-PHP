<?php

require_once('../../model/Para.php');
require_once('../../controller/bdd.php');
require_once('../../controller/ParaManager.php');

echo '<link href="../../css/test.css" rel="stylesheet">';


include('headerPage.php');            

          $bdd=connexion_BDD();
          $para= new ParaManager;
          //$j=$para->plus_grand_id();
        ///  $i=$j;
          //$nombre=5;
          $localisation=$_GET['localisation'];





             
            


            //Fais apparaitre dans un tableau tout les texte dans chaque localisation différente 
            switch ($localisation) 
            {
              case 'banniere':
                        $u=$para->plus_grand_id_bloc($localisation);

              
                        
              for($u;$u>=0;$u--)
              {
                $titre=$para->returnPara($u, $localisation, 'titre');
                $id_titre=$para->get_id_para($titre, $u, $localisation);
                $image=$para->returnPara($u, $localisation, 'image');
              
                              //Fais apparaitre dans un tableau tout les para de la page partenaire
              if (!empty($titre))
              { 
                echo '<table>';
                echo '<tr><td>'.$titre;
                echo '</br><img src="../../img/'.$image.'"height="100"></br>';
                echo '<td><a href="modif2.php?id_bloc='.$u.'&amp;localisation='.$localisation.'"><img src="../../img/modif.png" width="50px"></a></td>';
                echo '<td><a href="delete.php?id_bloc='.$u.'&amp;localisation='.$localisation.'"><img src="../../img/delete.png" width="50px"></a></td>';               
                echo '</table>';
                echo '</form>';       
              }
            }
            
              break;








              case 'partenaire':
              echo '<a href="add.php?localisation='.$localisation.'">ADD</a>';
              //On récupere $u qui ici est le plus grand id_bloc de la page $localisation (ici partenaire)
              $u=$para->plus_grand_id_bloc($localisation);
              $banniere_image=$para->returnPara('10', $localisation, 'banniere_image');
              $banniere_titre=$para->returnPara('10', $localisation, 'banniere_titre');

              // La on vas de $u qui est le plus grand des id_bloc à l'id bloc 0 pour parcourir tout les bloc 




              for($u;$u>=0;$u--)
              {
                $titre=$para->returnPara($u, $localisation, 'titre');
                $com_image=$para->returnPara($u, $localisation, 'com_image');
                $image=$para->returnPara($u, $localisation, 'image');
                $com=$para->returnPara($u, $localisation, 'com');


                //Fais apparaitre dans un tableau tout les para de la page partenaire
                if (!empty($com))
                { 
                  echo '<table>';
                  echo '<tr><td>'.$titre.'</br>';
                  echo '</br><img src="../../img/'.$image.'"height="100"></br>';
                  echo '</br>'.$com_image.'</br>';
                  echo '</br>'.$com.'</td>';
                  echo '<td><a href="modif2.php?id_bloc='.$u.'&amp;localisation='.$localisation.'"><img src="../../img/modif.png" width="50px"></a></td>';
                  echo '<td><a href="delete.php?id_bloc='.$u.'&amp;localisation='.$localisation.'"><img src="../../img/delete.png" width="50px"></a></td>';
                  echo '</table>';
                  echo '</form>';       
                }
              }
                  break;



              

              








              




              case 'accueil':
              //On récupere $u qui ici est le plus grand id_bloc de la page $localisation (ici partenaire)
              $u=$para->plus_grand_id_bloc($localisation);
              // La on vas de $u qui est le plus grand des id_bloc à l'id bloc 0 pour parcourir tout les bloc 
              for($u;$u>=0;$u--)
              {
                $titre=$para->returnPara($u, $localisation, 'titre');
                $com=$para->returnPara($u, $localisation, 'com');


                //Fais apparaitre dans un tableau tout les para de la page partenaire
                if (!empty($com))
                { 
                  echo '<table>';
                  echo '<tr><td>'.$titre.'</br>';
                  echo '</br>'.$com.'</td>';
                  echo '<td><a href="modif2.php?id_bloc='.$u.'&amp;localisation='.$localisation.'"><img src="../../img/modif.png" width="50px"></a></td>';
                  echo '<td><a href="delete.php?id_bloc='.$u.'&amp;localisation='.$localisation.'"><img src="../../img/delete.png" width="50px"></a></td>';
                  echo '</table>';
                  echo '</form>';       
                }
              }
                  break;




              



             



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
                  echo '</br><img src="../../img/'.$image.'"height="100"></br>';
                  echo '</br>'.$com_image.'</br>';
                  echo '</br>'.$com.'</td>';
                  echo '<td><a href="modif2.php?id_bloc='.$u.'&amp;localisation='.$localisation.'"><img src="../../img/modif.png" width="50px"></a></td>';
                  echo '<td><a href="delete.php?id_bloc='.$u.'&amp;localisation='.$localisation.'"><img src="../../img/delete.png" width="50px"></a></td></tr>';
                  echo '</table>';
                  echo '</form>';       
                }
              }
            }

include('footerPage.php');
            ?>