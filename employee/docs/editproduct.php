<?php
include 'db.php';
include 'header.php';
$food_id=$_GET['p_id'];
 if(isset($_POST['sub']))
 {
     $fname=$_POST['foodname'];
     $fdes=$_POST['fooddes'];
    //  $fimg=$_FILES['file']['name'];
    //  $targetDir="image/";
    //  $targetFilePath=$targetDir.$fimg;
    //  move_uploaded_file($_FILES['file']['tmp_name'],$targetFilePath);
     $quantity=$_POST['quantity'];
     $price=$_POST['foodprice'];
    //  $category=$_POST['category'];
    //  if($fimg==""){
    //     $fimg=$img;
    //   }
    //   if($category==""){
    //     $category=$ff;
    //   }
     $sql = mysqli_query($conn,"UPDATE `food_tb` SET `food name`='$fname',`description`='$fdes',`quantity`='$quantity',`food_price`='$price' WHERE fd_id='$food_id'");
     
     echo "<script>alert('updated successfully');</script>";
     echo "<script> location='viewproduct.php'</script>"; 
 }

 $res = mysqli_query($conn,"SELECT * FROM `food_tb` where fd_id='$food_id'");
 while($row=mysqli_fetch_array($res))
 {
  $img=$row['food_img'];
  $ff=$row['category_id'];
 
?>

<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i>Edit food Page</h1>
          <!-- <p>Start a beautiful journey here</p> -->
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Edit food Page</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-8">
          <div class="tile" align="center" >
            <div class="tile-body"><h1>Edit</h1></div>
         
        
      <div style="width:400px;">
        <form method="post" name="myform" enctype="multipart/form-data">
        
        <div class="form-group">
        <label class="control-label"><b>FOOD NAME</b></label>
       <input  class="form-control" type ="text" value="<?php echo $row['food name']; ?>"name="foodname" id="fn">
       
        </div>
        <div class="form-group">
        <label class="control-label"><b>DESCRIPTION</b></label>
       <input  class="form-control" type ="text" value="<?php echo $row['description']; ?>"name="fooddes" id="des" >
       
        </div>
      <!-- <div class="form-group">
      <label class="control-label"><b>FOOD IMAGE</b></label> 
       <input type="file" name="file" id="file" value="file" class="form-control" >
    
      </div> -->
      <div  class="form-group">
       <label class="control-label" ><b>QUANTITY</b></label>
       <input class="form-control" type ="text" value ="<?php echo $row['quantity']; ?> "name="quantity" id="quantity">
       
       </div>
       <div  class="form-group">
       <label class="control-label" ><b>PRICE</b></label>
       <input class="form-control" type ="text" value ="<?php echo $row['food_price']; ?> "name="foodprice" id="price">
       </div>
       
      <div class="form-group mt-3">
      <input class="btn btn-primary btn-block"  type ="submit" name="sub"  value="Edit">
      </div>
      </form>
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
    <!-- <script type="text/javascript">
      if(document.location.hostname == 'pratikborsadiya.in') {
      	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
      	ga('create', 'UA-72504830-1', 'auto');
      	ga('send', 'pageview');
      }
    </script> -->
<!-- <script>
  function validate() {
    var a = document.myform.foodname.value.trim();
    var b = document.myform.fooddes.value.trim();
    var c = document.myform.file.value.trim();
    var f = document.myform.quantity.value.trim();
    var d = document.myform.foodprice.value.trim();
    var e = document.myform.category.value.trim();
    
    if (a==""){
      document.getElementById('f1').innerHTML="**please enter foodname";
      return false;
    }
    if (b==""){
      document.getElementById('d1').innerHTML="**please enter description";
      return false;
    }
    if (c==""){
      document.getElementById('i1').innerHTML="**please enter img";
      return false;
    }
    if (f==""){
      document.getElementById('q1').innerHTML="**please enter quantity";
      return false;
    }
    if (d==""){
      document.getElementById('p1').innerHTML="**please enter price";
      return false;
    }
    if (e=="select"){
      document.getElementById('c1').innerHTML="**please enter category";
      return false;
    }
    else{
      return true;
    }
  }
  function Clear(){
    document.getElementById("f1").innerHTML="";
    document.getElementById('d1').innerHTML="";
    // document.getElementById('i1').innerHTML="";
    document.getElementById('p1').innerHTML="";
    document.getElementById('c1').innerHTML="";
    return false;
  }
  
</script> -->
  </body>
</html>
<?php
 }
 
 ?>
