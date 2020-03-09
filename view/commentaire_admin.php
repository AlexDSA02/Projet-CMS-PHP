<?php
require_once('C:\wamp64\www\test_bootstrap\controller\bdd.php');	
require_once('C:\wamp64\www\test_bootstrap\model/Commentaire.php');
require_once('C:\wamp64\www\test_bootstrap\controller/CommentaireManager.php');
require_once('C:\wamp64\www\test_bootstrap\model/Eleve.php');
require_once('C:\wamp64\www\test_bootstrap\controller/EleveManager.php');
echo '<pre>';
$com = new CommentaireManager();
$eleve = new EleveManager();
$test=$com->GetNombreCom();
echo 'Il y a '.$test.' commentaires';
$test2=$com->getListCommentaire();


//Affiche tout les commentaire contenue dans l:a base de donnés

$i=$test-1;
echo $i;
echo '</br>';
for ($i;$i>=0;$i--)
	{
		$id_eleve=$test2[$i]->IdEleve();
		$nom_eleve=$eleve->get_nom_eleve($id_eleve);
		$commentaire=$test2[$i]->com();
		

		echo $nom_eleve.' à posté le commentaire suivant: '.$commentaire.'</br>';


	}

?>