<?php
include 'man_header.php';
include 'db.php';

// Return current date from the remote server
date_default_timezone_set('Asia/Kolkata');
$date = date('Y-m-d');
//$sq = "SELECT order_tb.table_id,order_tb.foodquantity,`food_tb`.`food name`,DATE(order_tb.Order_time) AS date,TIME( order_tb.Order_time)AS time,tbl_payment.P_Amount FROM `order_tb` JOIN food_tb on food_tb.fd_id=order_tb.food_id join tbl_payment on tbl_payment.payment_id=order_tb.Payment_id WHERE order_tb.status='DELIVERED' AND tbl_payment.P_status='PAID' AND DATE(order_tb.Order_time)='$date'";
$sq = "SELECT `payment_id`, `id`, `P_Amount`, `P_status`, Date(`order_time`) as date,TIME(`order_time`) as time FROM `tbl_payment` WHERE  P_status='DELIVERED' OR P_status='PAID' AND id != '0'";
// $sq1 = "SELECT `payment_id`,`id`, `P_Amount`, `P_status`, Date(`order_time`) as date,TIME(`order_time`) as time, `landmark`, `deliveryboy`, `delivery_status`,user_registration_tb.`name` FROM `tbl_payment` JOIN user_registration_tb on `user_registration_tb`.`login-id`=tbl_payment.Lg_id WHERE  P_status='PAID' AND Date(`order_time`)='$date' AND Lg_id != '0'";
// $q1=mysqli_query($conn,$sq1);
$q2=mysqli_query($conn,$sq);
?>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
          <!-- <p>A free and open source Bootstrap 4 admin template</p> -->
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        </ul>
      </div>
      
      <div class="col-md-9">
          <div class="tile">
            <h3 class="tile-title">Order Table</h3>
            <table class="table table-bordered" id="sampleTable">
  <thead class="table-light">
  <th>Table number</th>
    <th>Order_id</th>
    <th>Date</th>
    <th>Time</th>
    <th>Price</th>
    <th>Status</th>
    <th>Action</th>

  </thead>
  <tbody>
    <?php while($row = mysqli_fetch_array($q2)){?>
      <tr>
      <td><?php echo $row['id']; ?></td>
      <td><?php echo $row['payment_id']; ?></td>
      <td><?php echo $row['date']; ?></td>
      <td><?php echo $row['time']; ?></td>
      <td><?php echo $row['P_Amount']; ?></td>
      <td><span class="badge badge-danger"><?php echo $row['P_status']; ?></span></td>
      <td><a href="detail.php?id=<?php echo $row['payment_id']; ?>"><button class="btn btn-" type="submit">Details</button></a></td>

      </tr>
      <?php } ?>
  </tbody>
</table>
          </div>
      </div>
      <!-- second -->
     
          
          
    </main>
    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
    <script type="text/javascript" src="js/plugins/chart.js"></script>
    <!-- Data table plugin-->
<script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="js/plugins/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
    <!-- Google analytics script-->
    <script type="text/javascript">
      if(document.location.hostname == 'pratikborsadiya.in') {
      	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
      	ga('create', 'UA-72504830-1', 'auto');
      	ga('send', 'pageview');
      }
    </script>
  </body>
</html>