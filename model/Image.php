<?php

class Image
{
  private $_id_image;
  private $_nom;
  private $_extension;



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




	public function __construct($p_id_image, $p_nom, $p_extension)
	{
		$this->_id_image = $p_id_image;
		$this->_nom = $p_nom;
		$this->_extension = $p_extension;

	}

	///////////////////////////////////////////SETTER///////////////////////////////////////////////////////////////////////



	public function setId_Image($id_Image)			{$this->_id_image = $id_Image;}
	
	public function setNom($nom)			{$this->_nom = $nom;}
		
	public function setExtension($extension)			{$this->_extension = $extension;}


	////////////////////////////////////GETTER///////////////////////////////////////////////////////////////
	public function id_Image()		{return $this->_id_image;}
	
	public function nom()		{return $this->_nom;}

	public function extension()			{return $this->_extension;}

}
?>