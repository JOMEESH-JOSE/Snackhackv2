<?php
include 'db.php';
include 'chef_header.php';
session_start();
$uid = $_SESSION['UserID'];
?>
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-dashboard"></i> change password</h1>
      <!-- <p>Start a beautiful journey here</p> -->
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="#">Change Password</a></li>
    </ul>
  </div>

  <div class="row">
    <div class="col-md-6" style="border-radius: 10px">
      <div class="tile">
        <div align="center">
          <h1>Change Password</h1>
        </div>


        <center>
          <div style="width:350px;">
            <form method="post" name="myform" enctype="multipart/form-data" onsubmit="return validate()">

              <div class="form-group">
                <label class="control-label"><b>Old Password</b></label>
                <input class="form-control" type="password" name="oldpass" id="fn" required>
                <span id="f1" style="color:red"></span>
              </div>
              <div class="form-group">
                <label class="control-label"><b>New Password</b></label>
                <input type="password" name="newpass" id="file" class="form-control" required>
                <span id="i1" style="color:red"></span>
</div><span id ="i"></span
              <div class="form-group mt-3">
                <input class="btn btn-primary btn-block" type="submit" name="Login" value="SUBMIT">
              </div>
            </form>
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
<!-- Google analytics script-->
<!-- <script type="text/javascript">
      if(document.location.hostname == 'pratikborsadiya.in') {
      	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
      	ga('create', 'UA-72504830-1', 'auto');
      	ga('send', 'pageview');
      }
    </script> -->
    </script>
    <?php 

if(isset($_POST['Login'])){

    $old = $_POST['oldpass'];
    $new = $_POST['newpass'];
   $check= mysqli_query($conn,"SELECT * FROM `login_tb` WHERE password='$old' AND Lg_id='$uid'");
   $rr = mysqli_num_rows($check);
   if($rr == 1){
    $insert = mysqli_query($conn,"UPDATE `login_tb` SET `password`='$new' WHERE Lg_id='$uid'");
    echo "<script>alert('Success')</script>";
    echo "<script>location='chef_dash.php'</script>";
   }
   else{
    echo "<script>alert('failed')</script>";
   }
}

?>
