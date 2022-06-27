<?php 
include 'db.php';
if(isset($_POST['Signup'])){

    $name = $_POST['name'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $phno = $_POST['phno'];
    $district = $_POST['district'];
    $city = $_POST['city'];
    $pin = $_POST['pin'];
    $username = $_POST['username'];
    $password = $_POST['pass'];

    $image=basename($_FILES["file"]["name"]);
    $targetDir="images/";
    $targetFilePath=$targetDir.$image;
    move_uploaded_file($_FILES["file"]["tmp_name"],$targetFilePath);

    $valid=mysqli_query($conn,"SELECT * from login_tb where username = '$username'");
    if(mysqli_num_rows($valid)>0)
    {
      echo "<script>alert('user name already exists');</script>";
      echo "<script>location='Signup.php'</script>";
    }
    else{
      $sq="INSERT INTO `login_tb`(`username`, `password`, `role`, `status`) VALUES ('$username','$password','user','Approved')";
      if(mysqli_query($conn, $sq))
      {
        $roleID=mysqli_insert_id($conn);
      $reg="INSERT INTO `user_registration_tb`(`login-id`, `name`, `gender`, `dob`, `address`, `email`, `phno`, `District`, `city`, `pin`, `image`) VALUES ('$roleID','$name','nil','$dob','$address','$email','$phno','$district','$city','$pin','$image')";
      mysqli_query($conn,$reg);
      echo "<script>alert(' registeration successfully')</script>"; 
      echo "<script>location='verify.php?eml= $email'</script>";
      }
      
       
  
    }
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Snack Hack</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="js/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="js/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="js/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="js/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login10">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/logi.gif" alt="IMG">
				</div>
            
				<form class="login100-form validate-form" name="myform" method="post" enctype="multipart/form-data" onsubmit="return sign();">
					<span class="login100-form-title">
					 Sign up
					</span>
				
                    <div class="wrap-input100">
						<input class="input100" type="text" name="name" id="name" placeholder="name" onclick="return cl();">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user-o" aria-hidden="true"></i>
						</span>
					</div>

                    <div class="wrap-input100" >
						<input class="input100" type="date" name="dob" id="dob" placeholder="DOB" onclick="return cl();">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-calendar-o" aria-hidden="true"></i>
						</span>
					</div>
                  
                    <div class="wrap-input100">
						<input class="input100" type="text" name="address" id="address" placeholder="Address" onclick="return cl();">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-address-card-o" aria-hidden="true"></i>
						</span>
					</div>
                    <div class="wrap-input100">
						<input class="input100" type="email" name="email"  id="e-mail" placeholder="Email" onclick="return cl();">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>
                    <div class="wrap-input100">
						<input class="input100" type="text" name="phno"  id="phno" placeholder="Phone Number" minlength="10" maxlength="10" onclick="return cl();" onkeypress="return onlyNumberKey(event)">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-phone" aria-hidden="true"></i>
						</span>
					</div>
                    
<!-- ajax -->
                    <div class="wrap-input100">
						<select class="input100"  name="district" id="district-dropdown" onclick="return cl();">
                        <option value="select">Select district</option>
                            <?php
                               
                                $result = mysqli_query($conn,"SELECT * FROM district");
                                while($row = mysqli_fetch_array($result)) {
                                ?>
                                <option value="<?php echo $row['id'];?>"><?php echo $row["d_name"];?></option>
                                <?php
                                }
                            ?>
                           
                        </select>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-map-marker" aria-hidden="true"></i>
						</span>
					</div>
                    <div class="wrap-input100">
						<select class="input100"  name="city" id="city-dropdown" onclick="return cl();">
                            <option value="select">Select City</option>
                        </select>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-map-marker" aria-hidden="true"></i>
						</span>
					</div>




<!-- ajax -->


                    <div class="wrap-input100" >
						<input class="input100" type="text" name="pin" id="pin" placeholder="Pin Number" minlength="6"  maxlength="6" onclick="return cl();" onkeypress="return onlyNumberKey(event)">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-location-arrow" aria-hidden="true"></i>
						</span>
					</div>
					<div class="wrap-input100">
						<input class="input100" type="text" name="username" id="username" placeholder="Username" onclick="return cl();">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user-o" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100">
						<input class="input100" type="password" name="pass" id="password" placeholder="Password" onclick="return cl();">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
                    <div class="wrap-input100">
						<input class="input100" type="password" name="cpass" id="cpassword" placeholder="Confirm Password" onclick="return cl();">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
                    <div class="wrap-input100">
						<input class="input100" type="file" name="file" placeholder="image"  id="file" accept="image/png, image/gif, image/jpeg" onclick="return cl();" onchange="return filevalid();">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
                        <i class="fa fa-file" aria-hidden="true"></i>
						</span>
					</div>
					<span id="veri" style="color:red"></span>
					<div class="container-login100-form-btn">
						<input type="submit" class="login100-form-btn" value="Signup" name="Signup">
						
					</div>

					<div class="text-center p-t-136">
						<a class="txt2" href="Login.php">
							Already a Member
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
                
			</div>
            
		</div>
	</div>
	
	<script>
function sign() {

	var a = document.getElementById('name').value.trim();
	var b = document.getElementById('dob').value.trim();
	var c = document.getElementById('address').value.trim();
	var d = document.getElementById('e-mail').value.trim();
	var e = document.getElementById('phno').value.trim();
	var f = document.getElementById('district-dropdown').value.trim();
	var g = document.getElementById('city-dropdown').value.trim();
	var h = document.getElementById('pin').value.trim();
	var i = document.getElementById('username').value.trim();
	var j = document.getElementById('password').value.trim();
	var k = document.getElementById('cpassword').value.trim();
	var l = document.getElementById('file').value.trim();
    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

	if(a ==""){
		document.getElementById('veri').innerHTML = "**Please enter the valid name";
		return false;
	}
	else if(b ==""){
		document.getElementById('veri').innerHTML ="**Please enter the valid DOB";
		return false;
	}
	else if(c ==""){
		document.getElementById('veri').innerHTML ="**Please enter the valid address";
		return false;
	}
	else if(d ==""){
		document.getElementById('veri').innerHTML ="**Please enter the valid e-mail";
		return false;
	}
	else if(!filter.test(d)){
		document.getElementById('veri').innerHTML ="**please enter valid email like xyz@gmail.com/xyz@gmail.in";
		return false;
	}
	else if(e ==""){
		document.getElementById('veri').innerHTML ="**Please enter the valid phone number";
		return false;
	}
	else if(e < 10){
		document.getElementById('veri').innerHTML ="**Please enter the 10 digit phone number";
		return false;
	}
	else if(f =="select"){
		document.getElementById('veri').innerHTML ="**Please select the district";
		return false;
	}
	else if(g =="select"){
		document.getElementById('veri').innerHTML ="**Please select the city";
		return false;
	}
	else if(h ==""){
		document.getElementById('veri').innerHTML ="**Please enter the valid pin number";
		return false;
	}
	else if(i ==""){
		document.getElementById('veri').innerHTML ="**Please enter the valid username";
		return false;
	}
	else if(j ==""){
		document.getElementById('veri').innerHTML ="**Please enter the valid password";
		return false;
	}
	else if(k ==""){
		document.getElementById('veri').innerHTML ="**Please enter the valid Confirm password";
		return false;
	}
	else if(j != k){
		document.getElementById('veri').innerHTML ="**password entered is Mismatch";
		return false;
	}
	else if(l ==""){
		document.getElementById('veri').innerHTML ="**Please choose a image";
		return false;
	}

	else{
		return true;
	}
}
function cl(){
document.getElementById("veri").innerHTML=" ";
}
function filevalid(){
	var im = document.myform.file;
	var filePath = im.value;
	var img = /(\.jpg|\.png|\.jpeg)$/i;
	if(!img.exec(filePath)){
		document.getElementById('veri').innerHTML ="**Please choose a image !!";
		return false;
	}

}

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
	
<!--===============================================================================================-->	
	<script src="js/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="js/vendor/bootstrap/js/popper.js"></script>
	<script src="js/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="js/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="js/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

<script>
   $(document).ready(function() {
    $('#district-dropdown').on('change', function() {
    var state_id = this.value;
    $.ajax({
    url: "cities-by-district.php",
    type: "POST",
    data: {
        d_id: state_id    //d_id is the foreignkey of city table
    },
    cache: false,
    success: function(result){
    $("#city-dropdown").html(result);

    }
    });
    });    

    });
</script>
</body>
</html>
