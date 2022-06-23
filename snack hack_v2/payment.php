<?php

include 'header.php';
session_start();
$tb = $_SESSION['tb_id'];
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
					
					<div class="col-md-9" style="border-radius: 5px;">
					<div class="bg-primary">
							<div class="text-center">
							<>
								<div class="card-body">
									<form>
									
									<h2 class="card-text"><b>Online Payment</b></h2>
									<br>
									<table align="center">
									
									<tr>
									<td><h4>ONLINE PAYMENT :</h4></td>
									<td><a href="card.php?t_id=<?php echo $tb ?>"><button type="button" class="btn btn-warning" onclick="return valida();">PAY</button></a></td>
									</tr>
									
									<tr>
									<td><h4>OFFLINE PAYMENT :</h4></td>
									<td><a href="index.php?t_id=<?php echo $tb ?>"><button type="button" class="btn btn-warning" onclick="return pay();">PAY</button></a></td>
									</tr>

									</table>
										
									</form>
								</div>
							</div>
						</div>
					</div> 
					
						   
                    </div>
					
					
					
					</center>
			
        </div>
		
	</div>
	</div>
	           <script type="text/javascript">
				   function pay(){
					   alert("Thank you for ordering food,visit again.....")
				   }
				   function valida(){
					alert("Thank you for ordering food,You can now pay for your order at Receptionist.")
				   }
			   </script>       
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