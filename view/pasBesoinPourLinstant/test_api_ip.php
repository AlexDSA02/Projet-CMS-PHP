<?php

function get_ip() {
	// IP si internet partagé
	if (isset($_SERVER['HTTP_CLIENT_IP'])) {
		return $_SERVER['HTTP_CLIENT_IP'];
	}
	// IP derrière un proxy
	elseif (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		return $_SERVER['HTTP_X_FORWARDED_FOR'];
	}
	// Sinon : IP normale
	else {
		return (isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '');
	}
}
echo $_SERVER['REMOTE_ADDR'];
echo '</br>testtest';
$ip = $_SERVER['REMOTE_ADDR']; // Recuperation de l'IP du visiteur
$query = @unserialize(file_get_contents('http://api.ipinfodb.com/v3/ip-country/?key=ba66a3225afe970ce8b452e0a5a2358838c87c6e435047c9417aeea2ff7d3dd6&ip='.$ip)); //connection au serveur de ip-api.com et recuperation des données
echo get_ip();
echo '</br>-------';
echo $ip;
echo '</br>//////';
print_r($query) ;
echo '</br>Fin du TEST';


/*if($query && $query['status'] == 'success') 
{
    //code avec les variables
    echo "Bonjour visiteur de " . $query['country'] . "," . $query['city'];
}
else{
	echo 'Requete raté';

}


*/

?>