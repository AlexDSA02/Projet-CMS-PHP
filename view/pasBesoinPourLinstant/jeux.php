<?php
echo '<form name="jeux"  method="post">';
echo 'nombre de joueur?';
echo '<input name="nbr_joueur" type="text" class="form-control"  id="nbr_joueur">';
echo 'nombre de tours';
echo '<input name="nbr_tour" type="text" class="form-control"  id="nbr_tour">';
echo '<input name="valider" type="submit" class="btn btn-primary" id="sendMessageButton" value ="Valider!">';
echo '</form>';





$ar_banque=0;
$ar_joueur[]=0;
$joueur[]=0;

if (isset($_POST['valider']))
	{
		$nbr_tour=$_POST['nbr_tour'];
		$nbr_joueur=$_POST['nbr_joueur'];


		for ($i=1;$i<=$nbr_tour;$i++)
		{
			
			$banque=(rand(1,14));
			
			for ($j=1;$j<=$nbr_joueur;$j++)
			{
				
				$joueur[$j]=(rand(1,14));
				
				if ($joueur[$j]>$banque)
				{
					
					$ar_banque--;
					//$ar_joueur[$j]=1;
				}
				elseif ($joueur[$j]<$banque) {
					$ar_banque++;
					//$ar_joueur[$j]=2;
				}
			
			}
		
		}
		//print_r($ar_joueur);
		print_r($joueur);
		echo $ar_banque;
		print_r($ar_joueur);
	}

else 

	{
		echo 'Pas valider';

	}

?>