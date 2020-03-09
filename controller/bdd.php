<?php
define("BDD_HOST","localhost");
define("BDD_USER","root");
define("BDD_NAME","sondage");
define("BDD_PASSWORD","");

function connexion_BDD()
{
	try
	{
		$bdd = new PDO('mysql:host='.BDD_HOST.';dbname='.BDD_NAME,BDD_USER,BDD_PASSWORD);
		$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$bdd->query('SET NAMES UTF8');
	} catch (PDOException $e)
	{
		die("Erreur !: ".$e->getMessage());
	}
	
	return $bdd;
}


?>