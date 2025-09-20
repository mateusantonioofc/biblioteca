<?php
require_once("conexao/conexao.php");

$sql="SELECT count(aluno) as tcount,aluno from emprestados group by aluno";
$stmt = $conexao->query($sql);

?>
<html>
  <head>
  <style> .disclaimer{display: none;} </style>
  <style>img[alt="www.000webhost.com"]{display:none}</style>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Alunos', 'Livros'],
		  <?php while($val = mysqli_fetch_assoc($stmt)){?>
          ['<?php echo $val['aluno']?>', <?php echo $val['tcount']?>],
      <?php } ?>
        ]);
        var options = {
          title: 'Alunos que mais pegaram livros',
		  is3D: true
        };
        var chart = new google.visualization.PieChart(document.getElementById('piechart2'));
        chart.draw(data, options);
      }
    </script>
    
  </head>
  <body>
    <div id="piechart2" style="width: 900px; height: 500px;"></div>
  </body>
</html>
