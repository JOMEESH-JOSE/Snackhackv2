<?php
include 'man_header.php';
include 'db.php';
$sq = "SELECT payment_id,id,P_Amount,P_status,DATE(order_time) as date,TIME(order_time) as time FROM `tbl_payment` WHERE P_status='NOTPAID'";
$q2 = mysqli_query($conn, $sq);
?>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="app-menu__icon fa fa-money"></i>Payment Action</h1>
            <!-- <p>A free and open source Bootstrap 4 admin template</p> -->
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="#">Payment Action</a></li>
        </ul>
    </div>

    <div class="col-md-12">
        <div class="tile">
            <h3 class="tile-title">Action Table</h3>
            <table class="table table-bordered">
                <thead class="table-light">
                    <th>Table number</th>
                    <th>Order_id</th>
                    <th>Amount</th>
                    <th>Order Time</th>
                    <th>Order Date</th>
                    <th>Payment Status</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_array($q2)) { ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['payment_id']; ?></td>
                            <td><?php echo $row['P_Amount']; ?></td>
                            <td><?php echo $row['time']; ?></td>
                            <td><?php echo $row['date']; ?></td>
                            <td><span class="badge badge-danger"><?php echo $row['P_status']; ?></span></td>
                            <td><a href="payment_update.php?a_id=<?php echo $row['payment_id'];?>"><Button type="submit" class="btn btn-">PAY</Button></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
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
    if (document.location.hostname == 'pratikborsadiya.in') {
        (function(i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function() {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
        ga('create', 'UA-72504830-1', 'auto');
        ga('send', 'pageview');
    }
</script>
</body>

</html>