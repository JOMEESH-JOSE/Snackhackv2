<?php

error_reporting(0);
include 'db.php';
session_start();
$tb = $_SESSION['tb_id'];

if(isset($_GET['cid'])){

$cartid = $_GET['cid'];


$sql3 = mysqli_query($conn,"SELECT * from cart where cartid= $cartid");
$row3 = mysqli_fetch_array($sql3);

$quan = $row3['quantity'];
$foodid = $row3['foodid'];

$sqll = "UPDATE food_tb SET quantity=quantity+$quan where fd_id= $foodid" ;
mysqli_query($conn,$sqll);
$sqlls = "DELETE FROM cart where cartid='$cartid'";
mysqli_query($conn,$sqlls);
echo"<script>alert('Item Removed');</script>";
echo"<script>window.location='cart2.php';</script>";
}

if(isset($_POST['order'])){
	$foodid=intval($_POST['food_id']);
	
	$car2 = mysqli_query($conn,"SELECT * FROM `cart` where table_id='$tb'");
	while($row = mysqli_fetch_array($car2)){

	

	$fd_id = intval($row['foodid']);
	$foodquantity=$row['quantity'];
	$foodprice=$row['totalprice'];
	$order="INSERT INTO `order_tb`(`food_id`,`table_id`,`foodquantity`, `food total price`,`status`,`Payment_status`) VALUES ('$fd_id','$tb','$foodquantity', '$foodprice',0,'NOT_PAID')";
	$or1=mysqli_query($conn,$order);
	$del=mysqli_query($conn,"DELETE  FROM `cart` WHERE table_id='$tb'");

	}
	echo "<script>alert('You are Redirected to Payment Page');</script>";
	echo"<script>window.location='payment.php?t_id= ".$tb."'</script>";
}

?>

<script>
function remove()
{
if(confirm("Do you want to remove this item"))
{
	return true;
}
else{
	return false;
}
}                      
 </script>
<?php
include 'header.php';
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
	<center>
	<div class="gallery-box">
	<div class="container">
        <div class="col-9">
            
			
					<div class="main">
						
						<h1 class="display-4">Order Table</h1>
						            <br>  <br>  <br>
						<table class="table table-bordered">
							<thead class="text-center">
							<tr>
							<th>Food name</th>
							<th>Food image</th>
							<th>Quantity</th> 
							<th>Price</th>
							<th>Action</th>
							</tr>
							</thead>

							<tbody class="text-center">
								<?php
                                $sql2 = "SELECT cart.*,food_tb.`food name`,food_tb.food_img,food_tb.fd_id FROM `cart` join food_tb on food_tb.fd_id = cart.foodid where table_id ='$tb'";//table id 
                                $amount = 0;
                                $cartitemid = 0;
                                $query2 = mysqli_query($conn,$sql2);

                                if (mysqli_num_rows($query2)>0){
                                while ($cart = mysqli_fetch_array($query2)){  
                                $amount = $amount + $cart['totalprice'];
                                $cartitemid =  $cart['foodid'];
      
                                // $sql3 = "SELECT * from food_tb where fd_id=$cartitemid ";
                                // $query3 = mysqli_query($conn,$sql3);
								
                                // while($food = mysqli_fetch_array($query3)){
                                $foodid = $cart['fd_id'];
                                if($cartitemid==$foodid){
      
								
								
								
									?>
									<tr>

									
									<td><?php echo $cart['food name'] ?></td>
									<td><img src="images/<?php echo $cart['food_img'] ?>"alt="img"width="80"height="40"></td>
									<td><?php echo $cart['quantity'] ?></td>
			
									<td><?php echo $cart['totalprice'] ?></td>
									<td>
									
									<form method="post">	
									<input type="hidden" name="cartid" value="<?php echo $cart['cartid'] ?>">

									<input type="hidden" name="quantity" value="<?php echo $cart['quantity'] ?>">
									<input type="hidden" name="food_id" value="<?php echo $cart['foodid'] ?>">
									<a href="cart2.php?cid=<?php echo $cart['cartid'] ?>" style="border-radius:12px" class="btn-warning"  onclick="return remove()">Remove</a>
									<input type="hidden" name="foodname" value="$food['food name']">
								    </td>
									
									</tr>
								

							<?php
								}
							
                        }
                    }else{
                         ?>
                        <tr> no products</tr>
                   <?php }
								?>
							<tr>
								
								
							</tr>
							
							</tbody>
							
						</table>						
						<!-- </div> -->
						<div class="col-md-4">
					<div class="bg-primary">
							<div class="text-center">
								<div class="card-body">
									<h3 class="card-title">TOTAL</h3>

									<h4 class="card-text" id="total"><?php echo $amount; ?></h4> <!-- amount to total-->
									<a href="#" class="card-link"><button  type="submit" class="btn-warning" name="order" value="<?php $tb ?>">ORDER</button></a>
									</form>
								</div>
							</div>
						</div>
					</div> 
					
						   
                    </div>
					
				
        </div>
		
	</div>
	</div></center>
	<!-- //<script>
	// 	function add(){
    //  var quantity = document.getElementById('quantity').value
	// var total = document.getElementById('total').innerHTML;
	 
	//   var v = quantity * 100;
	//  total = total + v;
	// document.getElementById("total").innerHTML = total;
	// 	}
	// </script> -->
	                  
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

