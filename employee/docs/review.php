<?php 
include 'admin_header.php';
include 'db.php';
$zx=mysqli_query($conn,"SELECT * FROM `review_tb` where Lg_id=0");
$z=mysqli_query($conn,"SELECT * FROM `review_tb` where Lg_id != 0");
 
?>

    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Feedback Table</h1>
          <!-- <p>Table to display analytical data effectively</p> -->
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        
          <li class="breadcrumb-item active"><a href="review.php">Feeback Table</a></li>
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
                    <th>Email</th>
                    <th>Message</th>
                    <th>Time</th>
                    
                  </tr>
                </thead>
                <tbody>
                  <?php while ($r12=mysqli_fetch_array($zx))
                {
                  ?>
                  <tr>
                  <td><?php echo $r12['name']; ?></td>
                  <td><?php echo $r12['email']; ?></td>
                  <td><?php echo $r12['message']; ?></td>
                  <td><?php echo $r12['Time']; ?></td>
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
      <!--  -->
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <center><h1>Registered User Review</h1></center>
              <br>
              <table class="table table-hover table-bordered" id="sampleTable2">
              <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Message</th>
                    <th>Time</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php while ($r12=mysqli_fetch_array($z))
                {
                  ?>
                  <tr>
                  <td><?php echo $r12['name']; ?></td>
                  <td><?php echo $r12['email']; ?></td>
                  <td><?php echo $r12['message']; ?></td>
                  <td><?php echo $r12['Time']; ?></td>

                  <td><?php if ($r12['sts'] == 'NO') { ?>
                    <p><a href="reply.php?id=<?php echo $r12['ms_id']; ?>&&eml=<?php echo $r12['email']; ?>"><button type="button" class="btn btn-primary">Reply</button></a></p>
                    <?php } else { ?>
                    <p>Replyed <img src="image/tik.png" width="20px" height="20px"></p>
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
    <script type="text/javascript">$('#sampleTable2').DataTable();</script>
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
