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
                        $to=$_GET['to'];
                        $query = "SELECT status from complains where cid ='" . $cid. "'";
                        $result = mysqli_query($con, $query)or die(mysqli_error($con));
                        $row = mysqli_fetch_array($result);
                        $m=$row['status'];
                        $query = "UPDATE  complains SET status = '" . $to . "' WHERE cid = '" . $cid . "'";
        mysqli_query($con, $query) or die($mysqli_error($con));
         header('location: Dashboard.php?m='.$m);
         ?>
                        
                        
                        
