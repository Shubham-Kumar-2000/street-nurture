<?php
require("includes/common.php");
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
    <body>
        <br><br><br><br>
        <div class="container-fluid" id="content">
            <?php include 'includes/header.php'; ?>
        <div class="container">
        <div class=" lp panel panel-primary">
            <div class="panel-heading">
             VERIFY EMAIL 
            </div>
            <div class="panel-body">
               <?php $email= $_GET['e'];
               echo $email;?>
                  <form  action=<?php $email= $_GET['e'];
                 echo "verify_script.php?e=$email";?> method="POST">
                            
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="OTP" pattern=".{6,}" name="otp" required = "true">
                            </div>
                            
                            <button type="submit" name="submit" class="btn btn-primary">VERIFY</button>
                        </form>
                <?php                  echo $_GET['m'];?>
            </div>
            
        </div>
        </div>
        <?php include("includes/footer.php"); ?>
    </body>
</html>

