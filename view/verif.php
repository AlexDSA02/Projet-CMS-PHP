<?php
session_start ();

require_once('../model/Admin.php');
require_once('../controller/bdd.php');
require_once('../controller/AdminManager.php');
		//TEST
		
		// on enregistre les paramètres de notre visiteur comme variables de session ($login et $pwd) (notez bien que l'on utilise pas le $ pour enregistrer ces variables)
		
		//FIN TEST

$login=$_POST [ 'login' ];
$password=$_POST [ 'password' ];

$bdd=connexion_BDD();
$test=new AdminManager($bdd);
$rep=$test->verif_admin($login, $password);
echo $rep;
echo '<a class="nav-link" href="../index.php">Contact</a>';
echo '<a class="nav-link" href="destroy.php">Destroy</a>';
$_SESSION['try'] = $rep;


?>