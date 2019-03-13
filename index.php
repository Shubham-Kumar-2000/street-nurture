<?php
require("includes/common.php");?>
<!DOCTYPE html>
<html>
<head>
	<title>Welcome | Street Nurture</title>
	<link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
	<link rel="stylesheet" type="text/css" href="street.css">
        <link href="css/style.css" rel="stylesheet">
</head>
<body>
<?php
        include 'includes/header.php';
        ?>
<div class="container">
	
	<div class="row">
		<div class="col-lg-12">
			<div id="content">
			<h1>Street Nurture</h1>
			<h3>The Only Road-Maintenance App</h3>
			<hr>
                        <a href="complain.php"><button class="btn btn-default btn-lg"><i class="fas fa-journal-whills"></i> Lodge Complaint!</button></a>
                        <h4>OR</h4>
                        <form action="scearch.php" method="POST">
                            <div class="form-group container">
                                <input type="text" class=" col-xs-10"  placeholder="Enter complain id :" name="cid" required = "true" style="height:  35px"><button type="submit" name="submit" class="btn btn-primary col-xs-2" style="float: left"><span class = "glyphicon glyphicon-search"></span></button>
                                    </div>
                        </form><?php echo $_GET['m']; ?>
			</div>
		</div>
	</div>
	
</div>
    <br>
    <br>
    <br>

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<?php
        include 'includes/footer.php';
        ?>
</body>
</html>