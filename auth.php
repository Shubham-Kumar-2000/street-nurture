<?php
require("includes/common.php");

// Redirects the user to products page if he/she is logged in.
if (isset($_SESSION['email'])) {
  header('location: check.php');
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Authorize | Street Nurture</title>
        <!-- Bootstrap Core CSS -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="css/style.css" rel="stylesheet">
        <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body style="padding-top: 75px;" >
        <!-- Header -->
        <?php
        include 'includes/header.php';
        ?>
        
        <!--Header end-->
        <div class=" body itlist" >
        <div class="container">  <div class="jumbotron home-spacer" id="products-jumbotron">
                <h1>Login or Register
        </h1>

            </div>
    <div style="float: left" class="col-xs-offset-4 col-xs-4 col-sm-offset-3 col-sm-2 buttoon btn btn-danger btn-lg active"onclick="myFunction(0)">Login</a></div>
 <div style="float: left"class="col-xs-offset-4 col-xs-4 col-sm-offset-2 col-sm-2 buttoon btn1 btn btn-success btn-lg active" onclick="myFunction(1)">Signup</a></div>
        <!--Footer-->
    </div>
            <?php
$dip='"display : none"';
if($_GET['l']==1)
    $dip='"display : block"';
    ?>
            <div class="pop" style=<?php echo $dip;?> id="log">
            <div class="container-fluid decor_bg" id="login-panel">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <div class="container-fluid decor_bg" id="login-panel">
                        <div class="panel panel-primary pop1" >
                            <div class="panel-heading">
                                <h4>LOGIN<span style="float: right" class="glyphicon glyphicon-remove btn" onclick="my()"></span></h4> 
                            </div>
                            <div class="panel-body">
                                <p class="text-warning"><i>Login to make a purchase</i><p>
                                <form action="login_submit.php" method="POST">
                                    <div class="form-group">
                                        <input type="email" class="form-control"  placeholder="Email" name="e-mail" required = "true">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="Password" name="password" required = "true">
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-primary">Login</button><br><br>
                                    <?php echo $_GET['error']; ?>
                                </form><br/>
                            </div>
                            <div class="panel-footer"><p>Don't have an account? <a href="index.php?s=1">Register</a></p></div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
           </div>
        <?php
$dip='"display : none"';
if($_GET['s']==1)
    $dip='"display : block"';
    ?>
            <div class="pop" style=<?php echo $dip;?>  id="sig">
                <div class="container-fluid decor_bg" id="login-panel" style="height : 100%">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <div class="container-fluid decor_bg" id="login-panel">
                         <div class="panel panel-primary" >
                             <div class="panel-heading">
                                 <h2>SIGN UP<span style="float: right" class="glyphicon glyphicon-remove btn" onclick="my()"></span></h2></div>
                             <div class="panel-body">
                        <form  action="signup_script.php" method="POST">
                            <div class="form-group">
                                <input class="form-control" placeholder="Name" name="name"  required = "true" pattern="^[A-Za-z\s]{1,}[\.]{0,1}[A-Za-z\s]{0,}$">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control"  placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$"  name="e-mail" required = "true"><?php echo $_GET['m1']; ?>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control"  placeholder="Contact" maxlength="10" size="10" name="contact" required = "true"><?php echo $_GET['m2']; ?>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Password" pattern=".{6,}" name="password" required = "true">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Address"  name="address" required = "true">
                            </div>
                            
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        </form></div>
                         </div></div>
                </div>
            </div>
        </div>
       </div> 
        </div>
        <?php
        include 'includes/footer.php';
        ?>
        <!--Footer end-->
      
        <style>
            @media(max-width: 475px){
    .desk {
        visibility: hidden;
    }
    .pop {
    position: static;

    width: 100%;
}
}
        </style>
    </body> 
</html>