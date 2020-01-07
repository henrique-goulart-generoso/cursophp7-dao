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
  		$this->setData($results[0]);
      }
  }

  public function getList(){

     $sql = new Sql();
     return $sql->select("SELECT * FROM tb_usuarios ORDER BY deslogin;");
  }

  public function search($Login){
     
     $sql = new Sql();
     return $sql->select("SELECT * FROM tb_usuarios WHERE deslogin LIKE :SEARCH ORDER BY deslogin", array(
       ':SEARCH'=>"%".$Login."%"
     ));
  }

  public function login($Login, $password){

     $sql = new Sql();
  	$results = $sql->select("SELECT * FROM tb_usuarios WHERE deslogin = :LOGIN AND senha = :PASSWORD", array(
       ":LOGIN"=>$Login,
       ":PASSWORD"=>$password
  	));

  	if (count($results) > 0) {
  		$this->setData($results[0]);
      } else {
   
        throw new Exception("Login e/ou senha invalidos");

      }
    
  }

    public function setData($data){

       $this->setIdusuario($data['idusuario']);
        $this->setLogin($data['deslogin']);
        $this->setSenha($data['senha']);
        $this->setCadastro(new DateTime($data['dtcadastro']));

   }

  public function insert(){

    $sql = new Sql();

   $results = $sql->select("CALL sp_usuarios_insert(:LOGIN, :PASSWORD)", array(
          ':LOGIN'=>$this->getLogin(),
          ':PASSWORD'=>$this->getSenha()

   ));

   if (count($results) > 0) {
   	$this->setData($results[0]);
   }

  }

  public function update($Login, $password){
    
    $this->setLogin($Login);
    $this->setSenha($password);

    $sql = new Sql();

    $sql->query("UPDATE tb_usuarios SET deslogin = :LOGIN, senha = :PASSWORD WHERE idusuario= :ID", array(

       ':LOGIN'=>$this->getLogin(),
       ':PASSWORD'=>$this->getSenha(),
       ':ID'=>$this->getIdusuario()

    ));

  }

  public function __construct($Login = "", $password = ""){

       $this->setLogin($Login);
       $this->setSenha($password);

  }

   

  public function __toString(){
   
     return json_encode(array(
       "idusuario"=>$this->getIdusuario(),
       "deslogin"=>$this->getLogin(),
       "senha"=>$this->getSenha(),
       "dtcadastro"=>$this->getCadastro()
     ));
  }

}


?>