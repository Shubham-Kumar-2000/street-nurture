<?php
require("includes/common.php");?>
<!DOCTYPE html>
<html>
<head>
	<title>Search | Street Nurture</title>
	<link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
	<link rel="stylesheet" type="text/css" href="street.css">
        <link href="css/style.css" rel="stylesheet">
        <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<?php
        include 'includes/header.php';
        
$Id=$_POST['cid'];
$query = "SELECT * FROM complains WHERE cid=" . $Id .  "";
$result = mysqli_query($con, $query)or die(mysqli_error($con));
$num = mysqli_num_rows($result);
if ($num == 0) {
    $m = "<span class='red'>Not a valid complain number or the problem has been solved long ago.</span>";
    header('location: index.php?m=' . $m );
}
 ?>
    <div id="content" class="relat" >
            <div class="container-fluid decor_bg" id="login-panel">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <div class="panel panel-primary" >
                            <div class="panel-heading">
                                <h4>Complain Number : <?php $row = mysqli_fetch_array($result); echo $row['cid'];?></h4>
                                </div>
                            <div class="panel-body">
                                 <div class="row"><div class="col-sm-2" ><h5>Type:</h5></div>
                    <div class="col-sm-10" ><h6><?php $name=$row['type'];echo $name;?></h6></div></div>
                <div class="row"><div class="col-sm-2" ><h5>Emergency Contact number:</h5></div>
                    <div class="col-sm-10" ><h6><?php $name=$row['contact'];echo $name;?></h6></div></div>
                     <div class="row"><div class="col-sm-2" ><h5>Description:</h5></div>
                    <div class="col-sm-10" ><p><?php $name=$row['des'];echo $name;?></p></div></div>
                            <img  src=<?php $c=$row['cid']; echo "'uploads/$c.jpg'";?> class="skc"></center><br>
                            </div>
                            <div class="panel-footer">
                                <?php if($row['status']==0)
     echo '<span style="color : red">Status : Work not started yet.</span>';
     else if ($row['status']==1)
     {echo '<span style="color : #CCCC00">Status : Work in progress.</span>';}
      else {echo '<span style="color : green">Status : problem has been resolved.</span>';}?>

                                </div>
                        </div></div></div></div></div><br>
    <br>
    <br>
    <br>
<?php
include 'includes/footer.php';
?>
</body>
</html>