<?php
class AdminManager
{
	
	private $_bdd;

	public function __construct($bdd)
	{
		$this->setDb($bdd);
	}

	public function setDb(PDO $bdd)		{$this->_bdd = $bdd;}




	//retourne OK si la combinaison login/pswrd est bon sinon retourne NOK
	public function verif_admin($login, $password){
		$ok='NOK';
		$q = $this->_bdd->query('SELECT `login` FROM `admin` WHERE `login` = "'.$login.'"  ');
		$q2= $this->_bdd->query('SELECT `password` FROM `admin` WHERE `login` = "'.$login.'" ');
		$donnees = $q->fetch();
		$donnees2= $q2->fetch();
		$donnees=$donnees['login'];
		$donnees2=$donnees2['password'];
		//Verifie que le login existe en verifiant que le login rentré n'est pas vide
		if ($donnees==''){
			echo 'Mauvais login';
		}
		//Login unique dnoc verifie que le pswrd correspond bien au login rentré
		elseif ($donnees2!=$password) {
			echo 'Mauvais password';
		}
		else {
			$ok='OK';
		}
		return $ok;

	}


}


?>