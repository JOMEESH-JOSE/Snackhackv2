<?php
include 'admin_header.php';
include 'db.php';
$val = $_GET['id'];
$sqltb = mysqli_query($conn, "SELECT * FROM `city` JOIN `district` ON city.d_id = district.id");
$sql_db = mysqli_query($conn, "SELECT * FROM `district`");
$ft = mysqli_query($conn, "SELECT * FROM `food_tb` JOIN category_tb ON food_tb.category_id = category_tb.category_id");
$ca4 = mysqli_query($conn, "SELECT * FROM `category_tb`");
$ca10 = mysqli_query($conn, "SELECT `payment_id`, `id`, `P_Amount`, `P_status`,DATE(`order_time`) as date,TIME(`order_time`) as time FROM `tbl_payment` WHERE P_status='DELIVERED' AND id!='0'");
$cat5=mysqli_query($conn, "SELECT `user_registration_tb`.`name`,`tbl_payment`.`payment_id`, `tbl_payment`.`P_Amount`, `tbl_payment`.`P_status`,DATE(`tbl_payment`.`order_time`) as date,`tbl_payment`.`landmark`,`tbl_payment`.`deliveryboy`,`tbl_payment`.`delivery_status` FROM `tbl_payment` JOIN user_registration_tb on `user_registration_tb`.`login-id` = tbl_payment.Lg_id WHERE P_status='PAID' AND Lg_id!='0'");
$ca11= mysqli_query($conn, "SELECT chef_book.ch_id,chef_book.`event`, chef_book.`peoples`, chef_book.`bookdate`, chef_book.`status`,user_registration_tb.name,chef_reg_tb.name as Na,tbl_event.eventname
FROM chef_book join user_registration_tb on user_registration_tb.`login-id`=chef_book.user_id JOIN chef_reg_tb on chef_reg_tb.Lg_id=chef_book.chef_id JOIN tbl_event on tbl_event.ev_id = chef_book.event");
// $nn = mysqli_query($conn, "SELECT * FROM `");
$rej = mysqli_query($conn, "SELECT * FROM login_tb inner join registraion_tb on registraion_tb.Lg_id = login_tb.Lg_id WHERE login_tb.status = 'Rejected'");
?>
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-th-list"></i> Basic Tables</h1>
     
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item">Tables</li>
      <li class="breadcrumb-item active"><a href="#">Simple Tables</a></li>
    </ul>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <h1>Tables</h1>

        <table>

          <tr>
            <td><label class="control-label">
                <H5>City Table :</H5>
              </label>
            <td><a href="table-basic.php?id=1"><button class="btn btn-primary">View</button></a></td>
          </tr>
          <tr>
            <td> <label class="control-label">
                <H5>District Table :</H5>
              </label>
            <td> <a href="table-basic.php?id=2"><button class="btn btn-primary">View</button></a></td>
          </tr>
          <tr>
            <td> <label class="control-label">
                <H5>Food Table : </H5>
              </label>
            <td><a href="table-basic.php?id=3"><button class="btn btn-primary">View</button></a></td>
          </tr>
          <tr>
            <td> <label class="control-label">
                <H5>Category Table :</H5>
              </label>
            <td><a href="table-basic.php?id=4"><button class="btn btn-primary">View</button></a></td>
          </tr>
          <tr>
            <td> <label class="control-label">
                <H5>Order Table :</H5>
              </label>
            <td><a href="table-basic.php?id=5"><button class="btn btn-primary">View</button></a></td>
          </tr>
          <tr>
            <td> <label class="control-label">
                <H5>Online Order Table :</H5>
              </label>
            <td><a href="table-basic.php?id=5.5"><button class="btn btn-primary">View</button></a></td>
          </tr>
          <tr>
            <td> <label class="control-label">
                <H5>Chef Booking Table :</H5>
              </label>
            <td><a href="table-basic.php?id=6"><button class="btn btn-primary">View</button></a></td>
          </tr>
          <tr>
            <td> <label class="control-label">
                <H5>Rejection Table :</H5>
              </label>
            <td><a href="table-basic.php?id=7"><button class="btn btn-primary">View</button></a></td>
          </tr>
        </table>
        <br><br>

        <?php if ($val == 1) { ?>
          <h3 class="tile-title">City Table</h3>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>City_id</th>
                <th>District_Name</th>
                <th>City Name</th>
              </tr>
            </thead>
            <tbody>
              <?php
              while ($row = mysqli_fetch_array($sqltb)) {
              ?>
                <tr>
                  <td><?php echo $row['id']; ?></td>
                  <td><?php echo $row['d_name']; ?></td>
                  <td><?php echo $row['c_name']; ?></td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
      </div>
    </div>
  <?php } else if ($val == 2) { ?>


    <div class="tile">
      <h3 class="tile-title">District Table</h3>
      <table class="table table-bordered"">
              <thead>
                <tr>
                  <th>District_id</th>
                  <th>Name</th>
                </tr>
              </thead>
              <tbody>
                <?php while ($r1 = mysqli_fetch_array($sql_db)) { ?>
                  <tr>
                  <td><?php echo $r1['id']; ?></td>
                  <td><?php echo $r1['d_name']; ?></td>
                </tr>
               <?php } ?>
              </tbody>
            </table>
          </div>
 <?php } else if ($val == 3) { ?>

  
          <div class=" tile">
        <h3 class="tile-title">Food Table</h3>
        <table class="table table-bordered" align="center">
          <thead>
            <tr>
              <th>Food id</th>
              <th>Food Name</th>
              <th>Description</th>

              <th>Category</th>
              <th>Quantity</th>
              <th>Food price</th>
            </tr>
          </thead>
          <tbody>
            <?php
            while ($f = mysqli_fetch_array($ft)) {
            ?>
              <tr>
                <td><?php echo $f['fd_id']; ?></td>
                <td><?php echo $f['food name']; ?></td>
                <td><?php echo $f['description']; ?></td>
                <td><?php echo $f['category']; ?></td>
                <td><?php echo $f['quantity']; ?></td>
                <td>Rs.<?php echo $f['food_price']; ?></td>
              </tr>
            <?php
            }
            ?>
          </tbody>
        </table>
    </div>

  <?php } else if ($val == 4) { ?>

    <div class="clearfix"></div>

    <div class="tile">
      <h3 class="tile-title">Category Table</h3>
      <table class="table table-sm">
        <thead>
          <tr>

            <th>Category ID</th>
            <th>Category Name</th>
          </tr>
        </thead>
        <tbody>
          <?php
          while ($cc = mysqli_fetch_array($ca4)) { ?>
            <tr>
              <td><?php echo $cc["category_id"]; ?></td>
              <td><?php echo $cc["category"]; ?></td>
            </tr>
          <?php
          }
          ?>
        </tbody>
      </table>
    </div>

  <?php } else if ($val == 5) { ?>

    <div class="tile">
      <h3 class="tile-title">Order Table <a href="Printorder.php" target="_blank"><button type="button" name="order" value="pdf">Print</button></a></h3>
      <table class="table" id="sampleTable">
        <thead>
        <tr>

<th>Order ID</th>
<th>Table No</th>
<th>Food TotalPrice</th>
<th>Order Status</th>
<th>Time</th>
<th>Date</th>

</tr>
        </thead>
        <tbody>
          <?php

          while ($c2 = mysqli_fetch_array($ca10)) { ?>
            <tr>
              <td><?php echo $c2["payment_id"]; ?></td>
              <td><?php echo $c2["id"]; ?></td>
              <td>Rs.<?php echo $c2["P_Amount"]; ?></td>
              <td><?php echo $c2["P_status"]; ?></td>
              <td><?php echo $c2["time"]; ?></td>
              <td><?php echo $c2["date"]; ?></td>
              <td><a href='admin_or_details.php?id=<?php echo $c2["payment_id"]; ?>'><button type="button" class="btn btn-">Details</button></a></td>
            </tr>
          <?php
          }
          ?>
        </tbody>
      </table>
    </div>
    <?php } else if ($val == 5.5) { ?>

<div class="tile">
  <h3 class="tile-title">Order Table </h3>
  <table class="table" id="sampleTable">
    <thead>
    <tr>

<th>Customer</th>
<th>Total Amount</th>
<th>Payment Status</th>
<th>Delivery Boy</th>
<th>Delivery Status</th>
<th>Date</th>

</tr>
    </thead>
    <tbody>
      <?php

      while ($c = mysqli_fetch_array($cat5)) { ?>
        <tr>
          <td><?php echo $c["name"]; ?></td>
          <td>Rs.<?php echo $c["P_Amount"]; ?></td>
          <td><?php echo $c["P_status"]; ?></td>
          <td><?php echo $c["deliveryboy"]; ?></td>
          <td><?php echo $c["delivery_status"]; ?></td>
          <td><?php echo $c["date"]; ?></td>
          <td><a href='admin_or_details2.php?id=<?php echo $c["payment_id"]; ?>'><button type="button" class="btn btn-">Details</button></a></td>
        </tr>
      <?php
      }
      ?>
    </tbody>
  </table>
</div>
    <?php } else if ($val == 6) { ?>

<div class="tile">
  <h3 class="tile-title">ChefBooking Table </h3>
  <table class="table">
    <thead>
      
      <tr>

<th>Booking ID</th>
<th>Customer Name</th>
<th>Chef Name</th>
<th>Booking Date</th>
<th>Event</th>
<th>No.of Peoples</th>

</tr>
    </thead>
    <tbody>
      <?php

      while ($c22 = mysqli_fetch_array($ca11)) { ?>
        <tr>
          <td><?php echo $c22["ch_id"]; ?></td>
          <td><?php echo $c22["name"]; ?></td>
          <td><?php echo $c22["Na"]; ?></td>
          <td><?php echo $c22["bookdate"]; ?></td>
          <td><?php echo $c22["eventname"]; ?></td>
          <td><?php echo $c22["peoples"]; ?></td>
        </tr>
      <?php
      }
      ?>
    </tbody>
  </table>
</div>


  <?php } else if ($val == 7) { ?>
    <div class="clearfix"></div>

    <div class="tile">
      <h3 class="tile-title">Rejection Table</h3>
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>

              <th>Name</th>
              <th>Username</th>
              <th>Password</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <?php
            while ($rr = mysqli_fetch_array($rej)) { ?>
              <tr>
                <td><?php echo $rr["name"]; ?></td>
                <td><?php echo $rr["username"]; ?></td>
                <td><?php echo $rr["password"]; ?></td>
                <td><span class="badge badge-danger"><?php echo $rr["status"]; ?></span></td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

<?php } else { ?>
  <div class="col-md-12">
    <div class="tile">
      <h3 class="tile-title"> You are Not select the Table</h3>
    </div>
  </div>
<?php } ?>
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