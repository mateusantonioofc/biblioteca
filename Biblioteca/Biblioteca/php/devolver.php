<?php  

if(isset($_GET['id'])){
   require_once ("../conexao/conexao.php");
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
}

	$id = validate($_GET['id']);

  $up = "UPDATE emprestados SET estado = 'devolvido' WHERE id=$id";
  $queryUp = mysqli_query($conexao, $up);
          
	header("Location: ../emprestados.php");
}
