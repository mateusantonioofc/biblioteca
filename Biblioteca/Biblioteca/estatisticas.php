<?php
require_once("conexao/conexao.php");

$sql="SELECT count(serie) as tcount,serie from emprestados group by serie";
$stmt = $conexao->query($sql);

$sql2="SELECT count(aluno) as tcount,aluno from emprestados group by aluno";
$quer = $conexao->query($sql2);

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
          ['Turma', 'Livros'],
		  <?php while($val = mysqli_fetch_assoc($stmt)){?>
          ['<?php echo $val['serie']?>', <?php echo $val['tcount']?>],
      <?php } ?>
        ]);
        var options = {
          title: 'Livros emprestados por turma',
		  is3D: true
        };
        var chart = new google.visualization.PieChart(document.getElementById('piechart1'));
        chart.draw(data, options);
      }
    </script>
    
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Alunos", "Livros emprestados", { role: "style" } ],
        
		  <?php while($obj = mysqli_fetch_assoc($quer)){?>
        ["<?php echo $obj['aluno'] ?>", <?php echo $obj['tcount'] ?>, "<?php echo $obj['aluno'] ?>"],
      <?php } ?>
      ]);
      
      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Alunos que mais pegaram livros",
        width: 600,
        height: 400,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);
  }
  </script>
  </head>
  <body>
    <div id="piechart1" style="width: 900px; height: 500px;"></div>
    <br><br>
    <div id="columnchart_values" style="width: 900px; height: 300px;"></div>
  </body>
</html>
