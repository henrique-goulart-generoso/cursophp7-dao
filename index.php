<?php


require_once("config.php");

//$sql = new Sql();


//$usuarios = $sql->select("SELECT * FROM tb_usuarios");


//echo json_encode(($usuarios))


//Carrega 1 usuario
//$root = new Usuario();

//$root->loadById(3);

//echo $root;

//Carrega uma lista de usuarios

//$lista = Usuario::getList();

//echo json_encode($lista);

//Carrega uma lista de usuarios buscando pelo login
//$search = Usuario::search("jo");

//echo json_encode($search);

//carrega um usuario usando o login e a senha


//$usuario = new Usuario();
//$usuario->login("root", "@#$");



//CRIANDO UM NOVO USUARIO
//$aluno = new Usuario("aluno", "alun0");

//$aluno->insert();

//echo $aluno;

/*ATULIZANDO UM DADO

$usuario = new Usuario();

$usuario->loadById(5);

$usuario->update("professor", "baladementa");

echo $usuario;
*/
$usuario = new Usuario();

$usuario->loadById(4);

$usuario->delete();

echo $usuario;

?>