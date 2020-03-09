<?php

require_once('../model/Para.php');
require_once('../controller/bdd.php');
require_once('../controller/ParaManager.php');

echo '<link href="../css/test.css" rel="stylesheet">';
            

          $bdd=connexion_BDD();
          $para= new ParaManager($bdd);
          $j=$para->plus_grand_id();
          $j_static=$j-5;
          $i=$j;
          $nombre=5;
          $localisation='partenaire';


          if(isset($_POST['afficher_plus']))
          {
            $j_static=$j_static-1;
          }
           echo $j_static;


          if(isset($_POST['afficher_plus']))
          {
            $j_static=$j_static-1;
          }
           echo $j_static;


          for($i;$i>$j_static;$i--)
          {
            //Stock le titre et le com dans deux variable differentes.
            $com=$para->returnPara($j, $localisation);
            $j--;
            $image=$para->returnPara($j, $localisation);
            $j--;
            $com_image=$para->returnPara($j, $localisation);
            $j--;            
            $titre=$para->returnPara($j, $localisation);
            $j--;
             
            //Fais apparaitre dans un tableau tout les para de la page d'accueil 
            echo '<table>';
            if ($titre!='' && $com!='')
            {
              echo '<tr><td>'.$titre.'</br>';
              echo '</br>'.$image.'</br>';
              echo '</br>'.$com_image.'</br>';
              echo '</br>'.$com.'</td>';
              echo '<td><a href="modif2.php?num_para='.($j+1).'"><img src="../img/modif.png" width="50px"></a></td>';
              echo '<td><a href="delete.php?num_para='.($j+1).'"><img src="../img/delete.png" width="50px"></a></td></tr>';           
            }
            //Ce else permet de refair'e un tour dans la boulce d'affichage des com si un com a était supprimé
            elseif ($j_static>=0)
            {
              $j_static=$j_static-1;
            }
            echo '</table>';
            echo '</form>';
          }
            
          echo '<form id="para" novalidgdate method="post">';
          //Bouton pour afficher 5 com en plus
          echo '<input type="submit" name="afficher_plus" value="Afficher plus">';

          echo '<input type="hidden" value="'.($nombre + 6).'" name="nombre" />';
          echo '<a href="add.php">'

            ?>