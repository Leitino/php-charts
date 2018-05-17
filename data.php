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

    $data = [1000,1322,1123,2301,3288,988,502,2300,5332,2300,1233,2322];


     ?>

     <canvas id="myChart"></canvas>

     <script type="text/javascript">
     <?php include 'php-charts/data.php' ?>
     $(document).ready(function() {
       var ctx = document.getElementById('myChart').getContext('2d');
       var chart = new Chart(ctx,{
         type :'line',
         data : {
           labels: ['Gennaio','Febbraio','Marzo','Aprile','Maggio','Giugno','Luglio','Agosto','Settembre','Ottobre','Novembre','Dicembre'],
           datasets: [{
             label: 'Vendite mensili',
             backgroundColor: 'rgb(255, 99, 132)',
             borderColor: 'rgb(255, 99, 132)',
             data: <?php echo json_encode($data); ?>,
           }],
         },

       })


     })

     </script>



  </body>
</html>
