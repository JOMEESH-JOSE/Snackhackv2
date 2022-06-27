<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Main CSS-->
  <link rel="stylesheet" type="text/css" href="../css/main.css">
  <!-- Font-icon css-->
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Registration</title>

</head>

<body>
  <section class="material-half-bg">
    <div class="cover"></div>
  </section>
  <section class="login-content">
    <div class="logo">
      <h1 style="margin-left:225px;margin-top:55px">SNACK HACK</h1>
    </div>
    <main class="app-content" style="margin-top:10px">
      <div class="app-title">

        <form class="forget-form" name="myform" method="post" onsubmit="return validate()" enctype="multipart/form-data">
          <!-- <div class="reg"  data-toggle="flip"> -->
          <h3 class="login-head" style="margin-top: 25px;"><i class="fa fa-lg fa-fw fa-user"></i>Chef Registration</h3>
          <div style="margin-top: 25px;">
            <div class="form-group">
              <label class="control-label">NAME</label>
              <input class="form-control" type="text" name="name" placeholder="Name" autocomplete="off" onkeydown="return  alphaOnly(event);">
              <!-- //onkeydown="return alphaOnly(event);" -->
            </div>
            <div class="form-check">
              <label class="control-label">GENDER</label><br>

              <input type="radio" class="form-check-input" id="gen" name="gender" value="male" checked> Male <br>
              <input type="radio" class="form-check-input" id="gen" name="gender" value="female"> Female

            </div>
            <div class="form-group">
              <label class="control-label">DOB</label>
              <input class="form-control" type="date" id="dob" name="dob" placeholder="enter DOB">

            </div>
            <div class="form-group">
              <label class="control-label">IMAGE</label>
              <input class="form-control" type="file" name="file" placeholder="enter image" accept="image/png, image/gif, image/jpeg">

            </div>

            <div class="form-group">
              <label class="control-label">ADDRESS</label>
              <input class="form-control" type="textarea" name="address" placeholder="Address" autocomplete="off">

            </div>

            <div class="form-group">
              <label class="control-label">DISTRICT</label>
              <select id="district-dropdown" name="district" class="form-control">
                <option value="">Select district</option>
                <?php
                require_once "db.php";
                $result = mysqli_query($conn, "SELECT * FROM district");
                while ($row = mysqli_fetch_array($result)) {
                ?>
                  <option value="<?php echo $row['id']; ?>"><?php echo $row["d_name"]; ?></option>
                <?php
                }
                ?>
              </select>

            </div>
            <div class="form-group">
              <label class="control-label">CITY</label>
              <select id="city-dropdown" name="city" class="form-control">

              </select>
            </div>
            <div class="form-group">
              <label class="control-label">PIN</label>
              <input class="form-control" type="text" minlength="6" maxlength="6" placeholder="Pin number" name="pin" autocomplete="off" min="0" oninput="this.value = Math.abs(this.value)" onkeypress="return onlyNumberKey(event)">

            </div>
            <div class="form-group">
              <label class="control-label">EMAIL</label>
              <input class="form-control" type="email" name="email" placeholder="Email" autocomplete="off">

            </div>
            <div class="form-group">
              <label class="control-label">PHNO</label>
              <input class="form-control" type="text" placeholder="Phone number" name="phno" maxlength="10" minlength="10" autocomplete="off" min="0" oninput="this.value = Math.abs(this.value)" onkeypress="return onlyNumberKey(event)">

            </div>
            <div class="form-group">
              <label class="control-label">Experience</label>
              <input class="form-control" type="text" placeholder="Experience" name="exp" autocomplete="off" maxlength="2" minlength="2" min="0" oninput="this.value = Math.abs(this.value)" onkeypress="return onlyNumberKey(event)">

            </div>
            <div class="form-group">
              <label class="control-label">Proof</label>
              <input class="form-control" type="file" name="files" placeholder="enter Proof" accept="image/png,image/jpeg">

            </div>
            <div class="form-group">
              <label class="control-label">Expert in</label>
              <input class="form-control" type="text" name="expert" placeholder="enter you are expert in">

            </div>

            <div class="form-group">
              <label class="control-label">USERNAME</label>
              <input class="form-control" type="text" placeholder="User name" name="uname" autocomplete="off">

            </div>
            <div class="form-group">
              <label class="control-label">PASSWORD</label>
              <input class="form-control" type="password" placeholder="Password" name="pswd" autocomplete="off">
            </div>
            <div class="form-group">
              <label class="control-label">CONFIRM PASSWORD</label>
              <input class="form-control" type="password" placeholder="Confirm Password" name="cpswd" autocomplete="off">
            </div>
            <!-- <div class="form-group">
            <label class="control-label">ROLE</label>
            <select id="role" name="role" class="form-control" required>
              <option value="select" selected disabled>select</option> 
              <option value="kitchen boy">KITCHEN BOY</option>
              <option value="receptionist">RECEPTIONIST</option>
              <option value="chef">CHEF</option>
              </select>
          </div> -->
            <!-- <div class="form-group btn-container">
           
          </div> -->
            <div class="form-group mt-3">
              <input type="submit" class="btn btn-primary btn-block" name="btn" value="Sumit">

              <!-- <input type="submit" class="btn btn-primary btn-block" value="REGISTER" > -->
            </div>
          </div>
        </form>
      </div>
    </main>
    <!-- </div> -->

  </section>

  <!-- Essential javascripts for application to work-->
  <script src="js/jquery-3.2.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
  <!-- The javascript plugin to display page loading on top-->
  <script src="js/plugins/pace.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
    function validate() {
      if (document.myform.name.value.trim() == "") {
        alert("Please put your name");
        document.myform.name.focus();
        return false;
      }

      if (document.myform.dob.value == "") {
        alert("Please put your  date of birth as MM/DD/YYYY");
        document.myform.dob.focus();
        return false;
      }
      if (document.myform.file.value == "") {
        alert("Please put your  image");
        document.myform.file.focus();
        return false;
      }
      var img = /(\.jpg|\.png|\.jpeg)$/i; 
      if (!img.test(document.myform.file.value)) {
        alert("please enter valid image");
        return false;

      }
      if (document.myform.address.value.trim() == "") {
        alert("Please put your address");
        document.myform.address.focus();
        return false;
      }

      if (document.myform.district.value.trim() == "" || document.myform.district.value == "select") {
        alert("Please select  your district");
        document.myform.district.focus();
        return false;
      }
      if (document.myform.city.value.trim() == "" || document.myform.city.value == "select") {
        alert("Please select  your city");
        document.myform.city.focus();
        return false;
      }
      if (document.myform.pin.value.trim() == "") {
        alert("Please put your 6 digit pin number");
        document.myform.pin.focus();
        return false;
      }
      var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

      var x = document.myform.email.value;
      var y = document.myform.email.value.trim();
      // var atposition=x.indexOf("@");  
      // var dotposition=x.lastIndexOf(".");
      if (y == "") {
        alert("Please put your email id");
        document.myform.email.focus();
        return false;
      }
      if (!filter.test(y)) {
        alert("please enter valid email like xyz@gmail.com");
        return false;

      }

      // if (atposition<1 || dotposition<atposition+2 || dotposition+2>=x.length)
      //   {  
      //     alert("please enter valid email like xyz@gmail.com");  
      //     return false;  

      //   } 
      if (document.myform.phno.value.trim() == "") {
        alert("Please put your phone number");
        document.myform.phno.focus();
        return false;
      }
      if (document.myform.phno.value.length < 10 || document.myform.phno.value.length > 10) {
        alert("Please put your 10 digit phone number");
        //  document.myform.phno.focus();
        return false;
      }
      if (document.myform.exp.value.trim() == "") {
        alert("Please put experience");
        document.myform.exp.focus();
        return false;

      }
      if (document.myform.exp.value < 1 ) {
        alert("You are not fit for Register this site");
        document.myform.exp.focus();
        return false;

      }

      if (document.myform.files.value == "") {
        alert("Please put your proof");
        document.myform.files.focus();
        return false;
      }
      var img = /(\.jpg|\.png|\.jpeg)$/i; 
      if (!img.test(document.myform.files.value)) {
        alert("please enter valid image");
        return false;

      }
      if (document.myform.expert.value == "") {
        alert("Please put you are Expert in");
        document.myform.expert.focus();
        return false;
      }
      if (document.myform.uname.value.trim() == "") {
        alert("Please put your user name");
        document.myform.uname.focus();
        return false;
      }
      if (document.myform.pswd.value.trim() == "") {
        alert("Please put your password");
        document.myform.pswd.focus();
        return false;
      }
      if (document.myform.cpswd.value.trim() == "") {
        alert("Please put your confirm password");
        document.myform.cpswd.focus();
        return false;
      } else if (document.myform.pswd.value != document.myform.cpswd.value) {
        alert("Please put same password");
        document.myform.cpswd.focus();
        return false;
      }
      //  if (document.myform.role.value.trim() =="" ||document.myform.role.value =="select"  )
      // {
      //  alert("Please select  your role");
      //  document.myform.role.focus();
      //  return false;
      // }
      else {
        return true;
      }
    }
    //not ready
    function alphaOnly(event) {
      var key = event.keyCode;
      return ((key >= 65 && key <= 90) || key == 8);
    }
  </script>
  <script>
    $(function() {
      var dtToday = new Date();

      var month = dtToday.getMonth() + 1;
      var day = dtToday.getDate();
      var year = dtToday.getFullYear();

      if (month < 10)
        month = '0' + month.toString();
      if (day < 10)
        day = '0' + day.toString();

      var maxDate = year + '-' + month + '-' + day;
      $('#dob').attr('max', maxDate);
    });
  </script>
  <script>
    function onlyNumberKey(evt) {

      // Only ASCII character in that range allowed
      var ASCIICode = (evt.which) ? evt.which : evt.keyCode
      if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
        return false;
      return true;
    }
  </script>
  <script>
    $(document).ready(function() {
      $('#district-dropdown').on('change', function() {
        var state_id = this.value;
        $.ajax({
          url: "cities-by-district.php",
          type: "POST",
          data: {
            d_id: state_id //d_id is the foreignkey of city table
          },
          cache: false,
          success: function(result) {
            $("#city-dropdown").html(result);

          }
        });
      });

    });
  </script>
</body>

</html>
<?php

if (isset($_POST['btn'])) {
  $name = $_POST['name'];
  $gender = $_POST['gender'];
  $dob = $_POST['dob'];

  $image = basename($_FILES["file"]["name"]);
  $targetDir = "image/";
  $targetFilePath = $targetDir . $image;
  move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath);

  $address = $_POST['address'];
  $district = $_POST['district'];
  $city = $_POST['city'];
  $pin = $_POST['pin'];
  $email = $_POST['email'];
  $phno = $_POST['phno'];
  $exp = $_POST['exp'];
  $expert = $_POST['expert'];
  $pfile = basename($_FILES["files"]["name"]);
  $targetDir = "image/";
  $targetFilePath = $targetDir . $pfile;
  move_uploaded_file($_FILES["files"]["tmp_name"], $targetFilePath);


  $uname = $_POST['uname'];
  $pswd = $_POST['pswd'];
  //   $role=$_POST['role'];
  $valid = mysqli_query($conn, "select * from login_tb where username = '$uname'");
  if (mysqli_num_rows($valid) > 0) {
    echo "<script>alert('user name already exists');</script>";
    echo "<script>location='chef_reg.php'</script>";
  } else {
    $sq = "INSERT INTO `login_tb`(`username`, `password`, `role`, `status`) VALUES ('$uname','$pswd','chef','Notactive')";
    if (mysqli_query($conn, $sq)) {
      $roleID = mysqli_insert_id($conn);
      $creg = "INSERT INTO `chef_reg_tb`( `Lg_id`, `name`, `gender`, `dob`, `image`, `address`, `district_id`, `city_id`, `pin`, `email`, `phno`, `experience`, `proof`,`Expert`) VALUES ('$roleID','$name','$gender','$dob','$image','$address','$district','$city','$pin','$email','$phno','$exp','$pfile','$expert')";
      // $reg="INSERT INTO `registraion_tb`(`Lg_id`, `name`, `gender`, `dob`,`image`,`address`, `district_id`, `city_id`, `pin`, `email`, `phno`) VALUES ('$roleID','$name','$gender','$dob','$image','$address','$district','$city','$pin','$email','$phno')";
      mysqli_query($conn, $creg);
      echo "<script>alert(' registeration successfully')</script>";
      echo "<script>location='verichveri.php?eml=$email'</script>";
    }
  }
}


?>