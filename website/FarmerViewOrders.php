<?php require_once("includes/session.php"); ?>
<?php

$htmlTableOut="";

$htmlTableOut.="<table width='1100px;'>";
$htmlTableOut.="<tr>";
$htmlTableOut.="<td><b>Date Ordered</b></td>";
$htmlTableOut.="<td><b>Consumer Name</b></td>";
$htmlTableOut.="<td><b>Lat/Lon</b></td>";
$htmlTableOut.="<td><b>Dist.</b></td>";
$htmlTableOut.="<td><b>Category</b></td>";
$htmlTableOut.="<td><b>Description</b></td>";
$htmlTableOut.="<td><b>Order Quantity</b></td>";
$htmlTableOut.="<td><b>Unit Price</b></td>";
$htmlTableOut.="<td><b>Total Cost</b></td>";
$htmlTableOut.="</tr>";
		
				$userName=$_SESSION['username'];
				
				
				$file = fopen("orders/consumer_order.txt","r");

				while(! feof($file))
				{
				  //echo fgets($file). "<br />";
				  
				  $fileLine=fgets($file);
				  
				  $arr=explode(',',$fileLine);
				  
				  $date=$arr[0];
				  $consumerUsername=$arr[1];
				  $orderQuantity=$arr[2];
				  $transferOption=$arr[3];
				  $farmerUsername=$arr[4];
				  $prodcutCat=$arr[5];
				  $prodcutDesc=$arr[6];
				  $price=$arr[7];
				  $totalCost=$arr[8];
				  
				
				
				  
					//echo $fileLine. "<br/>";
				
						// GET CONSUMER DATA FILE
						
						$userAccountData=file_get_contents("user_accounts/un_$consumerUsername.txt");
						$arr=explode(',',$userAccountData);
						
						$lat=$arr[4];
						$lon=$arr[5];
				
				if ($farmerUsername == $userName)		
				{
						$htmlTableOut.="<tr>";
						$htmlTableOut.="<td>$date</td>";
						$htmlTableOut.="<td>$consumerUsername</td>";
						$htmlTableOut.="<td>$lat/$lon</td>";
						$htmlTableOut.="<td>...km</td>";
						$htmlTableOut.="<td>$prodcutCat</td>";
						$htmlTableOut.="<td>$prodcutDesc</td>";
						$htmlTableOut.="<td>$orderQuantity</td>";
						$htmlTableOut.="<td>$price</td>";
						$htmlTableOut.="<td>$totalCost</td>";
						$htmlTableOut.="</tr>";
				}	
				
				}
				
				fclose($file);
		

$htmlTableOut.="</table>";
?>

<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>SOMO</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Harvest Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- js -->
<script src="js/jquery-1.11.1.min.js"></script>
<!-- //js -->
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->
<!-- pop-up-box -->
	<link rel="stylesheet" type="text/css" href="css/jquery.lightbox.css">
	<script src="js/jquery.lightbox.js"></script>
	<script>
	  // Initiate Lightbox
	  $(function() {
		$('.product-gd1 a').lightbox(); 
	  });
	</script>
<!-- //pop-up-box -->
<!-- menu -->
<link href="css/component.css" rel="stylesheet" type="text/css"  />
<!-- //menu -->
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Josefin+Sans:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic' rel='stylesheet' type='text/css'>
</head>
	
<body class="cbp-spmenu-push">
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
ga('create', 'UA-30027142-1', 'w3layouts.com');
  ga('send', 'pageview');
</script>
<!-- header -->
	<div class="header-top">
		<div class="container">
			<div class="header-top-left">
				<p>Live Local Impact Global</p>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	<div class="header">
		<div class="container">
			<div class="top-nav">
					<nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s2">
						<h3>Menu</h3>
						<ul>
							<li><a href="index.php">Home</a></li>
							<li><a href="#about" class="scroll">About</a></li>
							<li><a href="#products" class="scroll">Products</a></li>
							<li><a href="#mail" class="scroll">Mail Us</a></li>
						</ul>
					</nav>
					<div class="main buttonset">	
							<!-- Class "cbp-spmenu-open" gets applied to menu and "cbp-spmenu-push-toleft" or "cbp-spmenu-push-toright" to the body -->
							<button id="showRightPush"><img src="images/menu.png" alt=""/></button>
							<!--<span class="menu"></span>-->
					</div>
					<!-- Classie - class helper functions by @desandro https://github.com/desandro/classie -->
					<script src="js/classie.js"></script>
					<script>
					var menuRight = document.getElementById( 'cbp-spmenu-s2' ),
					showRightPush = document.getElementById( 'showRightPush' ),
					body = document.body;

					showRightPush.onclick = function() {
						classie.toggle( this, 'active' );
						classie.toggle( body, 'cbp-spmenu-push-toleft' );
						classie.toggle( menuRight, 'cbp-spmenu-open' );
						disableOther( 'showRightPush' );
					};

					function disableOther( button ) {
						if( button !== 'showRightPush' ) {
							classie.toggle( showRightPush, 'disabled' );
						}
					}
				 </script>
			</div>
			<div class="logo">
				<!--<a href="index.php"><i class="glyphicon glyphicon-grain" aria-hidden="true"></i>SOMO<span>From Soil To Mouth</span></a>-->
				
				<img src="images/SOMO_LOGO.jpg" alt=" "  />
				<font size="12" color="#D5D887"> <b>SOMO</b></font>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
<!-- //header -->
<!-- welcome -->
	<div class="welcome">
		<div class="container">
			<div class="col-md-6 welcome-right">
				<h3><span>View Orders</span></h3>
				<p>View Orders Recevied From Consumers</p>
				
				
				<br/><br/>
				<?php
						echo($htmlTableOut);
				?>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
<!-- //welcome -->

<!-- footer -->
	<div class="footer">
		<div class="footer-grids">
		  <div class="container">
			<div class="col-md-3 footer-grid">
				<h4>Services</h4>
				<ul>
					<li><a href="#"></a></li>
				</ul>
			</div>
			<div class="col-md-3 footer-grid">
				<h4>Information</h4>
				 <ul>
					<li><a href="#"></a></li>
				</ul>
			</div>
			<div class="col-md-3 footer-grid">
				<h4>More details</h4>
				<ul>
					<li><a href="#"></a></li>
				</ul>
			</div>
			 <div class="col-md-3 footer-grid contact-grid">
					<h4>Contact us</h4>
					<ul>
						<li><span class="c-icon"> </span>Trust Square.</li>
						<li><span class="c-icon1"> </span><a href="mailto:somoagrofood@gmail.com">somoagrofood@gmail.com</a></li>
						<li><span class="c-icon2"> </span>Room 1.12</li>
					</ul>
			 </div>
			 <div class="clearfix"></div>
		 </div>
		</div>
	</div>
	<div class="copy">
		 <p>Copyright © 2019 SOMO. All rights reserved</p>
	</div>
<!-- //footer -->
<!-- for bootstrap working -->
		<script src="js/bootstrap.js"> </script>
<!-- //for bootstrap working -->
</body>
</html>