<?php
class Admin
{

  private $_id_admin;
  private $_login;
  private $_password;



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



  public function setId_eleve($id_admin)        {$this->_id_admin = $id_admin;}

  public function setIdentifiant($login)    {$this->_login = $login;}

  public function setMail($password)            {$this->_password = $password;}



  /////////////////////////////////////GETTER/////////////////////////////////////////////////

  public function idAdmin()     {return $this->_id_admin;}
    
  public function login()   {return $this->_login;}
   
  public function password()        {return $this->_password;}



}
?>