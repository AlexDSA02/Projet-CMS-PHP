<?php

class ParaDAO{

	static function echoPara($num_para)
	{
		$ma_connexion = connexion_BDD();
		$resultat = $ma_connexion->query('SELECT para FROM paragraphe WHERE id_paragraphe='.$num_para);
		$resultat=$resultat->fetch();
		echo $resultat['para'];
	}


	static function returnPara($id_bloc, $localisation, $fonction)
	{
		$ma_connexion = connexion_BDD();
		$my_query ='SELECT para FROM `paragraphe` WHERE fonction="'.$fonction.'" AND id_bloc='.$id_bloc.' AND localisation="'.$localisation.'"';
		$q =$ma_connexion->query($my_query);
		$result=$q->fetch();
		return $result['para'];
		
	}

	static function addPara(Para $Para)
	{
		$ma_connexion = connexion_BDD();
		$q = $ma_connexion->prepare('INSERT INTO paragraphe(para,localisation,id_bloc,fonction) VALUES(:para, :localisation, :id_bloc, :fonction)');

		$q->bindValue(':para', $Para->para());
		$q->bindValue(':localisation', $Para->localisation());
		$q->bindValue(':id_bloc', $Para->idBloc());
		$q->bindValue(':fonction', $Para->fonction());
		$q->execute();
	}

	static function deletePara($id_bloc, $localisation)
	{
		$ma_connexion = connexion_BDD();
		$my_query='DELETE FROM `paragraphe` WHERE id_bloc='.$id_bloc.' AND localisation="'.$localisation.'"';
		$q = $ma_connexion->query($my_query);
	}

	static function modifPara($id_bloc , $localisation, $fonction, $para)
	{
		
		$ma_connexion = connexion_BDD();
		
		$my_query ='UPDATE paragraphe SET para="'.$para.'" 
		WHERE fonction="'.$fonction.'" AND id_bloc='.$id_bloc.' AND localisation="'.$localisation.'"';
		
		$q= $ma_connexion->query($my_query);
	}



	static function plus_grand_id()
	{
		$ma_connexion = connexion_BDD();
		$q = $ma_connexion->query('SELECT `id_paragraphe` FROM `paragraphe`');
		$test=0;
		while ($result=$q->fetch()) 
		{
			if($result['id_paragraphe']>$test)
			{
				$test=$result['id_paragraphe'];
			}	
		}
		return $test;
	}

	static function plus_grand_id_bloc($localisation)
	{
		$ma_connexion = connexion_BDD();
		$q = $ma_connexion->query('SELECT `id_bloc` FROM `paragraphe` WHERE `localisation`="'.$localisation.'"');
		$test=0;
		while ($result=$q->fetch()) 
		{
			if($result['id_bloc']>$test)
			{
				$test=$result['id_bloc'];
			}	
		}
		return $test;
	}

/*
	static function return_texte_partenaire($id_bloc)
	{
		$ma_connexion = connexion_BDD();
		$i=0;
		$tab[]=0;
		$q = $this->_bdd->query('SELECT * FROM `paragraphe` WHERE `localisation`="partenaire" AND `id_bloc`="'.$id_bloc.'"');
		while ($result=$q->fetch())
		{
			$tab[]=$result;
			$i++;
		}
		return $tab;
	}
*/
	static function get_id_para($para, $id_bloc, $localisation)
	{
		$ma_connexion = connexion_BDD();
		$q = $ma_connexion->query('SELECT id_paragraphe FROM `paragraphe` WHERE `localisation`="'.$localisation.'" AND `id_bloc`="'.$id_bloc.'" AND `para`="'.$para.'"');
		$result=$q->fetch();
		return $result['0'];

	}
}


?>