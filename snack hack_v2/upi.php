<?php

include 'header.php';
session_start();
$tb = $_SESSION['tb_id'];

if(isset($_POST['submit'])){

	echo "<script>alert('Payment Successfully,Thankyou for ordering food Please visit again..');</script>";
	echo "<script>window.location='index.php?t_id=".$tb."';</script>";
}
?>
	
	<!-- Start All Pages -->
	<div class="menu-box">
		<div class="container text-center">
			<div class="row">
				<!-- <div class="col-lg-12">
					<h1 style="margin-top: 100px;">Order </h1>
				</div> -->
			</div>
		</div>
	</div>
	<!-- End All Pages -->
	
	<!-- Start Gallery -->
	<div class="gallery-box">
	<div class="container">
	<h1 class="display-4">PAYMENT</h1>
						            <br>  <br>  <br>
        <div class="col-9">
            
					<center>
					
<form method="post" action="#" name="upi" onsubmit="return upiverify();">
  <div class="form-group row">
    <label for="inputNumber3" class="col-sm-2 col-form-label">UPI ID</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="up" placeholder="upi id" onclick="return upiclear();">
	  <p id="upi" style="color:red"></p>
    </div>
  </div>
 
  <div class="form-group row">
    <div class="col-sm-10">
	<input type="submit" name="submit" class="btn btn-primary" value="Proceed" >
	
    </div>
  </div>
</form>
					
					
					
					
					
					</center>
			
        </div>
		
	</div>
	</div>
	                  
	<!-- End Gallery -->
	
	<!-- Start Contact info -->
	
	
		
		<div class="copyright">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<p class="company-name">All Rights Reserved. &copy; 2021 <a href="#">Snack Hack</a> </p>
					</div>
				</div>
			</div>
		</div>
		
	</footer>
	<!-- End Footer -->
	
	<script>

function upiverify(){
         var a=document.upi.up.value.trim();
		 if(a =="")
		 {
			document.getElementById('upi').innerHTML="enter upi id";
			 return false;
		 }
		 else{
			 return true;
		 }
}
 function upiclear(){
	document.getElementById('upi').innerHTML="";
			 return false;

 }
	

</script>

	<!-- ALL JS FILES -->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <!-- ALL PLUGINS -->
	<script src="js/jquery.superslides.min.js"></script>
	<script src="js/images-loded.min.js"></script>
	<script src="js/isotope.min.js"></script>
	<script src="js/baguetteBox.min.js"></script>
	<script src="js/form-validator.min.js"></script>
    <script src="js/contact-form-script.js"></script>
    <script src="js/custom.js"></script>
</body>
</html>
<?php 
 
 ?>-