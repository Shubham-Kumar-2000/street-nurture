<?php
require("includes/common.php");
$m3="WORNG CEREDENTIALS";
if (isset($_SESSION['email'])) {
    header('location: index.php');
}
  $otp = $_POST['otp'];
  $otp = mysqli_real_escape_string($con, $otp);
  $otp = MD5($otp);
  $email=$_GET['e'];
  $email=mysqli_real_escape_string($con, $email);
    $query = "SELECT * FROM temp WHERE email='$email' AND otp='$otp'";
    $result = mysqli_query($con, $query)or die(mysqli_error($con));
    $res= mysqli_fetch_array($result);
  $num = mysqli_num_rows($result);
  
  if($num==1)
  { $query = "INSERT INTO users(name, email, password, contact, address)VALUES('" . $res['name'] . "','" . $email . "','" . $res['password'] . "','" . $res['contact'] . "','" . $res['address'] . "')";
    mysqli_query($con, $query) or die(mysqli_error($con));
    $user_id = mysqli_insert_id($con);
    $_SESSION['email'] = $email;
    $_SESSION['user_id'] = $user_id;
    $query = "DELETE FROM temp WHERE email='$email' ";
    $res = mysqli_query($con, $query) or die($mysqli_error($con));
     header('location: index.php');
  }
  else
      header('location: verify.php?e=' . $email . '&m=' . $M3);
?>


