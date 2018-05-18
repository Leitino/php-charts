<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
    <title></title>
  </head>
  <body>

    <?php




    $graphs = [
      'fatturato' => [
        'type' => 'line',
        'data' => [1000,1322,1123,2301,3288,988,502,2300,5332,2300,1233,2322]
      ],
      'fatturato_by_agent' => [
        'type' => 'pie',
        'data' => [
          'Marco' => 9000,
          'Giuseppe' => 4000,
          'Mattia' => 3200,
          'Alberto' => 2300
        ]
      ]
    ];

  /* $data = [1000,1322,1123,2301,3288,988,502,2300,5332,2300,1233,2322];*/


     ?>
     <?php
     echo json_encode($graphs['fatturato']);
      ?>



     <canvas id="myChart"></canvas>
     <canvas id="myChart2"></canvas>


     <script type="text/javascript">
     <?php include 'php-charts/data.php' ?>
     $(document).ready(function() {
       var primoGrafico = <?php echo json_encode($graphs['fatturato']); ?>;
       var secondoGrafico = <?php echo json_encode($graphs['fatturato_by_agent']); ?>;
       var ctx = document.getElementById('myChart').getContext('2d');
       var chart = new Chart(ctx,{
         type : primoGrafico.type,
         data : {
           labels: ['Gennaio','Febbraio','Marzo','Aprile','Maggio','Giugno','Luglio','Agosto','Settembre','Ottobre','Novembre','Dicembre'],
           datasets: [{
             label: 'andamento mensile vendite',
             backgroundColor: 'rgb(255, 99, 132)',
             borderColor: 'rgb(255, 99, 132)',
             data: primoGrafico.data,
           }],
         },

       })


     })

     </script>

  </body>
</html>
