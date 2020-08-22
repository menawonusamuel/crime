<!--A Design by Samuel Ifeoluwa Menawonu
Author: Samuel Ifeoluwa Menawonu
student number: 1813617
License: Creative Commons Attribution 3.0 Unported

-->
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
		
		<title>Aberdeen Online Crime Reporting System Dashboard | Home :: Samuel Ifeoluwa Menawonu</title>

		<!-- Loading third party fonts -->
		<link href="http://fonts.googleapis.com/css?family=Roboto:300,400,700|" rel="stylesheet" type="text/css">
		<link href="fonts/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link href="fonts/icomoon/style.css" rel="stylesheet" type="text/css">

		<!-- Loading main css file -->
		<link rel="stylesheet" href="index html/style.css">
		
		<!--[if lt IE 9]>
		<script src="js/ie-support/html5.js"></script>
		<script src="js/ie-support/respond.js"></script>
		<![endif]-->

	</head>


	<body style="background-image: url(''); background-repeat: no-repeat; background-position: center;">

		<img src="crime.png" style="width: 100%; position: absolute; opacity: 0.1; top:45%;">
		<div class="site-content">
			<div class="container">
				<main class="main-content">
					<div class="content">
						<header class="site-header">
							<img src="crime.png" width="150" height="100">	
							<a href="" class="logo"><img src="images/logo.png" alt=""></a>
							<div class="header-type">
								<h1>Crime in United Kingdom</h1>
								<p>In the UK the Home Office is responsible for the reduction and prevention of crime and oversees policing. The Ministry of Justice oversees prosecution and sentencing. For both victims and perpetrators, crime can mean lives are never the same again.</p>
							</div>
						</header> <!-- .site-header -->

						

						<h2>How to be a good citizen</h2>
						<p>A big part of being a good citizen is the ability to be able to challenge injustice and helps to enable fairness. An example, of showing this is by someone reporting a crime to the police through this platform. The benefit of doing this is that it helps the public services; it does this as the citizens want to keep their communities safe and have the justice system kept fair!</p>

						<div class="row">
							<div class="col-md-6">
								<div class="feature rounded-icon">
									<div class="feature-icon"><i class="icon-owl"></i></div>
									<h3 class="feature-title">Obey the laws </h3>
									<p>It is important for all citizens to follow laws set down by the government this is for their own and others safety.</p>
								</div>

								<div class="feature rounded-icon">
									<div class="feature-icon"><i class="icon-bus"></i></div>
									<h3 class="feature-title">Hard working/dedication</h3>
									<p>Citizens should work hard in all areas of life. Good citizens try not to give up easily.</p>
								</div>
							</div>
							<div class="col-md-6">
								<div class="feature rounded-icon">
									<div class="feature-icon"><i class="icon-school"></i></div>
									<h3 class="feature-title">Understand the needs of others</h3>
									<p>It is useful for good citizens to be aware not all people are the same and some may be less able to help the community.</p>
								</div>

								<div class="feature rounded-icon">
									<div class="feature-icon"><i class="icon-foot-ball"></i></div>
									<h3 class="feature-title">Mutual respect to all</h3>
									<p>All citizens should have respect and tolerate each other this way they would be less violence between faiths, cultures or races.</p>
								</div>
							</div>
						</div>

						<div class="features">
							<div class="feature">
								<div class="feature-icon large"><i class="icon-archive"></i></div>
								<h2 class="feature-title">Domestic Abuse or Coercive control during Covid-19</h2>
								<p>If you feel at risk of abuse, there is help and support available to you, including the police, online support, helplines and refuges. You can find more information about these and other services online. Anyone can be a victim of domestic abuse, regardless of gender, age, ethnicity, socio-economic status, sexuality or background. While the UK has recently seen some easing to the lockdown measures, it is clear that the impact of lockdown on victims of coercive control has been significant. Indeed, Refuge, the National Domestic Abuse charity, has identified that calls to their helpline increased by 66% during lockdown and that there has been a surge in women seeking refuge from their abusers since measures have eased.</p>
							</div>
							<div class="feature">
								<div class="feature-icon large"><i class="icon-book"></i></div>
								<h2 class="feature-title">Rape and sexual assault</h2>
								<p>Rape and sexual assault can have a serious effect on short and long-term physical, mental, sexual and reproductive health. Here you can find information on the link between rape, sexual assault and health inequalities as well as actions that can be taken to address this. The Sexual Offences (Scotland) Act 2009 defines rape as 'penetration of the vagina, anus or mouth of another person by the penis without consent'. The offence covers surgically constructed genitalia, for example as a result of gender reassignment surgery.</p>
							</div>
							<div class="feature">
								<div class="feature-icon large"><i class="icon-badge"></i></div>
								<h2 class="feature-title">Our mission</h2>
								<p>Aberdeen Online crime reporting system helps the Aberdeen community to cut serious and organised crime, protecting the public by investigating reported crime and those criminals who pose the greatest risk to the city. It is our privilege to do so, We are proud to protect.</p>
							</div>
						</div>
					</div>
					<div class="aside">
							

						
							
									<?php 
								   if (isset($_SESSION["msg"])){
									    echo $_SESSION["msg"];
									  } else {
									    $_SESSION["msg"] = "Error ";
									  } 
								 include_once('form.php')?>
								
									<br>
									<p> The details on this form will not be divulged to anyone and the Police will treat the form according to the law</p>
					</div>
							
						

				
			</div>

		</div>

		<script src="js/jquery-1.11.1.min.js"></script>
		<script src="js/plugins.js"></script>
		<script src="js/app.js"></script>
		
	</body>
</html>