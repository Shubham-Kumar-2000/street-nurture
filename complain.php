<?php
require("includes/common.php");
if (isset($_SESSION['email'])) {;
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Complaint Forums | Street Nurture</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <style>
            body{
                padding: 50px;
	background: url(complain.jpg);
	background-size: cover;
	background-position: center;
	font-family: Lato;
            }
            h1{
                color: whitesmoke;
            }
        </style>
    </head>
    <body>
        <br><br><br><br>
        <?php include 'includes/header.php'; ?>
        <div class="container-fluid decor_bg" id="content">
            <div class="row">
                <div class="container">
                        <h1>Complaint Forum</h1>
                        <br><br>
                        <form  action="complain_script.php" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <select class="form-control" placeholder="Problem Type" name="name"  required = "true">
                                
                                <option value="0">Problem Type</option>
                                <option value="Obstruction on Road">Obstruction on Road</option>
                                <option value="Pot holes">Pot holes</option>
                                <option value="Water logging">Water logging</option>
                                <option value="Accidents">Accidents</option>
                                <option value="LandSlides">LandSlides</option>
                                <option value="RoadWorks">RoadWorks</option>
                                <option value="Poor Traffic Management">Poor Traffic Management</option>
                                <option value="Footpath Miss use">Footpath Miss use</option>
                                <option value="Others">Others</option>
                                </select><?php echo $_GET['m1']; ?>

                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control"  placeholder="Contact" maxlength="10" size="10" name="contact" required = "true"><?php echo $_GET['m3']; ?>
                            </div>
                            <div class="form-group">
                            <?php include 'map1.php';?></div>
                            <div class="form-group">
                                <input  type="text" class="form-control"  placeholder="Description" name="des" required = "true">
                            </div>
                            <div class="form-group">
                                <input type="file" name="fileToUpload" id="fileToUpload"><?php echo $_GET['m2']; ?>
                            </div>
                            <div class="g-recaptcha" data-sitekey="6Ld5HYwUAAAAANrECA-gGO98P86fil2RHbLUvQb4"></div><br><?php echo $_GET['m']; ?><br>
                                   
                            
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        </form><br>
                        <br>
                        <br>
                    </div>
                </div>
            </div>
        </div>
        <?php include "includes/footer.php"; ?>
        <script src='https://www.google.com/recaptcha/api.js'></script>
    </body>
</html>