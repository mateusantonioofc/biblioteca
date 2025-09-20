<?php
require_once("../conexao/conexao.php");

$livro = $_POST['livro'];
$autor = $_POST['autor'];
$estante = $_POST['estante'];
$prateleira = $_POST['prateleira'];
$codigo = $_POST['codigo'];
$informacoes = $_POST['informacoes'];
$categoria = $_POST['categoria'];

$conteudoBr = nl2br($informacoes);

$livro = mysqli_real_escape_string($conexao, $livro);
$autor = mysqli_real_escape_string($conexao, $autor);
$estante = mysqli_real_escape_string($conexao, $estante);
$prateleira = mysqli_real_escape_string($conexao, $prateleira);
$codigo = mysqli_real_escape_string($conexao, $codigo);
$informacoes = mysqli_real_escape_string($conexao, $conteudoBr);
$categoria = mysqli_real_escape_string($conexao, $categoria);

$result = 'INSERT INTO livro (livro, autor, estante, prateleira, codigo, informacoes, categoria) VALUES ("'.$livro.'", "'.$autor.'", "'.$estante.'", "'.$prateleira.'", "'.$codigo.'", "'.$informacoes.'", "'.$categoria.'")';
$resultado = mysqli_query($conexao, $result);

if($resultado){
  header("Location: ../cadastrar.php");
}else{
  header("Location: ../cadastrar.php");
}
