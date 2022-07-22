
<?php
include 'Login_header.php';
include 'db.php';
session_start();
$uid = $_SESSION['UserID'];
$ax = mysqli_query($conn,"SELECT * FROM `user_registration_tb` join login_tb on `login_tb`.Lg_id = `user_registration_tb`.`login-id` WHERE user_registration_tb.`login-id`='$uid'");
$row = mysqli_fetch_assoc($ax);
$name = $row['name'];
$gender = $row['gender'];
$dob = $row['dob'];
$address = $row['address'];
$email = $row['email'];
$phno = $row['phno'];
$district = $row['District'];
$city = $row['city'];
$pin = $row['pin'];
$image = $row['image'];
$username = $row['username'];
// $password = $row['password'];
$role = $row['role'];
?>
<br><br><br>

<div class="container rounded bg-white mt-5">
        <div class="row">
            <div class="col-md-4 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" src="images/<?php echo $image; ?>" width="90"><span class="font-weight-bold"><?php echo $name; ?></span><span class="text-black-50"><?php echo $email; ?></span><span><?php echo $role; ?></span></div>
            </div>
            <div class="col-md-8">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h1>Profile</h1>
                    </div>
                    <form method="post">
                    <div class="row mt-2">
                        <div class="col-md-6">
                        <label class="fs-4">Name</label>
                        <div><input type="text" class="form-control" name="name"value="<?php echo $name; ?>"></div>
                        </div>
                        <div class="col-md-6">
                        <label class="fs-4">Gender</label>
                        <div><input type="text" class="form-control" name="gender" value="<?php echo $gender; ?>" ></div>
                        </div>
                         </div>
                    <div class="row mt-3">
                    <div class="col-md-6">
                        <label class="fs-4">DOB</label>
                        <div><input type="date" class="form-control" name="date" id="dob" value="<?php echo $dob; ?>"></div>
                    </div>
                    <div class="col-md-6">
                        <label class="fs-4">Address</label>
                        <div><input type="text" class="form-control" name="address" value="<?php echo $address; ?>" ></div>
                    </div>
                    </div>
                    <div class="row mt-3">
                    <div class="col-md-6">
                        <label class="fs-4">Phone Number</label>
                        <div><input type="text" class="form-control" name="phno" value="<?php echo $phno; ?>"></div>
                    </div>
                    <div class="col-md-6">
                        <label class="fs-4">District</label>
                        <div><input type="text" class="form-control" name="district" value="<?php echo $district; ?>"></div>
                    </div>
                    </div>
                    <div class="row mt-3">
                    <div class="col-md-6">
                        <label class="fs-4">City</label>
                        <div><input type="text" class="form-control" name="city" value="<?php echo $city; ?>"></div>
                    </div>
                    <div class="col-md-6">
                        <label class="fs-4">Pin Number</label>
                        <div><input type="text" class="form-control" name ="pin" city="pin" value="<?php echo $pin; ?>"></div>
                    </div>
                    </div>
                    <div class="row mt-3">
                        
                    <div class="col-md-6">
                        <label class="fs-4">UserName</label>
                        
                        <div><input type="text" class="form-control"  name="username" value="<?php echo $username; ?>" readonly onclick="return alrt();"></div>
                        
                    </div>
                    
                        <!-- <div class="col-md-6">
                        <label class="fs-4">Password</label>
                        <div><input type="text" class="form-control" name="password" value="<?php echo $password; ?>"></div>
                    </div> -->
                    </div>
                    <div><span id="t" style="color:red"></span></div>
                    <div class="mt-5 text-right"><input type="submit" name="save" class="btn btn-primary profile-button" value="Save Profile" ></div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript"> href = "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"</script>
    <script type="text/javascript"> href = "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"</script>
    <script type="text/javascript"> href = "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"</script>
    <script type="text/javascript"> href = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"</script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
function alrt() {
     document.getElementById("t").innerHTML="**this feild cannot be changed**";
	 }
</script>
<script>

        $(function(){
            var dtToday = new Date();

            var month = dtToday.getMonth() + 1;
            var day = dtToday.getDate();
            var year = dtToday.getFullYear();

            if(month < 10)
                month = '0' + month.toString();
            if(day < 10)
                day = '0' + day.toString();

            var maxDate = year + '-' + month + '-' + day;    
            $('#dob').attr('max', maxDate);
        });

    </script>
<?php 
if(isset($_POST['save'])){

$name = $_POST['name'];
$gender = $_POST['gender'];
$dob = $_POST['date'];
$address = $_POST['address'];
$phno = $_POST['phno'];
$district = $_POST['district'];
$city = $_POST['city'];
$pin = $_POST['pin'];
$password = $_POST['password'];
$as = "UPDATE `login_tb` SET `password`='$password' WHERE Lg_id='$uid' ";
mysqli_query($conn,$as);
$aa = "UPDATE `user_registration_tb` SET `name`='$name',`gender`='$gender',`dob`='$dob',`address`='$address',`email`='$email',`phno`='$phno',`District`='$district',`city`='$city',`pin`='$pin' WHERE `login-id`='$uid'";
mysqli_query($conn,$aa);
echo "<script> alert('succesfully Updated');</script>";
echo"<script>window.location='Profile.php';</script>";

}

?>

