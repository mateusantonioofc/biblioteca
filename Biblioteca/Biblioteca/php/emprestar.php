<?php
require_once("../conexao/conexao.php");
date_default_timezone_set('America/Sao_paulo');


$livro = $_POST['livro'];
$aluno = $_POST['aluno'];
$serie = $_POST['serie'];
$dataR = $_POST['dataR'];
$dataE = $_POST['dataE'];
$informacoes = $_POST['informacoes'];

$conteudoBr = nl2br($informacoes);

$livro = mysqli_real_escape_string($conexao, $livro);
$aluno = mysqli_real_escape_string($conexao, $aluno);
$serie = mysqli_real_escape_string($conexao, $serie);
$dataR = mysqli_real_escape_string($conexao, $dataR);
$dataE = mysqli_real_escape_string($conexao, $dataE);
$informacoes = mysqli_real_escape_string($conexao, $conteudoBr);

$result = 'INSERT INTO emprestados (livro, aluno, serie, dataR, dataE, informacoes, estado) VALUES ("'.$livro.'", "'.$aluno.'", "'.$serie.'", "'.$dataR.'", "'.$dataE.'", "'.$informacoes.'", "ok")';
$resultado = mysqli_query($conexao, $result);

if($resultado){
  header("Location: ../emprestados.php");
}else{
  header("Location: ../emprestados.php");
}
