<?php
require_once("conexao/conexao.php");

$id = $_GET['id'];

$sql = "SELECT * FROM livros WHERE id=$id";
$exec = $conexao->query($sql);

if(isset($_POST['enviar'])){
    
  $livro = $_POST['livro'];
  $autor = $_POST['autor'];
  $estante = $_POST['estante'];
  $prateleira = $_POST['prateleira'];
  $codigo = $_POST['codigo'];
  $informacoes = $_POST['informacoes'];
  
  $result = "update `livro` set id=$id,livro='$livro',autor='$autor',estante='$estante',prateleira='$prateleira',codigo='$codigo',informacoes='$informacoes' where id=$id";
  $resultado = mysqli_query($conexao, $result);
  
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Biblioteca Luz e Saber</title>
  <meta property="og:title" content="Biblioteca luz">
  <meta property="og:type" content="school">
  <meta property="og:url" content="http://bibliotecaluz.000webhostapp.com">
  <meta property="og:description" content="Sistema de biblioteca da Escola Erefem Professora Inalda Spinelli">
    <script src="js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
</head>
  <style> .disclaimer{display: none;} </style>
  <style>img[alt="www.000webhost.com"]{display:none}</style>
<body>
  
  <div class="container">
    <a href="livros.php" class="btn btn-primary">Voltar</a>
  </div>
<form method="POST">
  <div class="container">
    <br>
    <label for="livro">Nome do livro</label>
    <input class="form-control" name="livro" id="livro" type="text">
    <br>
    <label for="autor">Autor</label>
    <input class="form-control" name="autor" id="autor" type="text">
    <br>
    
    <label for="livro">Estante <span class="lab">(Opcional)</span></label>
    <input class="form-control" name="estante" id="estante" type="number">
    <br>
    
    
    <label for="prateleira">Prateleira <span class="lab">(Opcional)</span></label>
    <input class="form-control" name="prateleira" id="prateleira" type="number">
    
    <br>
    <label for="codigo">Código</label>
    <input class="form-control" name="codigo" id="codigo" type="number">
    <br>
    <label for="informacoes">Informações Adicionais</label>
    <textarea class="form-control" name="informacoes" id="informacoes" type="text"></textarea>
    <br>
    <br>
    <button name="enviar" id="enviar" type="submit">Update</button>
  </div>
</form>

</body>
<style type="text/css" media="all">
  .lab{
    color: #B0BFC4;
  }
</style>
</html>
