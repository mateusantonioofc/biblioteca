<?php
$email = $_POST['email'];
$senha = $_POST['senha'];

if($email === "bibliotecaluz@gmail.com" && $senha === "2010123"){
  header("Location: ../painel.php");
}
