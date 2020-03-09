<?php
class Eleve
{

	private $_id_eleve;
	private $_mail;
	private $_identifiant;
	private $_annee;



/*public function hydrate(array $donnees)
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
	}
	*/

	public function __construct(array $donnees)
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

	}

	



 //////////////////////////////////////////SETTER///////////////////////////////////////////////////////////////////////



	public function setId_eleve($id_eleve)				{$this->_id_eleve = $id_eleve;}

	public function setIdentifiant($identifiant)		{$this->_identifiant = $identifiant;}

	public function setMail($mail)						{$this->_mail = $mail;}
	
	public function setAnnee($annee)					{$this->_annee = $annee;}



	/////////////////////////////////////GETTER/////////////////////////////////////////////////

	public function idEleve()			{return $this->_id_eleve;}
  	
  public function identifiant()		{return $this->_identifiant;}
   
	public function mail()				{return $this->_mail;}

	public function annee()				{return $this->_annee;}



}
?>