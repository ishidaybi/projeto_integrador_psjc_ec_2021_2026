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
$cpf_sistema = '11111111111';
 ?>