<?php


require_once('../model/Eleve.php');
require_once('../model/Commentaire.php');
require_once('../controller/bdd.php');
require_once('../controller/CommentaireManager.php');
require_once('../controller/EleveManager.php');

//Recupere les POST du formulaire
$mail=$_POST [ 'email' ];
$nom=$_POST [ 'pseudo' ];
$annee=$_POST [ 'annee' ];
$commentaire=$_POST [ 'commentaire' ];



//Crée l'objet Eleve qui contient les données rentré dans le formulaire qui mennes à cette page
$eleve_objet = new Eleve([
	'id_eleve'=>'',
	'mail'=>$mail,
	'identifiant'=>$nom,
	'annee'=>$annee,
]);



//Connexion a la base de données
$bdd=connexion_BDD();

//Ajoute l'objet Commentaire dans la BDD
$new_eleve= new EleveManager($bdd);
$new_eleve->addEleve($eleve_objet);

//recupe l'id eleve
$id_eleve=$new_eleve->get_id_eleve($nom);
//$id_eleve=$id_eleve['id_eleve'];


//Crée l'objet Commentaire qui contient les données rentré dans le formulaire qui mennes à cette page
$commentaire_objet = new Commentaire([
	
	'commentaire' => $commentaire,
	'id_eleve' => $id_eleve,
]);


//Ajoute l'objet Commentaire dans la BDD
$new_com= new CommentaireManager($bdd);
$new_com->addCom($commentaire_objet);



?>