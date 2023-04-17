<?php 

//definir fuso horário
date_default_timezone_set('America/Sao_Paulo');

//conexão local
$servidor = 'localhost';
$banco = 'biblioteca';
$usuario = 'root';
$senha = '';

try {
	$pdo = new PDO("mysql:dbname=$banco;host=$servidor;charset=utf8", "$usuario", "$senha");
} catch (Exception $e) {
	echo 'Erro ao conectar ao banco de dados! <br>';
	echo $e;
}


//variaveis globais
$nome_sistema = 'Nome Sistema';
$email_sistema = 'contato@hugocursos.com.br';
$telefone_sistema = '(31)97527-5084';
//$cpf_sistema = '11111111111';

$query = $pdo->query("SELECT * from config");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$linhas = @count($res);
if($linhas == 0){
	$pdo->query("INSERT INTO config SET nome = '$nome_sistema', email = '$email_sistema', telefone = '$telefone_sistema', endereco = '$endereco_sistema' logo = 'logo.png', logo_rel = 'logo.jpg', icone = 'icone.png' ");

}else{
	$nome_sistema = $res[0]['nome'];
	$email_sistema = $res[0]['email'];
	$telefone_sistema = $res[0]['telefone'];
	//$ramal_sistema = $res[0]['ramal'];
	$endereco_sistema = $res[0]['endereco'];
	$logo_sistema = $res[0]['logo'];
	$logo_rel = $res[0]['logo_rel'];
	$icone_sistema = $res[0]['icone'];


	//$cpf_sistema = '11111111111';
}

 ?>