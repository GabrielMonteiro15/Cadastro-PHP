<?php 

//dados para conectar ao banco de dados
$host = "localhost";
$db = "test";
$user = "root";
$senha = "";

//Fazendo a conexão atraves de uma varivel
$mysqli = new mysqli($host ,$user, $senha, $db);

//Verifica se tem algum erro 
if($mysqli->connect_errno){
    echo "Falha ao conectar (".$mysqli->connect_errno." erro";
}
else{
    echo"Conectado!";
    
}

//RECUPERAR e VERIFICAR SE JÁ EXISTE
$nome = $_GET["nome"];
$nome = mysqli_real_escape_string($mysqli, $nome);
$sql = "SELECT nome  FROM test.pessoas WHERE  nome = '$nome'";
$retorno = mysqli_query($mysqli, $sql);

if(mysqli_num_rows($retorno) >0){
    echo "Nome já cadastrado! <br>";
}
else{
    $nome = $_GET["nome"];
    $senha = $_GET["Senha"];
    $sql = "INSERT INTO test.pessoas(nome,senha) values ('$nome' , '$senha')";
    $resultado = mysqli_query($mysqli, $sql);
    echo "Usuário cadastrado com sucesso!";
}
?>