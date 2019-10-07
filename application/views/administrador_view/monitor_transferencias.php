
<?php  
    
    foreach ($grafica as $key => $value) {
       $json_1[] = $value->fecha;
       $json_2[] = $value->cantidad;
    }    
 ?>


 
  <div style="float: left; height: 80vh; width: 80vh">
    <canvas id="myChart"></canvas>      
  </div>  
  <div style="float: right; margin-right: 200px">
      <p style="font-family: 'Nunito', sans-serif; font-size: 40px"><strong>Monto Total</strong> Depositos</p>
        <p><?php 
            foreach ($monto_retiro as $key => $value) {
                echo $value->monto;
            }
        ?></p>
      <p style="font-family: 'Nunito', sans-serif; font-size: 40px"><strong>Monto Total</strong> Retiros</p>
        <p>
            <?php 
            foreach ($monto_deposito as $key => $value) {
                echo $value->monto;
            }
        ?>
        </p>
  </div>
    








<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'bar',

    // The data for our dataset
    data: {
        labels: <?php echo json_encode($json_1); ?>,
        datasets: [{
            label: 'Cantidad de transacciones en los últimos días',
            backgroundColor: 'blue',
            borderColor: 'black',
            data: <?php echo json_encode($json_2); ?>
        }]
    },

    // Configuration options go here
    options: {}
});
</script>
