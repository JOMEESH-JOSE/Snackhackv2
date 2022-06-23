<?php 
include 'admin_header.php';
include 'db.php';
// $sql = mysqli_query($conn,"SELECT * FROM `registraion_tb` inner join `login_tb` on login_tb.Lg_id = registraion_tb.Lg_id join city on city.id = registraion_tb.city_id join district on district.id = registraion_tb.district_id");
$sq=mysqli_query($conn,"SELECT * FROM login_tb inner join user_registration_tb on `user_registration_tb`.`login-id` = `login_tb`.`Lg_id` where status != 'Rejected'");
?>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i>Customer Tables</h1>
          <p>Table to display analytical data effectively</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Customer Tables</li>
          <li class="breadcrumb-item active"><a href="view_chef.php">Customer Details</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
            <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr>
                     <th>Name</th>
                    <th>UserName</th>
                    <th>Password</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>View</th>
                    <th>Action</th
                    
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  while($row = mysqli_fetch_array($sq))
                  {
                    $email = $row['email'];
                    ?>
                    <tr>
                    <td><?php echo $row['name']; ?></td>  
                    <td><?php echo $row['username']; ?></td>
                    <td><?php echo $row['password']; ?></td>
                    <td><?php echo $row['role']; ?></td>
                    <td><?php echo $row['status']; ?></td>
                    <td><a href="customer_detail.php?lg=<?php echo $row['Lg_id']; ?>"><button type="submit" class="btn btn-primary">View</button></a></td>
                    <td> <?php if ($row['status'] == 'Blocked') { ?>
                            <p><a href="cust_usersts.php?sid=<?php echo $row['Lg_id']; ?>&&sts=1&&eml=<?php echo $email; ?>"><button class="btn btn-primary">Enable</button></a></p>
                        <?php } else { ?>
                            <p><a href="cust_usersts.php?sid=<?php echo $row['Lg_id']; ?>&&sts=2&&eml=<?php echo $email; ?>"><button class="btn btn-primary">Disable</button></a></p>
                        <?php } ?>
                      
                      </td>
                  </tr>
               <?php
                  }
                  ?>
                  
                </tbody>
              </table>
            
            </div>
          </div>
        </div>
      </div>
      <!-- ------------ -->
     <!-- --------------- -->
    </main>
    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
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