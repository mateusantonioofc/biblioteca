<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Biblioteca Luz e Saber | Emprestar livro</title>
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
    <a href="painel.php" class="btn btn-primary">Voltar</a>
  </div>
  <img class="img img-thumbnail" src="img/benner.jpg" alt="Banner biblioteca">
<form action="php/emprestar.php" method="POST">
  <div class="container">
    <br>
    <label for="livro">Nome do livro</label>
    <input class="form-control" name="livro" id="livro" type="text">
    <br>
    
    <label for="aluno">Aluno</label>
    <input class="form-control" name="aluno" id="aluno" type="text">
    <br>
    
    
    <label for="serie">Série</label>
    
    <select class="form form-control" name="serie" id="serie">
      <option value="6A">6A</option>
      <option value="6B">6B</option>
      <option value="6C">6C</option>
      <option value="7A">7A</option>
      <option value="7B">7B</option>
      <option value="7C">7C</option>
      <option value="8A">8A</option>
      <option value="8B">8B</option>
      <option value="8C">8C</option>
      <option value="9A">9A</option>
      <option value="9B">9B</option>
      <option value="9C">9C</option>
      <option value="1A">1A</option>
      <option value="1B">1B</option>
      <option value="1C">1C</option>
      <option value="2A">2A</option>
      <option value="2B">2B</option>
      <option value="2C">2C</option>
      <option value="3A">3A</option>
      <option value="3B">3B</option>
      <option value="3C">3C</option>
    </select>
    <br>
    <label for="dataR">Data de retirada</label>
    <input class="form-control" name="dataR" id="dataR" type="date">
    <br>
    <label for="dataE">Data de entrega</label>
    <input class="form-control" name="dataE" id="dataE" type="date">
    <br>
    
    <label for="informacoes">Informações Adicionais</label>
    <textarea class="form-control" name="informacoes" id="informacoes" type="text"></textarea>
    <br>
    <br>
    <button type="submit">Cadastrar</button>
  </div>
</form>
</body>
<style type="text/css" media="all">
  .lab{
    color: #B0BFC4;
  }
</style>
</html>
