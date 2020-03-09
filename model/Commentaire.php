<?php

class Commentaire
{
  private $_id_sondage;
  private $_id_eleve;
  private $_commentaire;



  /*	public function __construct(array $donnees)
	{
		foreach ($donnees as $key => $value)
  		{
    		// On récupère le nom du setter correspondant à l'attribut.
    		$method = 'set'.ucfirst($key);
        
    		// Si le setter correspondant existe.
    		if (method_exists($this, $method))
    		{
     			 // On appelle le setter.
     			 $this->$method($value);
    		}
  		}

	}*/




	public function __construct($p_id_sondage, $p_id_eleve, $p_commentaire)
	{
		$this->_id_sondage = $p_id_sondage;
		$this->_id_eleve = $p_id_eleve;
		$this->_commentaire = $p_commentaire;

	}

	///////////////////////////////////////////SETTER///////////////////////////////////////////////////////////////////////



	public function setId_Sondage($id_Sondage)			{$this->_id_sondage = $id_Sondage;}
	
	public function setId_Eleve($id_Eleve)			{$this->_id_eleve = $id_Eleve;}
		
	public function setCommentaire($commentaire)			{$this->_commentaire = $commentaire;}


	////////////////////////////////////GETTER///////////////////////////////////////////////////////////////
	public function idSondage()		{return $this->_id_sondage;}
	
	public function idEleve()		{return $this->_id_eleve;}

	public function com()			{return $this->_commentaire;}

}
?>