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
          <button type="button" class="btn btn-" onclick="printDiv('print')" >PDF</button>
            <div class="tile-body" id="print">
              
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

    <!-- print screen -->
    <script type="text/javascript">
      function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
    </script>
  </body>
</html>
