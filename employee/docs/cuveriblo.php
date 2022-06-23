<?php

include 'db.php';
$em = $_GET['eml'];
session_start();
// $bid = $_POST['email'];
$ap1 = mysqli_query($conn, "SELECT * FROM `user_registration_tb` join login_tb on login_tb.Lg_id = `user_registration_tb`.`login-id` where user_registration_tb.email= '$em'");
while ($row = mysqli_fetch_array($ap1)) {
  
  $name = $row['name'];
 
}

// Import PHPMailer classes into the global namespace 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

$mail = new PHPMailer;

$mail->isSMTP();                      // Set mailer to use SMTP 
$mail->Host = 'smtp.gmail.com';       // Specify main and backup SMTP servers 
$mail->SMTPAuth = true;               // Enable SMTP authentication 
$mail->Username = 'hacksnack55@gmail.com';   // SMTP username 
$mail->Password = 'hzqqyrjcojoytjau';   // SMTP password 
$mail->SMTPSecure = 'tls';            // Enable TLS encryption, `ssl` also accepted 
$mail->Port = 587;                    // TCP port to connects to 

// Sender info 
$mail->setFrom('sender@snackhack.com', 'Snackhack');
$mail->addReplyTo('reply@snackhack.com', 'Snackhack');
// Add a recipient 
$mail->addAddress($em);

//$mail->addCC('cc@example.com'); 
//$mail->addBCC('bcc@example.com'); 

// Set email format to HTML 
$mail->isHTML(true);

// Mail subject 
$mail->Subject = 'Email from Snackhack';

// Mail body content 
$bodyContent .= '<html>
<head>
<meta charset="utf-8">
</head>

<body background="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS4hVvyxHSVWVWGu8Uqq1bOi0x7KAhUG22svA&usqp=CAU" style="background-size: cover;">
    <center>
<h1 style="margin-top: 50px;">Welcome to Snackhack Supporting Community</h1>
<p>Hi,' . $name . '</p>
<p>You have been Blocked by admin....!</p>
<p>Please  communicate with admin for the reason</p>
<div style="margin-top:30px">
Explore from here--->> <a href="http://localhost/employee/docs/page-login.php">Snackhack</a></div>
</center>
</body>
</html>';
$mail->Body    = $bodyContent;

// Send email 
if (!$mail->send()) {
  echo 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
} else {
  echo 'Message has been sent.';
}
header("location:view_customer.php");
?>