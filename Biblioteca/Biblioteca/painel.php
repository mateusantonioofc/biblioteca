<?php
require_once("conexao/conexao.php");
date_default_timezone_set('America/Sao_paulo');

$sql1 = "SELECT * FROM livro";
$resultL = $conexao->query($sql1);
$totalL = mysqli_num_rows($resultL);


$sql2 = "SELECT * FROM emprestados";
$resultE = $conexao->query($sql2);
$totalE = mysqli_num_rows($resultE);

$sqlAtrasado = "SELECT * FROM emprestados WHERE estado='atrasado'";
$queryAtrasado = $conexao->query($sqlAtrasado);
$totalAtrasado = mysqli_num_rows($queryAtrasado);
?>
<!DOCTYPE html>
<html lang="pt-br">
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
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
</head>
<style>
/* Google Font Import - Poppins */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

:root{
    /* ===== Colors ===== */
    --body-color: #E4E9F7;
    --sidebar-color: #FFF;
    --primary-color: #695CFE;
    --primary-color-light: #F6F5FF;
    --toggle-color: #DDD;
    --text-color: #707070;

    /* ====== Transition ====== */
    --tran-03: all 0.2s ease;
    --tran-03: all 0.3s ease;
    --tran-04: all 0.3s ease;
    --tran-05: all 0.3s ease;
}

body{
    min-height: 100vh;
    background-color: var(--body-color);
    transition: var(--tran-05);
}

::selection{
    background-color: var(--primary-color);
    color: #fff;
}

body.dark{
    --body-color: #18191a;
    --sidebar-color: #242526;
    --primary-color: #3a3b3c;
    --primary-color-light: #3a3b3c;
    --toggle-color: #fff;
    --text-color: #ccc;
}

/* ===== Sidebar ===== */
 .sidebar{
    position: fixed;
    top: 0;
    left: 0;
    height: 100%;
    width: 250px;
    padding: 10px 14px;
    background: var(--sidebar-color);
    transition: var(--tran-05);
    z-index: 100;  
}
.sidebar.close{
    width: 88px;
}

/* ===== Reusable code - Here ===== */
.sidebar li{
    height: 50px;
    list-style: none;
    display: flex;
    align-items: center;
    margin-top: 10px;
}

.sidebar header .image,
.sidebar .icon{
    min-width: 60px;
    border-radius: 6px;
}

.sidebar .icon{
    min-width: 60px;
    border-radius: 6px;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;
}

.sidebar .text,
.sidebar .icon{
    color: var(--text-color);
    transition: var(--tran-03);
}

.sidebar .text{
    font-size: 17px;
    font-weight: 500;
    white-space: nowrap;
    opacity: 1;
}
.sidebar.close .text{
    opacity: 0;
}
/* =========================== */

.sidebar header{
    position: relative;
}

.sidebar header .image-text{
    display: flex;
    align-items: center;
}
.sidebar header .logo-text{
    display: flex;
    flex-direction: column;
}
header .image-text .name {
    margin-top: 2px;
    font-size: 18px;
    font-weight: 600;
}

header .image-text .profession{
    font-size: 16px;
    margin-top: -2px;
    display: block;
}

.sidebar header .image{
    display: flex;
    align-items: center;
    justify-content: center;
}

.sidebar header .image img{
    width: 40px;
    border-radius: 6px;
}

.sidebar header .toggle{
    position: absolute;
    top: 50%;
    right: -25px;
    transform: translateY(-50%) rotate(180deg);
    height: 25px;
    width: 25px;
    background-color: var(--primary-color);
    color: var(--sidebar-color);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 22px;
    cursor: pointer;
    transition: var(--tran-05);
}

body.dark .sidebar header .toggle{
    color: var(--text-color);
}

.sidebar.close .toggle{
    transform: translateY(-50%) rotate(0deg);
}

.sidebar .menu{
    margin-top: 40px;
}

.sidebar li.search-box{
    border-radius: 6px;
    background-color: var(--primary-color-light);
    cursor: pointer;
    transition: var(--tran-05);
}

.sidebar li.search-box input{
    height: 100%;
    width: 100%;
    outline: none;
    border: none;
    background-color: var(--primary-color-light);
    color: var(--text-color);
    border-radius: 6px;
    font-size: 17px;
    font-weight: 500;
    transition: var(--tran-05);
}
.sidebar li a{
    list-style: none;
    height: 100%;
    background-color: transparent;
    display: flex;
    align-items: center;
    height: 100%;
    width: 100%;
    border-radius: 6px;
    text-decoration: none;
    transition: var(--tran-03);
}

.sidebar li a:hover{
    background-color: var(--primary-color);
}
.sidebar li a:hover .icon,
.sidebar li a:hover .text{
    color: var(--sidebar-color);
}
body.dark .sidebar li a:hover .icon,
body.dark .sidebar li a:hover .text{
    color: var(--text-color);
}

.sidebar .menu-bar{
    height: calc(100% - 55px);
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    overflow-y: scroll;
}
.menu-bar::-webkit-scrollbar{
    display: none;
}
.sidebar .menu-bar .mode{
    border-radius: 6px;
    background-color: var(--primary-color-light);
    position: relative;
    transition: var(--tran-05);
}

.menu-bar .mode .sun-moon{
    height: 50px;
    width: 60px;
}

.mode .sun-moon i{
    position: absolute;
}
.mode .sun-moon i.sun{
    opacity: 0;
}
body.dark .mode .sun-moon i.sun{
    opacity: 1;
}
body.dark .mode .sun-moon i.moon{
    opacity: 0;
}

.menu-bar .bottom-content .toggle-switch{
    position: absolute;
    right: 0;
    height: 100%;
    min-width: 60px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 6px;
    cursor: pointer;
}
.toggle-switch .switch{
    position: relative;
    height: 22px;
    width: 40px;
    border-radius: 25px;
    background-color: var(--toggle-color);
    transition: var(--tran-05);
}

.switch::before{
    content: '';
    position: absolute;
    height: 15px;
    width: 15px;
    border-radius: 50%;
    top: 50%;
    left: 5px;
    transform: translateY(-50%);
    background-color: var(--sidebar-color);
    transition: var(--tran-04);
}

body.dark .switch::before{
    left: 20px;
}

.home{
    position: absolute;
    top: 0;
    top: 0;
    left: 250px;
    height: 100vh;
    width: calc(100% - 250px);
    background-color: var(--body-color);
    transition: var(--tran-05);
}
.home .text{
    font-size: 30px;
    font-weight: 500;
    color: var(--text-color);
    padding: 12px 60px;
}

.sidebar.close ~ .home{
    left: 78px;
    height: 100vh;
    width: calc(100% - 78px);
}
body.dark .home .text{
    color: var(--text-color);
}


button{
    padding: 12px 20px;
    font-size: 20px;
    outline: none;
    border: none;
    background-color: #4070f4;
    color: #fff;
    border-radius: 6px;
    cursor: pointer;
    transition: 0.3s;
}


.container {
  width: 90%;
  margin: 50px auto;
}

.row {
  display: flex;
  flex-direction: row;
  justify-content: space-around;
  flex-flow: wrap;
}

.card {
  width: 20%;
  background: #fff;
  border: 1px solid #ccc;
  margin-bottom: 50px;
  transition: 0.3s;
  border-radius: 6px;
}

.card-header {
  text-align: center;
  padding: 50px 10px;
  background: linear-gradient(to right, #6872E0, #333FC4);
  color: #fff;
}

.card-header2 {
  text-align: center;
  padding: 50px 10px;
  background: linear-gradient(to right, #59F074, #37CB52);
  color: #fff;
}

.card-header3 {
  text-align: center;
  padding: 50px 10px;
  background: linear-gradient(to right, #DD5252, #CF2F2F);
  color: #fff;
}

.card-body {
  padding: 30px 20px;
  text-align: center;
  font-size: 18px;
}

.card-body .btn {
  display: block;
  color: #fff;
  text-align: center;
  background: linear-gradient(to right, #ff416c, #ff4b2b);
  margin-top: 30px;
  text-decoration: none;
  padding: 10px 5px;
}

.card:hover {
  transform: scale(1.05);
  box-shadow: 0 0 40px -10px rgba(0, 0, 0, 0.25);
}

@media screen and (max-width: 1000px) {
  .card {
    width: 40%;
  }
}

@media screen and (max-width: 620px) {
  .container {
    width: 100%;
  }

  .card {
    width: 80%;
  }
}

</style>
  <style> .disclaimer{display: none;} </style>
  <style>img[alt="www.000webhost.com"]{display:none}</style>
<body>
    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                  
                  <img src="img/user.svg" alt="user icon">
                </span>
                
                <div class="text logo-text">
                    <span class="name">Rita</span>
                    <span class="profession">Bibliotecária</span>
                </div>
            </div>

            <i class='bx bx-chevron-right toggle'></i>
        </header>

        <div class="menu-bar">
            <div class="menu">

                <ul class="menu-links">
                    <li class="nav-link">
                        <a href="painel.php">
                            <i class='bx bx-home-alt icon' ></i>
                            <span class="text nav-text">Painel</span>
                        </a>
                    </li>


                    <li class="nav-link">
                        <a href="livros.php">
                            <i class="bx bx-book icon"></i>
                            <span class="text nav-text">Livros cadastrados</span>
                        </a>
                    </li>
                    
                    <li class="nav-link">
                        <a href="cadastrar.php">
                            <i class="bx bx-book-alt icon"></i>
                            <span class="text nav-text">Cadastrar livro</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="emprestar.php">
                            <i class='bx bx-book icon' ></i>
                            <span class="text nav-text">Emprestar livro</span>
                        </a>
                    </li>


                    <li class="nav-link">
                        <a href="emprestados.php">
                            <i class='bx bx-book icon' ></i>
                            <span class="text nav-text">Livros emprestados</span>
                        </a>
                    </li>
                    
                    <li class="nav-link">
                        <a href="estatisticas.php">
                            <i class='bx bx-pie-chart-alt-2 icon' ></i>
                            <span class="text nav-text">Estatísticas</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

    </nav>

    <section class="home">
      
        <div class="text">Biblioteca Luz e Saber</div>
      
        <div class="container">
          
          <div class="row">
            <div class="card">
              <div class="card-header">
                <h1>Livros emprestados</h1>
              </div>
              <div class="card-body">
                <p>
                  Total: <?= $totalE ?>
                </p>
              </div>
            </div>
            
            <div class="card">
              <div class="card-header2">
                <h1>Livros no sistema</h1>
              </div>
              <div class="card-body">
                <p>
                  Total: <?= $totalL ?>
                </p>
              </div>
            </div>
            
            <div class="card">
              <div class="card-header3">
                <h1>Em atraso</h1>
              </div>
              <div class="card-body">
                <p>
                  Total: <?= $totalAtrasado ?>
                </p>
              </div>
            </div>
        </div>
       </div>
       
    </section>
</body>
<script language="javascript">

        const body = document.querySelector('body'),
      sidebar = body.querySelector('nav'),
      toggle = body.querySelector(".toggle"),
      searchBtn = body.querySelector(".search-box"),
      modeSwitch = body.querySelector(".toggle-switch"),
      modeText = body.querySelector(".mode-text");


toggle.addEventListener("click" , () =>{
    sidebar.classList.toggle("close");
})

searchBtn.addEventListener("click" , () =>{
    sidebar.classList.remove("close");
})

modeSwitch.addEventListener("click" , () =>{
    body.classList.toggle("dark");
    
    if(body.classList.contains("dark")){
        modeText.innerText = "Light mode";
    }else{
        modeText.innerText = "Dark mode";
        
    }
});
</script>
</html>
