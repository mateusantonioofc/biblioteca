<?php
require_once("conexao/conexao.php");

if(!empty($_GET['search']))
    {
        $data = $_GET['search'];
        $sql = "SELECT * FROM emprestados WHERE aluno LIKE '%$data%' or livro LIKE '%$data%' or serie LIKE '%$data%' or dataR LIKE '%$data%' or dataE LIKE '%$data%' or estado LIKE '%$data%'ORDER BY id DESC";
    }
    else
    {
        $sql = "SELECT * FROM emprestados ORDER BY id DESC";
    }
    $result = $conexao->query($sql);

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
<style>
  .box-search{
    text-align: center;
    justify-content: center;
    align-content: center;
    display: flex;
  }
  
  
  .estado-success{
    background-color: #48FF00;
    border-radius: 5px;
    padding: 5px 5px;
    width: 50px;
    text-align: center;
    color: white;
    font-size: 17px;
  }
  
  .estado-atrasado{
    background-color: #FF0000;
    border-radius: 5px;
    padding: 5px 5px;
    width: 50px;
    text-align: center;
    color: white;
    font-size: 17px;
  }
</style>
<body>
  
    <div class="container">
      <a href="painel.php" class="btn btn-primary">Voltar</a>
    </div>

  <img class="img img-thumbnail" src="img/banner2.jpg" alt="Banner">
  <br><br>
          <div class="box-search">
            <input type="search" class="form-control" placeholder="Pesquisar" id="pesquisar">
            <button onclick="searchData()" class="btn btn-primary">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                </svg>
            </button>
          </div>
<br>
<a href="emprestar.php" type="button" class="btn btn-primary">
  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-patch-plus-fill" viewBox="0 0 16 16">
    <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zM8.5 6v1.5H10a.5.5 0 0 1 0 1H8.5V10a.5.5 0 0 1-1 0V8.5H6a.5.5 0 0 1 0-1h1.5V6a.5.5 0 0 1 1 0z"/>
  </svg>
</a>

<br>
<table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Nome do livro</th>
      <th scope="col">Aluno</th>
      <th scope="col">Serie</th>
      <th scope="col">Data de retirada</th>
      <th scope="col">Data de entrega</th>
      <th scope="col">Informações</th>
      <th scope="col">Estado</th>
      <th scope="col">Ações</th>
    </tr>
  </thead>
  <tbody>
    <?php
      while($dat = mysqli_fetch_assoc($result)) :
        
        $dia = date("d");
        $mes = date("m");
        $ano = date("Y");
        $data1 = $ano."-".$mes."-".$dia;
        
        $dataA = new DateTime($data1);
        $data2 = new DateTime($dat['dataE']);
        
        $estado = $dat['estado'];
        $id = $dat['id'];
        if($estado == "ok"){
          if($data2 > $dataA){
          }else{
            $up = "UPDATE emprestados SET estado = 'atrasado' WHERE id=$id";
            $queryUp = mysqli_query($conexao, $up);
          
          }
        }
    ?>
    <tr>
        <th scope="row"><?= $dat['id'] ?></th>
        <td><?= $dat['livro'] ?></td>
        <td><?= $dat['aluno'] ?></td>
        <td><?= $dat['serie'] ?></td>
        <td><?= $dat['dataR'] ?></td>
        <td><?= $dat['dataE'] ?></td>
        <td><?= $dat['informacoes'] ?></td>
        <td><?= $dat['estado'] ?></td>
        <td>
        </td>
        <td><a href="php/devolver.php?id=<?=$dat['id']?>" class="btn btn-success">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-award-fill" viewBox="0 0 16 16">
          <path d="m8 0 1.669.864 1.858.282.842 1.68 1.337 1.32L13.4 6l.306 1.854-1.337 1.32-.842 1.68-1.858.282L8 12l-1.669-.864-1.858-.282-.842-1.68-1.337-1.32L2.6 6l-.306-1.854 1.337-1.32.842-1.68L6.331.864 8 0z"/>
          <path d="M4 11.794V16l4-1 4 1v-4.206l-2.018.306L8 13.126 6.018 12.1 4 11.794z"/>
        </svg>
        </a>
        </td>
    </tr>
    <?php endwhile; ?>
  </tbody>
</table>

<script>
    var search = document.getElementById('pesquisar');

    search.addEventListener("keydown", function(event) {
        if (event.key === "Enter") 
        {
            searchData();
        }
    });

    function searchData()
    {
        window.location = 'emprestados.php?search='+search.value;
    }
</script>
</body>
</html>
