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

	$sql = "DELETE FROM livro
	        WHERE id=$id";
   $result = mysqli_query($conexao, $sql);
   if ($result) {
   	  header("Location: ../livros.php");
   }else {
	    header("Location: ../livros.php");
   }

}else {
	header("Location: ../livros.php");
}
