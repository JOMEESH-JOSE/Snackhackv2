<?php 
include 'man_header.php';
include 'db.php';
$sql=mysqli_query($conn,"SELECT * FROM `food_tb` inner join category_tb on category_tb.category_id=food_tb.category_id");

 
?>

    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Food Table</h1>
          <p>Table to display analytical data effectively</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active"><a href="viewpro.php">Data Table</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <button type="button" class="btn btn-" >PDF</button>&ensp;<button type="button" class="btn btn-" >CSV</button>
              <br><br>
              <table class="table table-hover table-bordered" id="sampleTable">
              <thead>
                <tr>
                    <th>Food Name</th>
                    <th>Description</th>
                    <th>Food Image</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Category</th>
                  </tr>
                </thead>
                <tbody>
                  <?php while ($row=mysqli_fetch_array($sql))
{
                  ?>
                  <tr>
                  <td><?php echo $row['food name']; ?></td>
                    <td><?php echo $row['description']; ?></td>
                    <td><img src="image/<?php echo $row['food_img']; ?>" height="60px" width="60px"></td>
                    <td><?php echo $row['food_price']; ?></td>
                    <td><?php echo $row['quantity']; ?></td>
                    <td><?php echo $row['category']; ?></td> 
                  </tr>
                  <?php
    }
    ?>
                </tbody>
              </table>
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
    <!-- Data table plugin-->
    <script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="js/plugins/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
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
  </body>
</html>
