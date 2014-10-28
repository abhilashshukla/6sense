<?php
/*
 * File: index.php
 * Created on 10-Oct-2014
 * Created By: Abhilash Shukla
 */
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Abhilash Shukla">
    <link rel="shortcut icon" href="<?php echo APP_IMAGES; ?>favicon.ico">

    <title>6sense</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo APP_CSS; ?>bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo APP_CSS; ?>fonts.css" rel="stylesheet">
    <link href="<?php echo APP_CSS; ?>main.css" rel="stylesheet">

    <!-- Fonts from Google Fonts 
	<link href='http://fonts.googleapis.com/css?family=Lato:300,400,900' rel='stylesheet' type='text/css'>-->
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="<?php echo APP_JS; ?>html5shiv.js"></script>
      <script src="<?php echo APP_JS; ?>respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <!-- Fixed navbar -->
    <div class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><b>6SENSE</b></a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Already a member?</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

	<div id="headerwrap">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<h1>An intelligent framework doing great things</h1>
					<form class="form-inline" role="form">
					  <div class="form-group">
					    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter your email address">
					  </div>
					  <button type="submit" class="btn btn-warning btn-lg">Register Me</button>
					</form>					
				</div><!-- /col-lg-6 -->
				<div class="col-lg-6">
					<img class="img-responsive" src="<?php echo APP_IMAGES; ?>ipad-hand.png" alt="">
				</div><!-- /col-lg-6 -->
				
			</div><!-- /row -->
		</div><!-- /container -->
	</div><!-- /headerwrap -->
	
	
	<div class="container">
		<div class="row mt centered">
			<div class="col-lg-6 col-lg-offset-3">
				<h1>Your Landing Page<br/>Looks Wonderful Now.</h1>
				<h3>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</h3>
			</div>
		</div><!-- /row -->
		
		<div class="row mt centered">
			<div class="col-lg-4">
				<img src="<?php echo APP_IMAGES; ?>ser01.png" width="180" alt="">
				<h4>1 - Take your Organization on Web</h4>
				<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever.</p>
			</div><!--/col-lg-4 -->

			<div class="col-lg-4">
				<img src="<?php echo APP_IMAGES; ?>ser03.png" width="180" alt="">
				<h4>2 - Create Forms & Define Logic</h4>
				<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever.</p>

			</div><!--/col-lg-4 -->

			<div class="col-lg-4">
				<img src="<?php echo APP_IMAGES; ?>ser02.png" width="180" alt="">
				<h4>3 - Create Campaigns and Engage</h4>
				<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever.</p>

			</div><!--/col-lg-4 -->
		</div><!-- /row -->
	</div><!-- /container -->
	
	<div class="container">
		<hr>
		<div class="row centered">
			<div class="col-lg-6 col-lg-offset-3">
				<form class="form-inline" role="form">
				  <div class="form-group">
				    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter your email address">
				  </div>
				  <button type="submit" class="btn btn-warning btn-lg">Register Now</button>
				</form>					
			</div>
			<div class="col-lg-3"></div>
		</div><!-- /row -->
		<hr>
	</div><!-- /container -->
	
	<div class="container">
		<div class="row mt centered">
			<div class="col-lg-6 col-lg-offset-3">
				<h1>6sense is for Everyone.</h1>
				<h3>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</h3>
			</div>
		</div><!-- /row -->
	
		<! -- CAROUSEL -->
		<div class="row mt centered">
			<div class="col-lg-6 col-lg-offset-3">
				<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
				  <!-- Indicators -->
				  <ol class="carousel-indicators">
				    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
				    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
				    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
				  </ol>
				
				  <!-- Wrapper for slides -->
				  <div class="carousel-inner">
				    <div class="item active">
				      <img src="<?php echo APP_IMAGES; ?>p01.png" alt="">
				    </div>
				    <div class="item">
				      <img src="<?php echo APP_IMAGES; ?>p02.png" alt="">
				    </div>
				    <div class="item">
				      <img src="<?php echo APP_IMAGES; ?>p03.png" alt="">
				    </div>
				  </div>
				</div>			
			</div><!-- /col-lg-8 -->
		</div><!-- /row -->
	</div><! --/container -->
	
	<div class="container">
		<hr>
		<div class="row centered">
			<div class="col-lg-6 col-lg-offset-3">
				<form class="form-inline" role="form">
				  <div class="form-group">
				    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter your email address">
				  </div>
				  <button type="submit" class="btn btn-warning btn-lg">Invite Me!</button>
				</form>					
			</div>
			<div class="col-lg-3"></div>
		</div><!-- /row -->
		<hr>
		<p class="centered">Created by <a href="http://www.abhilashshukla.info" target="_blank">Abhilash Shukla</a> - Copyright (C) 2014 <a href="http://opensource.org/licenses/GPL-3.0" target="_blank">GNU General Public License</a></p>
	</div><!-- /container -->
	

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo APP_JS; ?>jquery.min.js"></script>
    <script src="<?php echo APP_JS; ?>bootstrap.min.js"></script>
  </body>
</html>

