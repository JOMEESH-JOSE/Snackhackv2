<?php
$tb = $_GET['tb'];

?>

<html>
    <head>
        <title>Acess Denied</title>
        <style>
            .body{
               width: 100%;
               height: 100%;
            }
            .pay-box{
                position: absolute;
                background-color: whitesmoke;
                width: 40%;
                height: 40%;
                margin: 10% 50% 30% 30%;
                padding: 30px;
                box-shadow: 0 15px 15px 0;
                border-radius:10px;
            }.conts{
                margin: 0 0 0 0;
            }.pay-box:hover{
                border: 2px solid lawngreen;
                border-radius:10px;
            }
            .conts h2,p,h4{
                text-align: center;
            }.cust-btn{
                text-align: center;
                margin: 2% 0 0 32%;
                width: 200px;
                background-color:#7BE3F8;
                border-radius:10px;
                padding:10px 30px 10px 30px;
                border: none;
                color:black;
                font-weight:bold;
            }.bottomtext{
                text-align: center;
                margin: 2% 0 0 0;
            }.cust-btn:hover{
                background-color: #57F8DD ;
                color:red;
                font-style: italic;
                font-weight: bold;
            }
        </style>
    </head>
    <body>
        <container>
            <div class="pay-box">
                <div class="conts">
                <h2>Waiting For the Action</h2>
               
                
                <div class="paybtn">
                    <button class="cust-btn" type="submit" onclick="return set();">Wait</button>
                </div>
                <div class="bottomtext">
                    <text>please Contact The Receptionist</text>
                </div>
                </div>
            </div>
        </container>
    </body>
</html>
<script>
    function set(){
        location="index.php?t_id=<?php echo $tb; ?>";
    }
</script>