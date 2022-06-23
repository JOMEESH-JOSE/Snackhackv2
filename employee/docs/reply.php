<?php 
include 'admin_header.php';
include 'db.php';
$id = $_GET['id'];
$eml = $_GET['eml'];
$zz=mysqli_query($conn,"SELECT * FROM `review_tb` WHERE ms_id = $id");
$ri=mysqli_fetch_assoc($zz);

if(isset($_POST['rreply'])){
$reply = $_POST['reply'];
    $re = "INSERT INTO `admin_reply`(`ms_id`, `reply`) VALUES ('$id','$reply')";
    $as = mysqli_query($conn,$re);
    if($as){
      $qq = "UPDATE `review_tb` SET `sts` = 'YES' WHERE `review_tb`.`ms_id` = $id";
      mysqli_query($conn,$qq);
        echo "<script> alert('Your response has been successfully submitted');</script>";
        echo "<script>location='msg.php?eml=$eml'</script>";
    }
}

?>

    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Reply<?php ?> </h1>
          <!-- <p>Table to display analytical data effectively</p> -->
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        
          <li class="breadcrumb-item active"><a href="reply.php">Reply</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
                <form method="post" onsubmit="return validate();">
        <h4>User Feedback</h4>
        <input type="text" class="form-control" value="<?php echo $ri['message'];?>" readonly>
        <br>
        <h4>Your Reply</h4>
        <span id="t" style="color:red"></span>
        <textarea class="form-control" name="reply" id="re" onclick="return cl();"></textarea><br>
       <center> <input type="submit" class="btn btn-primary"  name="rreply" value="Submit"></center>
                </form>
            </div>

          </div>
        </div>
      </div>
      <!--  -->
 
    </main>
    <!-- Essential javascripts for application to work-->
    <script>
	function validate(){

var a = document.getElementById('re').value.trim();


if(a == ""){

document.getElementById("t").innerHTML="**please Fill the feild**";
return false;
}
	}
	function cl(){

document.getElementById("t").innerHTML=" ";
}

</script>
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
