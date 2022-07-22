<?php
error_reporting(0);
include 'man_header.php';
include 'db.php';

require_once 'phpqrcode/qrlib.php';
if(isset($_POST['submit'])){
    $path = 'qr/';
    $img=$path.uniqid().".png";
    $codeString = $_POST['text'];
   // $file = $PNG_TEMP_DIR.'test'.md5($codeString).'.png';
  
    QRcode::png($codeString,$img);
    echo "<img src='".$img."')./>";

    //echo '<img src="'.$PNG_TEMP_DIR.basename($file).'"/>';
}

//echo "<img src='".$file."'>";

?>
<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-qrcode"></i> Qr Generator</h1>
          <!-- <p>A free and open source Bootstrap 4 admin template</p> -->
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Generator</a></li>
        </ul>
      </div>
      
      <div class="col-md-9">
          <div class="tile">
            <h3 class="tile-title">QR Generator</h3>
       <form class="form-horizontal" method="post" action="#">
        <div class="form-group">
            <div>
            <label class="control-label"><b>Text</label></div>
           <div> <input type="text" class="form-control" name="text" placeholder="Enter the text to generate qr code" id="text"></div>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" name="submit" value="Generate">
        </div>
       </form>
       <br><br>
       <div align="center">

         <img src="<?php echo $img ?>" width="150px" height="120px">

       </div>
       <br>
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
    <script type="text/javascript" src="js/plugins/chart.js"></script>
    
    <!-- Google analytics script-->
    <script type="text/javascript">
      if(document.location.hostname == 'pratikborsadiya.in') {
      	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
      	ga('create', 'UA-72504830-1', 'auto');
      	ga('send', 'pageview');
      }
    </script>
    <script>
function valid(){
    var a = document.getElementById
}


    </script>
  </body>
</html>