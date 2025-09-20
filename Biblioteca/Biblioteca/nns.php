<?php
require_once("conexao/conexao.php");
              while($dat = mysqli_fetch_assoc($result)){
                $dateRetirada = $dat['dataR'];
                $dataAgora = date('Y-m-d');
                $dateEntrega = $dat['dataE'];
                
                $id = $dat['id'];
                if($dataAgora > $dateFinal) {
                  $up = "update `livro` set id=$id,estado='atrasado'";
                  $execUp = $conexao->query($up);
                }
              }
              
              $sql = "SELECT * FROM emprestados WHERE estado='atrasado'";
              $resultAtrasado = $conexao->query($sql);
              $totalAtrasado = mysqli_num_rows($resultAtrasado);

?>
