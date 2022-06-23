<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Main CSS-->
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <!-- Font-icon css-->
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Login</title>
</head>

<body>
  <section class="material-half-bg">
    <div class="cover"></div>
  </section>
  <section class="login-content">
    <div class="logo">
      <h1>SNACK HACK</h1>
    </div>
    <div class="login-box">
      <form class="login-form" name="myform" method="post" onsubmit=" return loginValid();">
        <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>SIGN IN</h3>
        <div class="form-group">
          <label class="control-label">USERNAME</label>
          <input class="form-control" type="text" name="uname" id="un" placeholder="Username" autofocus autocomplete="off" onclick="return loginClear()">
          <span id="usname" style="color:red"></span>

        </div>
        <div class="form-group">
          <label class="control-label">PASSWORD</label>
          <input class="form-control" type="password" name="pswd" id="ps" placeholder="Password" onclick="return loginClear()">
          <span id="password" style="color:red"></span>
        </div>
        <div class="form-group">
          <div class="utility">
            <div class="animated-checkbox">
              <label>
                <p class="semibold-text mb-2"><a href="forgetpassword.php">forget password?</a></p>
              </label>
            </div>
            <p class="semibold-text mb-2"><a href="reg_nav.php" data-toggle="flip">New User?</a></p>

          </div>

        </div>
        <div class="form-group btn-container">
          <!-- <i class="fa fa-sign-in fa-lg fa-fw"></i> -->
          <input type="submit" class="btn btn-primary btn-block" name="submit" value="SIGN IN">
        </div>
      </form>



    </div>
  </section>
  <!-- Essential javascripts for application to work-->
  <script src="js/jquery-3.2.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
  <!-- The javascript plugin to display page loading on top-->
  <script src="js/plugins/pace.min.js"></script>


  <script>
    function loginValid() {
      var a = document.myform.uname.value.trim();
      var b = document.myform.pswd.value.trim();
      if (a == "") {
        document.getElementById("usname").innerHTML = "**Please enter your User Name";
        return false;
      }
      if (b == "") {
        document.getElementById("password").innerHTML = "**Please enter your password";
        return false;
      } else {
        return true;
      }
    }

    function loginClear() {
      document.getElementById("usname").innerHTML = "";
      document.getElementById("password").innerHTML = "";
      return false;
    }
  </script>
  <?php
  include 'db.php';

  if (isset($_POST['submit'])) {
    session_start();
    $uname = $_POST['uname'];
    $password = $_POST['pswd'];

    $sql = mysqli_query($conn, "SELECT * FROM `login_tb` where username='$uname' and  password='$password'");
    while ($row = mysqli_fetch_array($sql)) {
      if ($row['status'] == 'Approved') {


        if ($row['role'] == 0) {
          $_SESSION['UserID'] = $row['Lg_id'];
          header("location: index.php");
        } else if ($row['role'] == 'receptionist') {
          $_SESSION['UserID'] = $row['Lg_id'];
          header("location: man_dash.php");
        } else if ($row['role'] == 'chef') {
          $_SESSION['UserID'] = $row['Lg_id'];
          header("location: ./chef/chef_dash.php");
        } elseif ($row['role'] == 'kitchen boy') {
          $_SESSION['UserID'] = $row['Lg_id'];
          header("location: kitch_dash.php");
        } else {
          echo '<script>alert("invalid credentials");</script>';
          header("location:page-login.php");
        }
      } else {
        echo '<script>alert("your are not allowed to login");</script>';
      }
    }
  }
  ?>
</body>

</html>