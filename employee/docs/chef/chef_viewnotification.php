<?php
include 'chef_header.php';
session_start();
$uid = $_SESSION['UserID'];
include 'db.php';
$sq2= mysqli_query($conn, "SELECT * FROM `chef_book` join user_registration_tb on user_registration_tb.`login-id`= chef_book.user_id WHERE chef_id='$uid' AND status ='NO'");
$ss = mysqli_query($conn,"SELECT `chef_book`.`peoples`, `chef_book`.`bookdate`, `chef_book`.`time`, `chef_book`.`status`,user_registration_tb.name,user_registration_tb.phno FROM `chef_book` join user_registration_tb on `user_registration_tb`.`login-id` = chef_book.user_id WHERE chef_book.status='YES' and chef_book.chef_id='$uid'");
?>
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-dashboard"></i> Booking View Page</h1>
      <!-- <p>A free and open source Bootstrap 4 admin template</p> -->
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="#">Booking View</a></li>
    </ul>
  </div>
  <div class="col-md-9">
    <div class="tile">
      <h3 class="tile-title">Booking Table</h3>
      <table class="table table-bordered">
        <thead class="table-light">
          <th>Customer Name</th>
          <th>Booking Date</th>
          <th>Action</th>
         

        </thead>
        <tbody>
          <?php while ($row = mysqli_fetch_array($sq2)) { ?>
            <tr>
              <td><?php echo $row['name']; ?></td>
              <td><?php echo $row['bookdate']; ?></td>
              <td><a href="capprove.php?a_id=<?php echo $row['ch_id'];?>&& ss=1"><Button type="submit" class="btn btn-primary">Accept</Button></a>
                 <a href="capprove.php?a_id=<?php echo $row['ch_id'];?>&& ss=2"><Button type="submit" class="btn btn-primary">Reject</Button></a>
                </td>
             

            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
<!-- second -->
  <div class="col-md-9">
    <div class="tile">
      <h3 class="tile-title">Booking Details Table</h3>
      <table class="table table-bordered">
        <thead class="table-light">
          <th>Customer Name</th>
          <th>Contact Number</th>
          <th>Booking Date</th>
          <th>Booking Time</th>
          <th>No of Peoples</th>
         
         

        </thead>
        <tbody>
          <?php while ($row = mysqli_fetch_array($ss)) { ?>
            <tr>
              <td><?php echo $row['name']; ?></td>
              <td><?php echo $row['phno']; ?></td>
              <td><?php echo $row['bookdate']; ?></td>
              <td><?php echo $row['time']; ?></td>
              <td><?php echo $row['peoples']; ?></td>
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

<!-- Google analytics script-->
<script type="text/javascript">
  if (document.location.hostname == 'pratikborsadiya.in') {
    (function(i, s, o, g, r, a, m) {
      i['GoogleAnalyticsObject'] = r;
      i[r] = i[r] || function() {
        (i[r].q = i[r].q || []).push(arguments)
      }, i[r].l = 1 * new Date();
      a = s.createElement(o),
        m = s.getElementsByTagName(o)[0];
      a.async = 1;
      a.src = g;
      m.parentNode.insertBefore(a, m)
    })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
    ga('create', 'UA-72504830-1', 'auto');
    ga('send', 'pageview');
  }
</script>
</body>

</html>