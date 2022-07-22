
<html>
    <head>
        <title>Finish</title>
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
            <form method="post">
            <div class="pay-box">
                <div class="conts">
                <h2>Thankyou</h2>
                <P>Have a nice day!</P>
                <div class="bottomtext">
                    <text>Stay Safe............</text>
                </div>
                </div>
            </div>
            <input type="hidden" name="amt" value="<?php echo $amount; ?>">
            <input type="hidden" name="tb" value="<?php echo $tb; ?>">
            </form>
        </container>
    </body>
</html>