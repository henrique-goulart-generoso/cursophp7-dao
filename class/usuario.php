<?php


class Usuario {

  private $idusuario;
  private $deslogin;
  private $senha;
  private $dtcadastro;

  public function getIdusuario(){

  	return $this->idusuario;
  }

  public function setIdusuario($value){

  	$this->idusuario = $value;
  }

   public function getLogin(){

  	return $this->deslogin;
  }

  public function setLogin($value){

  	$this->deslogin = $value;
  }

   public function getSenha(){

  	return $this->senha;
  }

  public function setSenha($value){

  	$this->senha = $value;
  }

   public function getCadastro(){

  	return $this->dtcadastro;
  }

  public function setCadastro($value){

  	$this->dtcadastro = $value;
  }

  public function loadByid($id){

  	$sql = new Sql();
  	$results = $sql->select("SELECT * FROM tb_usuarios WHERE idusuario = :ID", array(
       ":ID"=>$id
  	));

  	if (count($results) > 0) {
  		$row = $results[0];

        $this->setIdusuario($row['idusuario']);
        $this->setLogin($row['deslogin']);
        $this->setSenha($row['senha']);
        $this->setCadastro(new DateTime($row['dtcadastro']));
      }
  }

  public function __toString(){
   
     return json_encode(array(
       "idusuario"=>$this->getIdusuario(),
       "deslogin"=>$this->getLogin(),
       "senha"=>$this->getSenha(),
       "dtcadastro"=>$this->getCadastro()->format("d/m/y M:i:s")
     ));
  }

}


?>