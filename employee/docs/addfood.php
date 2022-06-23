<?php
include 'header.php';
?>
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-dashboard"></i> Add food Page</h1>
      <!-- <p>Start a beautiful journey here</p> -->
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="#">Add food Page</a></li>
    </ul>
  </div>

  <div class="row">
    <div class="col-md-6" style="border-radius: 10px">
      <div class="tile">
        <div align="center">
          <h1>FOOD ITEMS</h1>
        </div>


        <center>
          <div style="width:350px;">
            <form method="post" name="myform" enctype="multipart/form-data" onsubmit="return validate()">

              <div class="form-group">
                <label class="control-label"><b>FOOD NAME</b></label>
                <input class="form-control" type="text" name="foodname" id="fn" onclick="return Clear()">
                <span id="f1" style="color:red"></span>
              </div>
              <div class="form-group">
                <label class="control-label"><b>FOOD IMAGE</b></label>
                <input type="file" name="file" id="file" class="form-control" accept="image/png, image/gif, image/jpeg">
                <span id="i1" style="color:red"></span>
              </div>
              <div class="form-group">
                <label class="control-label"><b>DESCRIPTION</b></label>
                <input class="form-control" type="text" name="fooddes" id="des" onclick="return Clear()">
                <span id="d1" style="color:red"></span>
              </div>

              <div class="form-group">
                <label class="control-label"><b>QUANTITY</b></label>
                <input class="form-control" type="number" name="quantity" id="quantity" onclick="return Clear()" min="0" oninput="this.value = Math.abs(this.value)">
                <span id="q1" style="color:red"></span>
              </div>
              <div class="form-group">
                <label class="control-label"><b>PRICE</b></label>
                <input class="form-control" type="number" name="foodprice" id="price" onclick="return Clear() " min="0" oninput="this.value = Math.abs(this.value)">
                <span id="p1" style="color:red"></span>
              </div>
              <div class="form-group">
                <label class="control-label"><b>CATEGORY</label>
                <select class="form-control" name="category" id="cat" onclick="return Clear()">
                  <option value="select">SELECT</option>
                  <?php

                  $result = mysqli_query($conn, "SELECT * FROM `category_tb`");
                  while ($row = mysqli_fetch_array($result)) {
                  ?>
                    <option value="<?php echo $row['category_id']; ?>"><?php echo $row["category"]; ?></option>
                  <?php
                  }
                  ?>
                </select>
                <span id="c1" style="color:red"></span>
              </div>
              <div class="form-group mt-3">
                <input class="btn btn-primary btn-block" type="submit" name="sub" value="SUBMIT">
              </div>
            </form>
          </div>
        </center>
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
<script>
  function validate() {
    var a = document.myform.foodname.value.trim();
    var b = document.myform.fooddes.value.trim();
    var c = document.myform.file.value.trim();
    var f = document.myform.quantity.value.trim();
    var d = document.myform.foodprice.value.trim();
    var e = document.myform.category.value.trim();

    if (a == "") {
      document.getElementById('f1').innerHTML = "**please enter foodname";
      return false;
    }
    if (b == "") {
      document.getElementById('d1').innerHTML = "**please enter description";
      return false;
    }
    if (c == "") {
      document.getElementById('i1').innerHTML = "**please enter img";
      return false;
    }
    if (f == "") {
      document.getElementById('q1').innerHTML = "**please enter quantity";
      return false;
    }
    if (d == "") {
      document.getElementById('p1').innerHTML = "**please enter price";
      return false;
    }
    if (e == "select") {
      document.getElementById('c1').innerHTML = "**please enter category";
      return false;
    } else {
      return true;
    }
  }

  function Clear() {
    document.getElementById("f1").innerHTML = "";
    document.getElementById('d1').innerHTML = "";
    // document.getElementById('i1').innerHTML="";
    document.getElementById('p1').innerHTML = "";
    document.getElementById('c1').innerHTML = "";
    return false;
  }
</script>
</body>

</html>
<?php
include 'db.php';
if (isset($_POST['sub'])) {
  $fname = $_POST['foodname'];
  $fdesc = $_POST['fooddes'];

  $image = basename($_FILES["file"]["name"]);
  $targetDir = "image/";
  $targetFilePath = $targetDir . $image;
  move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath);
  $quantity = $_POST['quantity'];
  $fprice = $_POST['foodprice'];
  $fcat = $_POST['category'];
  $qww = mysqli_query($conn, "SELECT * FROM `food_tb` WHERE `food name` = '$fname' AND `category_id` = '$fcat' ");
  $rr = mysqli_num_rows($qww);
  if ($rr <= 0) {
    $sql1 = mysqli_query($conn, "INSERT INTO `food_tb`(`food name`, `description`, `food_img`,`quantity`, `food_price`, `category_id`) VALUES ('$fname','$fdesc','$image','$quantity','$fprice','$fcat')");
    echo "<script> alert('successfully inserted')</script>";
    echo "<script>location='viewproduct.php'</script>";
  } else {
    echo "<script> alert('Item Existed')</script>";
  }
}
?>