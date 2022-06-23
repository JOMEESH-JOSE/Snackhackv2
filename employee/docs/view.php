<?php 
include 'admin_header.php';
include 'db.php';
$lg = $_GET['lg'];
$ww = mysqli_query($conn,"SELECT * FROM `registraion_tb` inner join `login_tb` on login_tb.Lg_id = registraion_tb.Lg_id join city on city.id = registraion_tb.city_id join district on district.id = registraion_tb.district_id Where login_tb.Lg_id ='$lg'");
?>
    
      <main class="app-content">
       
      <div class="col-md-6">
      <div class="app-title">
     
     
   
 
      <div class="tab-pane active" id="user-timeline">
        <div class="timeline-post">
       
            <h1><b>Details</b></h1><br>
            <?php while($row = mysqli_fetch_assoc($ww)) { ?>
              <table>
                <thead>
       <tr><th><B>NAME :</B></th><td><?php echo $row['name']; ?></td></tr>
       <tr><th><B>GENDER :</B></th><td><?php echo $row['gender']; ?></td></tr>
       <tr><th><B>DOB :</B></th><td><?php echo $row['dob']; ?></td></tr>
       <tr><th><B>ADDRESS :</B></th><td><?php echo $row['address']; ?></td></tr>
       <tr><th><B>DISTRICT :</B></th><td><?php echo $row['d_name']; ?></td></tr>
       <tr><th><B>CITY :</B></th><td><?php echo $row['c_name']; ?></td></tr>
       <tr><th><B>PIN :</B></th><td><?php echo $row['pin']; ?></td></tr>
       <tr><th><B>E-MAIL :</B></th><td><?php echo $row['email']; ?></td></tr>
       <tr><th><B>PHNO :</B></th><td><?php echo $row['phno']; ?></td></tr>
       <tr><th><B>USERNAME :</B></th><td><?php echo $row['username']; ?></td></tr>
       <tr><th><B>PASSWORD :</B></th><td><?php echo $row['password']; ?></td></tr>
       <tr><th><B>ROLE :</B></th><td><?php echo $row['role']; ?></td></tr>
                    
       <tr><?php if ($row['status'] == 'Blocked') { ?>
                            <td><a href="userstatus.php?sid=<?php echo $row['Lg_id']; ?>&&sts=1&&eml=<?php echo $row['email']; ?>"><button class="btn btn-primary">Enable</button></a></td>
                        <?php } else { ?>
                            <td><a href="userstatus.php?sid=<?php echo $row['Lg_id']; ?>&&sts=2&&eml=<?php echo $row['email']; ?>"><button class="btn btn-primary">Disable</button></a></td>
                            </tr
                        <?php } ?>
                        <?php } ?>
                </thead>
              </table>
      </div>
      </div>
    </div>
     </div>
                        
      </main>
                      
                 
                
          
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