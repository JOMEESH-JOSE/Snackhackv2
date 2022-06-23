<?php 
session_start();
include 'db.php';
if(isset($_POST['Login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = mysqli_query($conn,"SELECT * FROM `login_tb` where username='$username' and  password='$password'");
	$as = mysqli_num_rows($sql);
    while($row = mysqli_fetch_array($sql)){
        if(!empty($sql)){
            if($row['role'] == 'user')
            {
              $_SESSION['UserID'] = $row['Lg_id'];
              header("location: index2.php");
            }
            // else{
            //     echo "<script>alert('invalid credentials');</script>";
			// 	header("location:Login.php");
		
			// }
        }
        else{
            echo '<script>alert("Password and Username are not correct");</script>';
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
            
				<form class="login100-form validate-form" name="myform" method="post" onsubmit="return login();">
					<span class="login100-form-title">
						User Login
					
					</span>
					<span id="veri" style="color:red"></span>
					<div class="wrap-input100">
						<input class="input100" type="text" id="username" name="username" placeholder="Username" autocomplete ="off" onclick="return cl();">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user-o" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100">
						<input class="input100" type="password" id="password" name="password" placeholder="Password" autocomplete ="off" onclick="return cl();">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<input type="submit" class="login100-form-btn" value="Login" name="Login">
						
					</div>

					<div class="text-center p-t-12">
						<span class="txt1">
							Forgot
						</span>
						<a class="txt2" href="forget.php">
							 Password?
						</a>
					</div>

					<div class="text-center p-t-136">
						<a class="txt2" href="Signup.php">
							Create your Account
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
                
			</div>
            
		</div>
	</div>
	<script>
function login() {

	var a = document.getElementById('username').value.trim();
	var b = document.getElementById('password').value.trim();

	if(a ==""){
		document.getElementById('veri').innerHTML = "**Please enter the valid username";
		return false;
	}
	else if(b ==""){
		document.getElementById('veri').innerHTML ="**Please enter the valid password";
		return false;
	}

	else{
		return true;
	}
}
function cl(){
document.getElementById("veri").innerHTML=" ";
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

</body>
</html>