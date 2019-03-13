<?php
require("includes/common.php");

// Redirects the user to products page if he/she is logged in.
if (!isset($_SESSION['email'])) {
  header('location: index.php');
  }
  $email = $_SESSION['email'];
  $email = mysqli_real_escape_string($con, $email);
$query = "SELECT id from users where email ='" . $email. "'";
                        $result = mysqli_query($con, $query)or die(mysqli_error($con));
                        $row = mysqli_fetch_array($result);
                        if($row['id']!=1)
                             header('location: index.php');
                        $cid=$_GET['id'];
                        $file=$cid.".jpg";

        unlink($file);
                          $query = "delete from  complains WHERE cid = '" . $cid . "'";
        mysqli_query($con, $query) or die($mysqli_error($con));
         header('location: Dashboard.php?m=2');
         ?>