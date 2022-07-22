<?php
session_start();
error_reporting(0);
$UserID = $_SESSION['UserID'];
include 'header.php';
include 'db.php';
if (isset($_POST['save'])) {
  $name1 = $_POST['name'];
  $genders1 = $_POST['gender'];
  $dob1 = $_POST['dob'];

  $image1 = basename($_FILES["file"]["name"]);
  $targetDir = "image/";
  $targetFilePath = $targetDir . $image1;
  move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath);

  if ($image1 == "") {
    $image1 = $img;
  }

  $address1 = $_POST['address'];
  $district1 = $_POST['district'];
  $city1 = $_POST['city'];
  $pin1 = $_POST['pin'];
  $email1 = $_POST['email'];
  $phno1 = $_POST['phno'];
  $username1 = $_POST['username'];
  $password1 = $_POST['password'];

  // $lgup = "UPDATE `login_tb` SET `username`='$username1',`password`='$password1' WHERE Lg_id = '$UserID'";
  // mysqli_query($conn, $lgup);
  $up = mysqli_query($conn, "UPDATE `registraion_tb` SET `name`='$name1',`gender`='$genders1',`dob`='$dob1',`image`='$image1',`address`='$address1',`district_id`='$district1',`city_id`='$city1',`pin`='$pin1',`email`='$email1',`phno`='$phno1' WHERE Lg_id='$UserID'");
}
$sql = mysqli_query($conn, "SELECT * FROM `registraion_tb` inner join `login_tb` on login_tb.Lg_id = registraion_tb.Lg_id join city on city.id=registraion_tb.city_id join district on district.id=registraion_tb.district_id where login_tb.Lg_id='$UserID'");
while ($row = mysqli_fetch_array($sql)) {

  $img = $row['image'];

?>




  <main class="app-content">
    <div class="row user">
      <div class="col-md-12">
        <div class="profile">
          <div class="info"><img class="user-img" src="image/<?php echo $img; ?>">
            <h4><?php echo $name; ?></h4>
            <p><b>Kitchen Boy</b></p>
          </div>
          <div class="cover-image"></div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="tile p-0">
          <ul class="nav flex-column nav-tabs user-tabs">
            <li class="nav-item"><a class="nav-link active" href="#user-timeline" data-toggle="tab">PROFILE</a></li>
            <li class="nav-item"><a class="nav-link" href="#user-settings" data-toggle="tab">EDIT</a></li>
          </ul>
        </div>
      </div>
      <div class="col-md-9">
        <div class="tab-content">
          <div class="tab-pane active" id="user-timeline">
            <div class="timeline-post">
              <h1>Details</h1>
              <p>name :<?php echo $row['name']; ?></p>
              <p>gender :<?php echo $row['gender']; ?></p>
              <p>DOB :<?php echo $row['dob']; ?></p>
              <p>Address :<?php echo $row['address']; ?></p>
              <p>District :<?php echo $row['d_name']; ?></p>
              <p>City :<?php echo $row['c_name']; ?></p>
              <p>Pin :<?php echo $row['pin']; ?></p>
              <p>Email :<?php echo $row['email']; ?></p>
              <p>Phno :<?php echo $row['phno']; ?></p>
              <p>Username :<?php echo $row['username']; ?></p>
              <!-- <p>Password :<?php echo $row['password']; ?></p> -->
              <p>Role :<?php echo $row['role']; ?></p>
            </div>
            <div class="tab-pane fade" id="user-settings">
              <div class="tile user-settings">
                <h4 class="line-head">Edit</h4>

                <form method="POST" enctype="multipart/form-data">
                  <div class="row mb-4">
                    <div class="col-md-4">
                      <label>Name</label>
                      <input class="form-control" name="name" type="text" value="<?php echo $row['name']; ?>">
                    </div>

                    <div class="col-md-4">
                      <label>Gender</label>
                      <input class="form-control" name="gender" type="text" value="<?php echo $row['gender']; ?>">
                    </div>
                    <div class="col-md-4">
                      <label>DOB</label>
                      <input class="form-control" name="dob" type="date" value="<?php echo $row['dob']; ?>">
                    </div>

                  </div>

                  <div class="row mb-4">
                    <div class="col-md-4">
                      <label>Image</label>
                      <input class="form-control" type="file" name="file">
                    </div>
                    <div class="col-md-4">
                      <label>Address</label>
                      <input class="form-control" type="text" name="address" value="<?php echo $row['address']; ?>">
                    </div>
                    <div class="col-md-4">
                      <label>District</label>
                      <input class="form-control" type="text" name="district" value="<?php echo $row['district_id']; ?>">
                    </div>
                  </div>


                  <div class="row mb-4">
                    <div class="col-md-4">
                      <label>City</label>
                      <input class="form-control" type="text" name="city" value="<?php echo $row['city_id']; ?>">
                    </div>

                    <div class="col-md-4">
                      <label>Pin</label>
                      <input class="form-control" type="number" name="pin" value="<?php echo $row['pin']; ?>">
                    </div>
                    <div class="col-md-4">
                      <label>Email</label>
                      <input class="form-control" type="email" name="email" value="<?php echo $row['email']; ?>">
                    </div>
                  </div>
                  <div class="row mb-4">
                    <div class="col-md-4">
                      <label>Phno</label>
                      <input class="form-control" type="number" name="phno" minlenght="10" maxlength="10" value="<?php echo $row['phno']; ?>" oninput="this.value = Math.abs(this.value)">
                    </div>
                    <div class="col-md-4">
                      <label>Username</label>
                      <input class="form-control" type="text" name="username" value="<?php echo $row['username']; ?>" readonly onclick="return alrt();">
                    </div>
                    <script>
                      function alrt() {
                        alert("username can't be edited");
                      }
                    </script>
                    <!-- <div class="col-md-4">
                      <label>Password</label>
                      <input class="form-control" type="text" name="password" value="<?php echo $row['password']; ?>">
                    </div> -->
                  </div>


                  <div class="row mb-10">
                    <div class="form-group mt-3">
                      <input type="submit" class="btn btn-primary btn-block" name="save" value="UPDATE">
                    </div>
                  </div>
                </form>
              </div>
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
    if (document.location.hostname == 'pratikborsadiya.in') {
      (function(i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function() {
          (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date();
        a = s.createElement(o),
          m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
      })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
      ga('create', 'UA-72504830-1', 'auto');
      ga('send', 'pageview');
    }
  </script>
  </body>

  </html>
<?php
}
// echo "<script>location='profile.php'</script>";
?>