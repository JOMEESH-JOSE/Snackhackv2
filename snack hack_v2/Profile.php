
<?php
include 'Login_header.php';
include 'db.php';
session_start();
$uid = $_SESSION['UserID'];
$ax = mysqli_query($conn,"SELECT * FROM `user_registration_tb` join login_tb on `login_tb`.Lg_id = `user_registration_tb`.`login-id` JOIN district on district.id = user_registration_tb.District JOIN city on city.id = user_registration_tb.city WHERE user_registration_tb.`login-id`='$uid'");
$row = mysqli_fetch_assoc($ax);
$name = $row['name'];
$gender = $row['gender'];
$dob = $row['dob'];
$address = $row['address'];
$email = $row['email'];
$phno = $row['phno'];
$district = $row['d_name'];
$city = $row['c_name'];
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
                <table>
                       <tr>
                      <th><td> <p class="fs-4">Name : </p></td></th>
                      <th><td><p class="fs-4"><?php echo $name; ?></p></td></th>
                    </tr>
                        <tr>
                        <th><td><p class="fs-4">Gender : </p></td></th>
                        <th><td><p class="fs-4"><?php echo $gender; ?></p></td></th>
                        </tr>
                        <tr>
                        <th><td><p class="fs-4">DOB : </p></td></th>
                        <th><td><p class="fs-4"><?php echo $dob; ?></p></td></th>
                        </tr>
                       
                       <tr>
                        <th><td> <p class="fs-4">Address : </p></td></th>
                        <th><td><p class="fs-4"><?php echo $address; ?></p></td></th>
                       </tr>
                   <tr>
                        <th><td><p class="fs-4">Phone Number : </p></td></th>
                        <th><td><p class="fs-4"><?php echo $phno; ?></p></td></th>
                   </tr>
                   <tr>
                        <th><td><p class="fs-4">District : </p></td></th>
                        <th><td> <p class="fs-4"><?php echo $district; ?></p></td></th>
                   </tr>
                   <tr>
                        <th><td> <p class="fs-4">City : </p></td></th>
                        <th><td><p class="fs-4"><?php echo $city; ?></p></td></th>
                   </tr>
                   <tr>
                        <th><td><p class="fs-4">Pin Number : </p></td></th>
                        <th><td> <p class="fs-4"><?php echo $pin; ?></p></td></th>
                   </tr>
                   <tr>
                        <th><td><p class="fs-4">UserName : </p></td></th>
                        <th><td><p class="fs-4"><?php echo $username; ?></p></td></th>
                   </tr>  
                   <!-- <tr>
                        <th><td><p class="fs-4">Password : </p></td></th>
                        <th><td><p class="fs-4"><?php echo $password; ?></p></td></th>
                   </tr> -->
                    <tr><th><td><a href="v_profile.php"><input type="submit" name="save" class="btn btn-primary profile-button" value="Edit Profile" ></a></td></th></tr>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript"> href = "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"</script>
    <script type="text/javascript"> href = "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"</script>
    <script type="text/javascript"> href = "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"</script>
    <script type="text/javascript"> href = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"</script>
<script>


