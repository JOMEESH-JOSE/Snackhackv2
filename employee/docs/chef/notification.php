<?php 

include 'chef_header.php';
include 'db.php';
$ch_id = $_GET['rid'];
$ql=mysqli_query($conn,"SELECT * FROM `chef_book` join user_registration_tb on user_registration_tb.`login-id`= chef_book.user_id WHERE ch_id = $ch_id AND status='NO'");

?>

    <main class="app-content">
      <div class="app-title">
        
        <div>
          <h3><i class="fa fa-th-list"></i> Notifications</h3>
          <div class="card-body">
          <center>
            <div class="card-body">
            <?php while ($mm = mysqli_fetch_array($ql)){ ?>
                <h2>A customer <?php echo $mm['name'];?>, has booked you to cook at his function on <?php echo $mm['bookdate']?>.</h2>
                <?php } ?>
            </div>
            </center>
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
