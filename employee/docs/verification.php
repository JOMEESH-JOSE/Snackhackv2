<?php
include 'admin_header.php';
include 'db.php';
?>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> action Page</h1>
          <!-- <p>Start a beautiful journey here</p> -->
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#"> Page</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <!-- <div class="tile"> -->
           
          <div class="clearfix"></div>
        <div class="col-md-9">
          <div class="tile">
            <h3 class="tile-title">Action Table</h3>
            <table class="table table-bordered" id="sampleTable">
              <thead>
                <tr>
                  <th>NAME</th>
                  <th>Username</th>
                  <th>Password</th>
                  <th>Proof</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $ver="SELECT * FROM `registraion_tb` join `login_tb` on login_tb.Lg_id = registraion_tb.Lg_id   WHERE `status` ='Notactive'";
                $veri=mysqli_query($conn,$ver);
                while($v=mysqli_fetch_array($veri)){
                $em = $v['email'];
              
                ?>
                <tr>
                  <td><?php echo $v['name'] ?></td>
                  <td><?php echo $v['username'] ?></td>
                  <td><?php echo $v['password'] ?></td>
                  <td><img src="image/<?php echo $v['adhar'] ?>"width=40px height=40px></td>
                  <td><?php echo $v['status'] ?></td>
                 
                  <td>
                 <a href="approve.php?a_id=<?php echo $v['Lg_id'];?>&& ss=1&&em=<?php echo $em; ?>"><Button type="submit" class="btn btn-primary">Accept</Button></a>
                 <a href="approve.php?a_id=<?php echo $v['Lg_id'] ;?>&& ss=2&&em=<?php echo $em; ?>"><Button type="submit" class="btn btn-primary">Reject</Button></a>
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
            <!-- </div>
          </div> -->
        </div>
        <div class="row">
         <div class="col-md-12">
          <!-- <div class="tile"> -->
           
          <div class="clearfix"></div>
         <div class="col-md-9">
          <div class="tile">
            <h3 class="tile-title"> Chef Action Table</h3>
            <table class="table table-bordered" id="sampleTable2">
              <thead>
                <tr>
                  <th>NAME</th>
                  <th>Username</th>
                  <th>Password</th>
                  <th>Proof</th>
                  <th>Experience</th>
                  <th>Status</th>
                  <th colspan="3">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $ver="SELECT * FROM `chef_reg_tb` join `login_tb` on login_tb.Lg_id = chef_reg_tb.Lg_id WHERE `status` ='Notactive'";
                $veri=mysqli_query($conn,$ver);
                while($v=mysqli_fetch_array($veri))
                {
                $em1 = $v['email'];

                ?>
                <tr>
                  <td><?php echo $v['name'] ?></td>
                  <td><?php echo $v['username'] ?></td>
                  <td><?php echo $v['password'] ?></td>
                  <td><img src="image/<?php echo $v['proof'] ?>"width=40px height=40px id="img1" onclick="return enlargeImg();"></td>
                  <td><?php echo $v['experience'] ?></td>
                 
                  <td><?php echo $v['status'] ?></td>
                 
                  <td>
                 <a href="capproved.php?a_id=<?php echo $v['Lg_id'];?>&& ss=1&&em=<?php echo $em1; ?>" ><Button type="submit" class="btn btn-primary">Accept</Button></a>
                 <a href="capproved.php?a_id=<?php echo $v['Lg_id'] ;?>&& ss=2&&em=<?php echo $em1; ?>"><Button type="submit" class="btn btn-primary">Reject</Button></a>
                </td>
                  
                </tr>
                <?php
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>

        <!-- customer -->
                 
          
       
    </main>
    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script>
             img = document.getElementById("img1");
             id=0;
            // Function to set image dimensions

            
            function enlargeImg() {

              if(id == 2){
                img.style.width = "40%";
                img.style.height = "auto";
                img.style.transition = "width 0.5s ease";
                id=1;


               }
               else{
                img.style.width = "100%";
                img.style.height = "auto";
                img.style.transition = "width 0.5s ease";
                id = 2;

               }
               

            }
            
    </script>
    
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="js/plugins/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
    <script type="text/javascript">$('#sampleTable2').DataTable();</script>
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