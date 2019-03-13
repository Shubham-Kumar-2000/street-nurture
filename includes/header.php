<script src='myjs.js'></script>
		<link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">

<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
        <a class="navbar-left" href="index.php"><img src="ii.png" alt="" style="height :50px" style="float:left" class="ima"></a>
        <ul class="nav navbar-nav navbar-left">

            <li><a class=" desk" href="index.php"><div class="desk nav" style="font-size: 20px">Street Nurture</div></a></li>
        </ul>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right ">
        <li><a href="about.php">About</a></li>
        <li class=""><a href="complain.php">Complaint</a></li>
        <?php
                error_reporting(E_ERROR | E_PARSE);
                if (!isset($_SESSION['email'])) {
                    ?>
        <li><a href="auth.php"><i class="fas fa-user-tie"></i>User</a></li>
        <?php
                } else {
                    ?>
        <li><a href = "info.php"><span class = "glyphicon glyphicon-user"></span> Info</a></li>
                    <li><a href = "logout_script.php" ><span class = "glyphicon glyphicon-log-in"></span> Logout</a></li> <?php
                    }
                    ?>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-->
</nav>	

<style>
    .ima{
        padding-bottom: 0px;
        padding-left: 0px;
        margin-bottom: 0px;
        margin-left: 0px;
    }
    @media(max-width: 468px){
    .desk {
        display: none;
        visibility: hidden;
    }
}
</style>