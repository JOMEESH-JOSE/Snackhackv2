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
					
					<form method="post" action="#" name="myform" onsubmit="return card();">
  <div class="form-group row">
    <label for="inputText3" class="col-sm-2 col-form-label">ACCOUNT_NAME</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="acc_name" placeholder="ACCOUNT NAME" onclick="return cardclear();">
	  <p id="acc_name" style="color:red"></p>
    </div>
  </div>
  <div class="form-group row">
    <label for="inputNumber3" class="col-sm-2 col-form-label">ACCOUNT_NO</label>
    <div class="col-sm-10">
      <input type="number" class="form-control" name="acc_no" placeholder="ACCOUNT NUMBER" onclick="return cardclear();">
	  <p id="acc_no" style="color:red"></p>
    </div>
  </div>
  <div class="form-group row">
    <label for="inputNumber3" class="col-sm-2 col-form-label">CVV</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="ccv" placeholder="CVV" minlength="3" maxlength="3" onclick="return cardclear();">
	  <p id="ccv" style="color:red"></p>
    </div>
  </div>
  <div class="form-group row">
    <label for="inputText3" class="col-sm-2 col-form-label">VALID TILL</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="valid" placeholder="dd/yyyy" onclick="return cardclear();">
	  <p id="valid" style="color:red"></p>
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-10">
     <input type="submit" name ="submit" class="btn btn-primary" value="Proceed">
	 
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
     function card(){
         var a=document.myform.acc_name.value.trim();
		 var b=document.myform.acc_no.value.trim();
		 var c=document.myform.ccv.value.trim();
		 var d=document.myform.valid.value.trim();
		 if(a==""){
			 document.getElementById('acc_name').innerHTML="enter card holder name";
			 return false;
		 }
		if(b ==""){
			document.getElementById("acc_no").innerHTML="enter card  number";
			 return false;
		 }
		if(c ==""){
			document.getElementById("ccv").innerHTML="enter cvv number";
			 return false;
		 }
		if(d ==""){
			document.getElementById("valid").innerHTML="enter card  validity date";
			 return false;
		 }
		 else{
			 return true;
		 }
	 }
	 function cardclear() {
		document.getElementById("acc_name").innerHTML="";
		document.getElementById("acc_no").innerHTML="";
		document.getElementById("ccv").innerHTML="";
		document.getElementById("valid").innerHTML="";
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
 
 ?>