<?php

require("includes/common.php");

  // Getting the values from the signup page using $_POST[] and cleaning the data submitted by the user.
  $name = $_POST['name'];
  $name = mysqli_real_escape_string($con, $name);

  $email = $_POST['e-mail'];
  $email = mysqli_real_escape_string($con, $email);

  $password = $_POST['password'];
  $password = mysqli_real_escape_string($con, $password);
  $password = MD5($password);
  $otp = rand (100000, 999999);
  $otps=$otp;
  $otp = mysqli_real_escape_string($con, $otp);
  $otp = MD5($otp);

  $contact = $_POST['contact'];
  $contact = mysqli_real_escape_string($con, $contact);



  $address = $_POST['address'];
  $address = mysqli_real_escape_string($con, $address);

  $regex_email = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";
  $regex_num = "/^[6789][0-9]{9}$/";

  $query = "SELECT * FROM users WHERE email='$email'";
  $result = mysqli_query($con, $query)or die(mysqli_error($con));
  $num = mysqli_num_rows($result);
  

if ($num != 0) {
    $m = "<span class='red'>Email Already Exists</span>";
    header('location: auth.php?m1=' . $m . '&m2=&s=1');
  } else if (!preg_match($regex_email, $email)) {
    $m = "<span class='red'>Not a valid Email Id</span>";
    header('location: auth.php?m1=' . $m . '&m2=&s=1');
  } else if (!preg_match($regex_num, $contact)) {
    $m = "<span class='red'>Not a valid phone number</span>";
    header('location: auth.php?m2=' . $m . '&m1=&s=1');
  } else {
    $mailb= "Your otp in Street Nurture is $otps";
    $query = "INSERT INTO temp(name, email, password, contact, address, otp)VALUES('" . $name . "','" . $email . "','" . $password . "','" . $contact . "','" . $address . "','" . $otp . "')";
    mysqli_query($con, $query) or die(mysqli_error($con));
   
      require 'PhpMailer-master/src/PHPMailer.php';
  require 'PhpMailer-master/src/SMTP.php';
  require 'PhpMailer-master/src/Exception.php';



    $mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPDebug=0;
    $mail->SMTPAuth= TRUE;
    $mail->SMTPSecure= 'tls';
    $mail->Host= "smtp.gmail.com";
    $mail->Port= 587;
    $mail->Username= "shukhu10@gmail.com";
    $mail->Password= "i loveu69";
    $mail->SetFrom('shukhu10@gmail.com');
    $mail->Subject= "OTP";
    $mail->Body=$mailb;
    $mail->AddAddress($email);
    $Provider= "Google";
if ($mail->Send()) {
   if (isset($_SESSION['email'])) {
    header('location: index.php');
}
?>


<!DOCTYPE html>
<html>
       <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Verify | Street Nurture</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body><br>
        <br>
        <br>
        <br>
        <div class="container-fluid" id="content">
            <?php include 'includes/header.php'; ?>
        <div class="container">
        <div class=" lp panel panel-primary">
            <div class="panel-heading">
            VERIFICATION 
            </div>
            <div class="panel-body">
             <h3>OTP SENT </h3><a href=<?php $f="verify.php?e=" . $email . "&m="; echo $f;?> class="btn btn-success btn-lg active">VERIFY</a>  
             </div>
             </div>
        </div>
        <?php include("includes/footer.php"); ?>
    </body>
</html>

             

<?php
} else {
echo "SERVER ERROR PLEASE TRY AGAIN!!!!!!!!!!!!!!!!!!!!!!!!";}
   
  }

?>