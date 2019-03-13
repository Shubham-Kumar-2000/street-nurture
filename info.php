<?php
require("includes/common.php");
if (!isset($_SESSION['email'])) {
    header('location: index.php');
}
$email=$_SESSION['email'];
$query="select * from users where email='$email'";
$result= mysqli_query($con, $query)or die($mysqli_error($con));
$res= mysqli_fetch_array($result);
$name=$res['name'];
?>
<!DOCTYPE html>
<html>
       <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Info | Street Nurture</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
        <br><br><br><br>
        <div class="container-fluid" id="content">
            <?php include 'includes/header.php'; ?>
        <div class="container">
        <div class=" lp panel panel-primary">
            <div class="panel-heading">
             <?php echo "<h4>Hello $name<h4>"; ?>
            </div>
            <div class="panel-body">
                <div class="row"><div class="col-sm-2" ><h5>Email-Id :</h5></div>
                    <div class="col-sm-10" ><h6><?php $name=$res['email'];echo $name;?></h6></div></div>
               
               <div class="row"> <div class="col-sm-2" ><h5>Contact :</h5></div>
                <div class="col-sm-10" ><h6><?php $name=$res['contact'];echo $name;?></h6></div></div>
                
               
                
               <div class="row"> <div class="col-sm-2" ><h5>Address :</h5></div>
                <div class="col-sm-10" ><h6><?php $name=$res['address'];echo $name;?></h6></div></div>
            </div>
            <div class="panel-footer"><a href="settings.php?error=" class="btn btn-danger btn-lg active">Settings</a></div>
        </div>
            <p><h3>Orders</h3></p>
        <div class="itlist table-responsive">
            <table class="table table-striped table-hover">
    
                        <!--show table only if there are items added in the cart-->
                        <?php
                        $sum = 0;
                        $user_id = $_SESSION['user_id'];
                        $query = "SELECT  cid,address,status,type FROM complains WHERE id='$user_id' ";
                        $result = mysqli_query($con, $query)or die(mysqli_error($con));
                        if (mysqli_num_rows($result) >= 1) {
                            ?>
                            <thead>
                                <tr>
                                    <th>Complain Id</th>
                                    <th>Area</th>
                                    <th>Type</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($row = mysqli_fetch_array($result)) {
                                    
                                    $id = $row["id"] . ", ";
                                    $s=$row['status'];
                                    if($s==0)
                                        $s="Report acquired";
                                    else if($s==1)
                                        $s="Work on progress";
                                    else {
                                        
                                    $s="Reported problem has been resolved";}
                                    echo "<tr><td>" . "#" . $row["cid"] . "</td><td>" . $row["type"] . "</td><td>" . $row["address"] . "</td><td>" . $s . "</td></tr>";
                                }
                                ?>
                            </tbody>
                            <?php
                        } else {
                            echo "No Complains till now!";
                        }
                        ?>
                        <?php
                        ?>
                    </table>
        </div>
        </div>
             <?php include 'includes/footer.php'; ?>
        </div>
    </body>
</html>
          





