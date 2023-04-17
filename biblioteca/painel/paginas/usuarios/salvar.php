<?php 
$tabela = 'usuarios';
require_once("../../../conexao.php");

$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$nivel = $_POST['nivel'];
$endereco = $_POST['endereco'];
//$cpf = $_POST['cpf'];
$senha = '123';
$senha_crip = md5($senha);
$id = $_POST['id'];
//$ativo = $_POST['ativo'];
//$foto = $_POST['foto'];

//$email = $_POST['email'];
//$telefone = $_POST['telefone'];

//validação email

$query = $pdo->query("SELECT * from $tabela where email = '$email'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$id_reg = @$res[0]['id'];
if(@count($res) > 0 and $id != $id_reg){
	echo 'Email já cadastrado!';
	exit();
}

//validação telefone

$query = $pdo->query("SELECT * from $tabela where telefone = '$telefone'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$id_reg = @$res[0]['id'];
if(@count($res) > 0 and $id != $id_reg){
	echo 'Telefone já cadastrado!';
	exit();
}


if ($id == "") {
	// code...

	$query = $pdo->prepare("INSERT INTO $tabela SET nome = :nome, email = :email, senha = '$senha', senha_crip = '$senha_crip', nivel = '$nivel', ativo = 'Sim', foto = 'sem-foto.jpg', telefone = :telefone, data = curDate(), endereco = :endereco ");

}else{
	$query = $pdo->prepare("UPDATE $tabela SET nome = :nome, email = :email, nivel = '$nivel', telefone = :telefone, endereco = :endereco where id = '$id'");
}

$query->bindValue(":nome", "$nome");
$query->bindValue(":email", "$email");
$query->bindValue(":telefone", "$telefone");
$query->bindValue(":endereco", "$endereco");
$query->execute();

echo "Salvo com Sucesso";

 ?>