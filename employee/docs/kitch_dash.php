<?php
include 'header.php';
include 'db.php';

// Return current date from the remote server
date_default_timezone_set('Asia/Kolkata');
$date = date('Y-m-d');

$sq = "SELECT * FROM `order_tb` join `food_tb` on food_tb.fd_id = order_tb.food_id WHERE  order_tb.status ='0' AND order_tb.Payment_status='PAID'";
$sq1="SELECT f.`food name`,o.table_id,o.foodquantity,o.`food total price`,DATE(o.`Order_time`) AS date,TIME(o.`Order_time`)AS time FROM `order_tb` o,food_tb f WHERE status='DELIVERED' AND Payment_status='PAID' AND o.food_id = f.fd_id and DATE(o.Order_time)='$date'";
$q2=mysqli_query($conn,$sq);
$q3=mysqli_query($conn,$sq1);

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
            <table class="table table-bordered">
  <thead class="table-light">
  <th>Table number</th>
    <th>Food Name</th>
    <th>Quantity</th>
    <th>Action</th>
  </thead>
  <tbody>
    <?php while($row = mysqli_fetch_array($q2)){?>
      <tr>
      <td><?php echo $row['table_id']; ?></td>
      <td><?php echo $row['food name']; ?></td>
      <td><?php echo $row['foodquantity']; ?></td>
     <td> <a href="or_status.php?or_id=<?php echo $row['order_id'];?>&& ss=0"><Button type="submit" class="btn btn-primary">DELIVER</Button></a></td>
      </tr>
      <?php } ?>
  </tbody>
</table>
          </div>
      </div>
      <div class="col-md-9">
          <div class="tile">
            <h3 class="tile-title">Order Details</h3>
            <table class="table table-bordered" id="sampleTable">
  <thead class="table-light">
  <th>Table number</th>
    <th>Food Name</th>
    <th>Quantity</th>
    <th>Total price</th>
    <th>Date</th>
    <th>Time</th>
  </thead>
  <tbody>
    <?php while($row1 = mysqli_fetch_array($q3)){?>
      <tr>
      <td><?php echo $row1['table_id']; ?></td>
      <td><?php echo $row1['food name']; ?></td>
      <td><?php echo $row1['foodquantity']; ?></td>
      <td><?php echo $row1['food total price']; ?></td>
      <td><?php echo $row1['date']; ?></td>
      <td><?php echo $row1['time']; ?></td>
      </tr>
      <?php } ?>
  </tbody>
</table>
          </div>
      </div>
          
    </main>
    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
<!-- Data table plugin-->
<script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="js/plugins/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->

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