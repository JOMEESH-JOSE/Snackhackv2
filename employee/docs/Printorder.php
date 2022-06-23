
<?php
include 'db.php';
$ca10 = mysqli_query($conn, "SELECT * FROM `order_tb` JOIN food_tb ON order_tb.food_id = food_tb.fd_id");
?>
<html><head></head>
<body align="center">
    <br><br>
<div class="tile">
      <h3 class="tile-title" style="color:red">ORDER DETAILS</h3>
      <table class="table" border="1px" style="background-color:gray" align="center">
        <thead>
          <tr>

            <th>Order ID</th>
            <th>Food Name</th>
            <th>Food Quantity</th>
            <th>Food TotalPrice</th>
            <th>Time</th>
          </tr>
        </thead>
        <tbody>
          <?php

          while ($c2 = mysqli_fetch_array($ca10)) { ?>
            <tr>
              <td><?php echo $c2["order_id"]; ?></td>
              <td><?php echo $c2["food name"]; ?></td>
              <td><?php echo $c2["foodquantity"]; ?></td>
              <td>Rs.<?php echo $c2["food total price"]; ?></td>
              <td><?php echo $c2["Order_time"]; ?></td>
            </tr>
          <?php
          }
          ?>
        </tbody>
      </table>
     <br>
      <button align="center" id="btn" style="width:95px;height:30px;background-color:darkgoldenrod;border-radius:6px" onclick="window.print()">Print</button>

    </div>
<!-- <script type="text/javascript">

const btn = document.getElementById('btn');

btn.addEventListener('click', () => {
  
  btn.style.display = 'none';

  const box = document.getElementById('box');
  box.style.display = 'block';
});

</script> -->
</body></html>