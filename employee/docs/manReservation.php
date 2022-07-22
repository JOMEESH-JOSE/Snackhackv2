<?php
include 'db.php';
include 'man_header.php';
$q2 = mysqli_query($conn,"SELECT `reservation`.`b_date`, `reservation`.`b_time`, `reservation`.`advance`,user_registration_tb.name, `reservation`.`P_status`,tbl_persontype.p_type,tbl_restable.reserve_table FROM `reservation` join tbl_persontype on tbl_persontype.p_id = reservation.type join tbl_restable on tbl_restable.res_id = reservation.Table_no join user_registration_tb on user_registration_tb.`login-id` = reservation.Lg_id WHERE reservation.P_status='Paid'");
?>

    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Reservation</h1>
          <!-- <p>A free and open source Bootstrap 4 admin template</p> -->
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Reservation</a></li>
        </ul>
      </div>
      
      <div class="col-md-9">
          <div class="tile">
            <h3 class="tile-title">Order Table</h3>
            <table class="table table-bordered" id="sampleTable">
  <thead class="table-light">
  <th>Customer Name</th>
    <th>Type</th>
    <th>Table</th>
    <th>Date</th>
    <th>Time</th>
    <th>Amount</th>
    <th>Status</th>

  </thead>
  <tbody>
    <?php while($row = mysqli_fetch_array($q2)){?>
      <tr>
      <td><?php echo $row['name']; ?></td>
      <td><?php echo $row['p_type']; ?></td>
      <td><?php echo $row['reserve_table']; ?></td>
      <td><?php echo $row['b_date']; ?></td>
      <td><?php echo $row['b_time']; ?></td>
      <td><?php echo $row['advance']; ?></td>
      <td><span class="badge badge-danger"><?php echo $row['P_status']; ?></span></td>
      
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