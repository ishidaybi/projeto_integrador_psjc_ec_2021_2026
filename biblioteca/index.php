<?php 
require_once("conexao.php");
$query = $pdo->query("SELECT * from usuarios");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$linhas = @count($res);
$senha = '123';
$senha_crip = md5($senha);
if($linhas == 0){
	$pdo->query("INSERT INTO usuarios SET nome = '$nome_sistema', email = '$email_sistema', senha = '$senha', senha_crip = '$senha_crip', nivel = 'Admninistrdor', ativo = 'Sim', foto = 'sem-foto.jpg', telefone = '$telefone_sistema', cpf = '$cpf_sistema'");
}

 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Biblioteca</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="shortcut icon" type="imagem/x-icon" href="img/logo.png">
</head>
<body>
	<div class="login">
		<div class="form">
			<img src="img/logo.png" class="imagem">
			<form method="post" action="autenticar.php">
			<div class="registro">
				<input type="email" name="usuario" placeholder="email" required>
				<input type="password" name="senha" placeholder="senha" required>
				<button>Login</button>	
			</div>
		</div>
	</div>
</body>
</html>