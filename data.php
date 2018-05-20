<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
    <link rel="stylesheet" href="/php-charts/style.css">
    <title></title>
  </head>
  <body>

    <?php

    $graphs = [
      'fatturato' => [
        'type' => 'line',
        'data' => [1000,1322,1123,2301,3288,988,502,2300,5332,2300,1233,2322],
        'access' => 'guest'
      ],
      'fatturato_by_agent' => [
        'type' => 'pie',
        'data' => [
          'Marco' => 9000,
          'Giuseppe' => 4000,
          'Mattia' => 3200,
          'Alberto' => 2300
        ],
        'access' => 'employee'
      ],
      'team_efficiency' => [
        'type' => 'line',
        'data' => [
          'team1' => [1,0.8,0.7,0.5,0.7,0.8,0.9,0.5,0.6,1,0.3,0.9],
          'team2' => [0.3,0.6,0.8,0.3,0.6,0.5,0.8,0.7,0.3,0.5,0.6,1],
          'team3' => [0.2,0.1,0.5,0.1,0.6,0.5,0.4,0.6,0.3,0.4,0.5,0.7],
        ],
        'access' => 'clevel'
      ],
    ];
  $access = $_GET['access'];
  //var_dump($access);

  $data = [1000,1322,1123,2301,3288,988,502,2300,5332,2300,1233,2322];

     ?>
     <?php
     //echo json_encode($graphs['fatturato']);
      ?>


    <div class="grafico">
      <h3>grafico milestone 1</h3>
      <canvas id="myChart"></canvas>
    </div>
    <div class="grafico2">
      <canvas id="myChart1"></canvas>
    </div>
    <div class="grafico2">
      <canvas id="myChart2"></canvas>
    </div>
    <div class="grafico">
      <canvas id="myChart3"></canvas>
    </div>



     <script type="text/javascript">
     <?php include 'php-charts/data.php' ?>
     $(document).ready(function() {

       var access = <?php echo json_encode($_GET['access']); ?>;
       var ctx = document.getElementById('myChart').getContext('2d');
       var chart = new Chart(ctx,{
         type : 'line',
         data : {
           labels: ['Gennaio','Febbraio','Marzo','Aprile','Maggio','Giugno','Luglio','Agosto','Settembre','Ottobre','Novembre','Dicembre'],
           datasets: [{
             label: 'andamento mensile vendite',
             backgroundColor: 'rgb(255, 99, 132)',
             borderColor: 'rgb(255, 99, 132)',
             data: <?php echo(json_encode($data)) ?>,
           }],
         },
       })

       if (access == 'guest') {
         myChart1();
         myChart2();
         myChart3();
       }
       if (access == 'employee') {
         myChart2();
         myChart3();
       }
       if (access == 'clevel') {
         myChart3();
       }

//function//

     function myChart1() {
       var primoGrafico = <?php echo json_encode($graphs['fatturato']); ?>;
       var ctx = document.getElementById('myChart1').getContext('2d');
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
     }

     function myChart2() {
       var secondoGrafico = <?php echo json_encode($graphs['fatturato_by_agent']); ?>;
       var venditori = [];
       var vendite = [];
       <?php foreach ($graphs['fatturato_by_agent']['data'] as $k => $value) {?>
         venditori.push(<?php echo json_encode($k); ?>);
         vendite.push(<?php echo json_encode($value); ?>);
        <?php
       } ?>
       var ctx = document.getElementById('myChart2').getContext('2d');
       var chart = new Chart(ctx,{
         type : secondoGrafico.type,
         data : {
           labels: venditori,
           datasets: [{
             label: 'andamento mensile vendite',
             backgroundColor: ['red', 'green', 'yellow', 'blue'],
             borderColor: 'rgb(0, 0, 0)',
             data: vendite,
           }],
         },
       })
     }

     function myChart3() {
       var terzoGrafico = <?php echo json_encode($graphs['team_efficiency']); ?>;
       var ctx = document.getElementById('myChart3').getContext('2d');
       var chart = new Chart(ctx,{
         type : terzoGrafico.type,
         data : {
           labels: ['Gennaio','Febbraio','Marzo','Aprile','Maggio','Giugno','Luglio','Agosto','Settembre','Ottobre','Novembre','Dicembre'],
           datasets: [{
             label: 'team 1',
             borderColor: 'red',
             data: <?php echo json_encode($graphs['team_efficiency']['data']['team1']) ?>,
           },
           {
             label :'team2',
             borderColor : 'yellow',
             data: <?php echo json_encode($graphs['team_efficiency']['data']['team2']) ?>,
           },
           {
             label : 'team3',
             borderColor : 'blue',
             data : <?php echo json_encode($graphs['team_efficiency']['data']['team3']) ?>,
           }
         ]
         },
       })
     }
    })
     </script>
  </body>
</html>
