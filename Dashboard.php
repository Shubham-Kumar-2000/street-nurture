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
                            
                        
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        	
        <title>Dashboard | Street Nurture</title>
        <!-- Bootstrap Core CSS -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="css/style.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="street.css">
        <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body style="padding-top: 50px;">
        <?php include 'includes/header.php';
        $query = "SELECT cid,contact,address,des from complains where status = 0";
                        $result = mysqli_query($con, $query)or die(mysqli_error($con));
                        $n1=mysqli_num_rows($result);
                        
                        $query = "SELECT cid,contact,address,des from complains where status = 1";
                        $result = mysqli_query($con, $query)or die(mysqli_error($con));
                        $n2=mysqli_num_rows($result);
                        
                        $query = "SELECT cid,contact,address,des from complains where status = 2";
                        $result = mysqli_query($con, $query)or die(mysqli_error($con));
                        $n3=mysqli_num_rows($result);
        
        
        
                        ?><br>
                        <br>
                        <br>
        <div class="row">
            <div class="col-sm-4" ><div class=" jumbotron"><center> <h1>Reported
                    </h1><p>Recent reported problems</p>
                    <a  href="Dashboard.php?m=0" class="btn btn-danger active"><?php echo $n1;?> <span class = "glyphicon glyphicon-eye-open"></span></a>
                    </center></div></div>
            <div class="col-sm-4" ><div class=" jumbotron"><center><h1>Progressing
                    </h1><p>Work on Progress</p>
                     <a  href="Dashboard.php?m=1" class="btn btn-warning active"><?php echo $n2;?> <span class = "glyphicon glyphicon-eye-open"></span></a>
                    </center></div></div>
            <div class="col-sm-4" ><div class=" jumbotron"> <center> <h1>Resolved
                    </h1><p>Already resolved problems</p>
                   <a  href="Dashboard.php?m=2" class="btn btn-success active"><?php echo $n3;?> <span class = "glyphicon glyphicon-eye-open"></span></a>
                    </center></div></div>
           </div>
        <h3><?php 
         $m=$_GET['m'];if($m==0)
            $a="Reported Problems";
        else                            if ($m==1)
           $a="Work on progress";
        else $a="Resolved Problems";
        echo $a;?>
        </h3>
        
    
                        <!--show table only if there are items added in the cart-->
                        <?php
                        $sum = 0;
                        $user_id = $_SESSION['user_id'];
                        $m=$_GET['m'];
                        if($m==0)
                        $query = "SELECT cid,contact,address,des,type from complains where status = 0";
                        else                            if ($m==1)
                         $query = "SELECT cid,contact,address,des,type from complains where status = 1";
                     else {$query = "SELECT cid,contact,address,des,type from complains where status = 2";
                         
}
                        $result = mysqli_query($con, $query)or die(mysqli_error($con));
                        if (mysqli_num_rows($result) >= 1) {
                            ?>
                                <?php
                             while ($row = mysqli_fetch_array($result)) {
                                 if($m==0) {?>
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                                    <div class='container thumbnail' style='margin-top: 5px'>
                                        <div class='cid'> Complain Id :  <?php echo $row['cid'];?></div>
                                        <h3 style="color: black"><?php echo $row['type'];?></h3><p>
                                        <?php echo $row['des'];?><p>
                                        <center>  <img  src=<?php $c=$row['cid']; echo "'uploads/$c.jpg'";?> class="skc"></center><br>
                                            <span style="float : left"> Contact : <?php echo $row['contact'];?></span>
                                            <a style="float : right" href=<?php echo "'upgrade.php?id={$row['cid']}&to=2'";?> class="btn btn-success">Problem resolved</a>
                                            <a style="float : right" href=<?php echo "'upgrade.php?id={$row['cid']}&to=1'"; ?>class="btn btn-warning ma">Work in progress</a>
                                            </div><br><br>
                                   
                                            
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    <?php
                                 }
                                    else if($m==1)
                                    {?><div class='container thumbnail' style='margin-top: 5px'>
                                        <div class='cid'> Complain Id :  <?php echo $row['cid'];?></div>
                                        <h3 style="color: black"><?php echo $row['type'];?></h3><p>
                                        <?php echo $row['des'];?><p>
                                        <center>  <img  src=<?php $c=$row['cid']; echo "'uploads/$c.jpg'";?> class="skc"></center><br>
                                            <span style="float : left"> Contact : <?php echo $row['contact'];?></span>
                                                          <a style="float : right" href=<?php echo "'upgrade.php?id={$row['cid']}&to=2'";?> class="btn btn-success">Problem resolved</a></div><br><br>
                                    <?php }else {?>
                                                          <div class='container thumbnail' style='margin-top: 5px'>
                                        <div class='cid'> Complain Id :  <?php echo $row['cid'];?></div>
                                        <h3 style="color: black"><?php echo $row['type'];?></h3><p>
                                        <?php echo $row['des'];?><p>
                                        <center>  <img  src=<?php $c=$row['cid']; echo "'uploads/$c.jpg'";?> class="skc"></center><br>
                                            <span style="float : left"> Contact : <?php echo $row['contact'];?></span>
                                             <a style="float : right" href=<?php echo "'del.php?id={$row['cid']}'";?> class="btn btn-danger">Delete</a></div><br><br>
                                            
                                <?php        
                                }
                                    }?>
                           <?php
                        }
 else {
     ?>
                        <h3>No Data to show.</h3><?php
 }
 include 'includes/footer.php';                           
 ?>
                        
 </body>
</html>