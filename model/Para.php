<?php
class Para
{

	private $_id_para;
	private $_para;
  private $_localisation;
  private $_id_bloc;
  private $_fonction;


  
   /* public function __construct(array $donnees)
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
  public function __construct($p_id_para, $p_para, $p_localisation, $p_id_bloc, $p_fonction)
  {
    $this->_id_para = $p_id_para;
    $this->_para = $p_para;
    $this->_localisation = $p_localisation;
    $this->_id_bloc = $p_id_bloc;
    $this->_fonction = $p_fonction;

  }

	



 //////////////////////////////////////////SETTER///////////////////////////////////////////////////////////////////////



	public function setId_para($id_para)				{$this->_id_para = $id_para;}

	public function setPara($para)		{$this->_para = $para;}

  public function setLocalisation($localisation)    {$this->_localisation = $localisation;}

  public function setId_bloc($id_bloc)    {$this->_id_bloc = $id_bloc;}

  public function setFonction($fonction)    {$this->_fonction = $fonction;}



	/////////////////////////////////////GETTER/////////////////////////////////////////////////

	public function idPara()			{return $this->_id_para;}
  	
  public function para()		{return $this->_para;}

  public function localisation()    {return $this->_localisation;}

  public function idBloc()    {return $this->_id_bloc;}

  public function fonction()    {return $this->_fonction;}

}
?>