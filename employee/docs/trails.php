<?php
include 'admin_header.php';
include 'db.php';
$sql="SELECT * FROM `city`";
$sqltb=mysqli_query($conn,$sql);
$sql2="SELECT * FROM `district`";
$sql_db=mysqli_query($conn,$sql2);
?>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Basic Tables</h1>
          <p>Basic bootstrap tables</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active"><a href="#">Simple Tables</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="tile">
            <h3 class="tile-title">City Table</h3>
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>City_id</th>
                  <th>District_id</th>
                  <th>City Name</th>
                </tr>
              </thead>
              <tbody>
              <?php 
              while ($row = mysqli_fetch_array($sqltb))
                {
                ?>
                  <tr>
                  <td><?php echo $row['id'];?></td>
                  <td><?php echo $row['d_id'];?></td>
                  <td><?php echo $row['c_name'];?></td>
                </tr>
               <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="col-md-6">
          <div class="tile">
            <h3 class="tile-title">District Table Table</h3>
            <table class="table table-bordered"">
              <thead>
                <tr>
                  <th>District_id</th>
                  <th>Name</th>
                </tr>
              </thead>
              <tbody>
                <?php while ($r1 = mysqli_fetch_array($sql_db)){?>
                  <tr>
                  <td><?php echo $r1['id']; ?></td>
                  <td><?php echo $r1['d_name']; ?></td>
                </tr>
               <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
       
        <div class="col-md-6">
          <div class="tile">
            <h3 class="tile-title">Food Table</h3>
            <table class="table table-bordered"align="center">
              <thead>
                <tr>
                  <th>Food id</th>
                  <th>Food Name</th>
                  <th>Description</th>
                  <!-- <th>Food image</th> -->
                  <th>Category</th>
                  <th>Quantity</th>
                  <th>Food price</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $ft=mysqli_query($conn,"SELECT * FROM `food_tb`");
                while($f = mysqli_fetch_array($ft)){
                ?>
                <tr>
                  <td><?php echo $f['fd_id'] ;?></td>
                  <td><?php echo $f['food name'] ;?></td> 
                  <td><?php echo $f['description'] ;?></td>
                  <td><?php echo $f['category_id'] ;?></td>
                  <td><?php echo $f['quantity'] ;?></td>
                  <td><?php echo $f['food_price'] ;?></td>
                </tr>
                <?php 
               } 
               ?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-md-6">
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
                <?php $ca3="SELECT * FROM `category_tb`";
                $ca4=mysqli_query($conn,$ca3);
                while ($cc = mysqli_fetch_array($ca4)){?>

                <tr>
                  
                  <td><?php echo $cc["category_id"];?></td>
                  <td><?php echo $cc["category"];?></td>
                </tr>
            <?php 
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="col-md-6">
          <div class="tile">
            <h3 class="tile-title">Order Table</h3>
            <table class="table">
              <thead>
                <tr>
                  
                  <th>Order ID</th>
                  <th>Food ID</th>
                  <th>Food Quantity</th>
                  <th>Food TotalPrice</th>
                  <th>Time</th>
                </tr>
              </thead>
              <tbody>
              <?php $ca7="SELECT * FROM `order_tb`";
                $ca10=mysqli_query($conn,$ca7);
                while ($c2 = mysqli_fetch_array($ca10)){?>
                <tr>
                  <td><?php  echo $c2["order_id"];?></td>
                  <td><?php  echo $c2["food_id"];?></td>
                  <td><?php  echo $c2["foodquantity"];?></td>
                  <td><?php  echo $c2["food total price"];?></td>
                  <td><?php  echo $c2["Order_time"];?></td>
                </tr>
                <?php
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-md-6">
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
                  $rej= mysqli_query($conn,"SELECT * FROM login_tb inner join registraion_tb on registraion_tb.Lg_id = login_tb.Lg_id WHERE login_tb.status = 'Rejected'");
                  while ($rr = mysqli_fetch_array($rej)){?>
                
                  <tr>
                    <td><?php  echo $rr["name"];?></td>
                    <td><?php  echo $rr["username"];?></td>
                    <td><?php  echo $rr["password"];?></td>
                    <td><?php  echo $rr["status"];?></td>
                  </tr>
                 <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
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
<!-- +++++++++++++++++++++++++++++++++++++ -->
<div class="form-group" >
         <label class="control-label" ><b>CATEGORY</label>
         select  class="form-control" name="category" id="cat">
           <option value="select" selected disabled>SELECT</option>
           <?php
            
              $result = mysqli_query($conn,"SELECT * FROM `category_tb`");
              while($row = mysqli_fetch_array($result)) {
              ?>
              <option value="<?php echo $row['category_id'];?>"><?php echo $row["category"];?></option>
              <?php
              }
              ?>
         </select> 
        
       </div>