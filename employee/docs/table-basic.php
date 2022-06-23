<?php
include 'admin_header.php';
include 'db.php';
$val = $_GET['id'];
$sqltb = mysqli_query($conn, "SELECT * FROM `city` JOIN `district` ON city.d_id = district.id");
$sql_db = mysqli_query($conn, "SELECT * FROM `district`");
$ft = mysqli_query($conn, "SELECT * FROM `food_tb` JOIN category_tb ON food_tb.category_id = category_tb.category_id");
$ca4 = mysqli_query($conn, "SELECT * FROM `category_tb`");
$ca10 = mysqli_query($conn, "SELECT * FROM `order_tb` JOIN food_tb ON order_tb.food_id = food_tb.fd_id");
$ca11= mysqli_query($conn, "SELECT chef_book.*,user_registration_tb.name as uname,chef_reg_tb.* FROM `chef_book`JOIN user_registration_tb on user_registration_tb.`login-id` = chef_book.user_id JOIN chef_reg_tb ON chef_reg_tb.Lg_id=chef_book.chef_id where status='YES'");
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
      <table class="table">
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
    </div>
    <?php } else if ($val == 6) { ?>

<div class="tile">
  <h3 class="tile-title">Order Table </h3>
  <table class="table">
    <thead>
      
      <tr>

<th>Booking ID</th>
<th>Customer Name</th>
<th>Chef Name</th>
<th>Booking Date</th>
</tr>
    </thead>
    <tbody>
      <?php

      while ($c22 = mysqli_fetch_array($ca11)) { ?>
        <tr>
          <td><?php echo $c22["ch_id"]; ?></td>
          <td><?php echo $c22["uname"]; ?></td>
          <td><?php echo $c22["name"]; ?></td>
          <td><?php echo $c22["bookdate"]; ?></td>
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
                <td><?php echo $rr["status"]; ?></td>
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