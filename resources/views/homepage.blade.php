<!DOCTYPE html>
<html lang="zxx">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="description" content="Orbitor,business,company,agency,modern,bootstrap4,tech,software">
  <meta name="author" content="themefisher.com">

  <title>Student Extra Curricular Activities</title>

  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="{{asset('front-end/images/favicon.ico')}}" />

  <!-- bootstrap.min css -->
  <link rel="stylesheet" href="{{asset('front-end/plugins/bootstrap/css/bootstrap.min.css')}}">
  <!-- Icon Font Css -->
  <link rel="stylesheet" href="{{asset('front-end/plugins/icofont/icofont.min.css')}}">
  <!-- Slick Slider  CSS -->
  <link rel="stylesheet" href="{{asset('front-end/plugins/slick-carousel/slick/slick.css')}}">
  <link rel="stylesheet" href="{{asset('front-end/plugins/slick-carousel/slick/slick-theme.css')}}">

  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="{{asset('front-end/css/style.css')}}">
	<style>
		#loginHere{
			color: #9a1d23;
		}
	</style>
</head>

<body id="top">

<header>
	<div class="header-top-bar">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-6">
					<ul class="top-bar-info list-inline-item pl-0 mb-0">
						<li class="list-inline-item"><a href="mailto:support@gmail.com"><i class="icofont-support-faq mr-2"></i>support@milestoneschool.com</a></li>
						<li class="list-inline-item"><i class="icofont-location-pin mr-2"></i>Address Ta-134/A, Dhaka, Bangladesh </li>
					</ul>
				</div>
				<div class="col-lg-6">
					<div class="text-lg-right top-right-bar mt-2 mt-lg-0">
						<a href="tel:+23-345-67890" >
							<span>Call Now : </span>
							<span class="h4">823-4565-13456</span>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<nav class="navbar navbar-expand-lg navigation" id="navbar">
		<div class="container">
		 	 <a class="navbar-brand" href="index.html">
			  	<img src="{{asset('front-end/images/milestone-college-logo.png')}}" alt="" class="img-fluid" width="90">
			  </a>

		  	<button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarmain" aria-controls="navbarmain" aria-expanded="false" aria-label="Toggle navigation">
			<span class="icofont-navigation-menu"></span>
		  </button>
	  
		  <div class="collapse navbar-collapse" id="navbarmain">
			<ul class="navbar-nav ml-auto">
			  <li class="nav-item active">
				<a class="nav-link" href="#!">Home</a>
			  </li>
			   	<li class="nav-item"><a class="nav-link" href="#!">About</a></li>
			   <li class="nav-item"><a class="nav-link" href="#!">Contact Us</a></li>
			   <li class="nav-item" ><a class="nav-link" style="color: #9A1D23" href="{{'login'}}">Login Here</a></li>
			</ul>
		  </div>
		</div>
	</nav>
</header>
<section class="page-title bg-1">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block text-center">
          <h1 class="text-capitalize mb-5 text-lg">Extra Curricular Activites</h1>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section service-2">
	<div class="container">
		<div class="row">
			<?php use Illuminate\Support\Str;?>
			@foreach($activities as $key=>$value)
			<div class="col-lg-4 col-md-6 col-sm-6">
				<div class="service-block mb-5">
					<img src="{{ asset('storage/uploads/'.$value->activity_image) }}" alt="" class="img-fluid">
					<div class="content">
						<h4 class="mt-4 mb-2 title-color text-center">{{$value->activity_name}}</h4>
						<p>Location: {{$value->activity_location}}</p>
						<p>Start Date: {{$value->start_date}}</p>
						<p>End Date: {{$value->end_date}}</p>
						<p class="mb-4">{{ Str::words($value->activity_description, 50, '...') }}</p>
					</div>
				</div>
			</div>
			@endforeach
<!-- 
			<div class="col-lg-4 col-md-6 col-sm-6">
				<div class="service-block mb-5">
					<img src="{{asset('front-end/images/service/service-2.jpg')}}" alt="" class="img-fluid">
					<div class="content">
						<h4 class="mt-4 mb-2  title-color">Personal Care</h4>
						<p class="mb-4">Saepe nulla praesentium eaque omnis perferendis a doloremque.</p>
					</div>
				</div>
			</div>
			
			<div class="col-lg-4 col-md-6 col-sm-6">
				<div class="service-block mb-5">
					<img src="{{asset('front-end/images/service/service-3.jpg')}}" alt="" class="img-fluid">
					<div class="content">
						<h4 class="mt-4 mb-2 title-color">CT scan</h4>
						<p class="mb-4">Saepe nulla praesentium eaque omnis perferendis a doloremque.</p>
					</div>
				</div>
			</div> -->
		</div>
	</div>
</section>
<section class="section cta-page">
	<div class="container">
		<div class="row">
			<div class="col-lg-7">
				<div class="cta-content">
					<div class="divider mb-4"></div>
					<h2 class="mb-5 text-lg" style="color: white;">We are pleased to offer you the <span style="color: lightblue;">chance to join our extra curricular activities</span></h2>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- footer Start -->
<footer class="footer section gray-bg">
	<div class="container">
		<div class="row">
			<div class="col-lg-4 mr-auto col-sm-6">
				<div class="widget mb-5 mb-lg-0">
					<div class="logo mb-4">
						<img src="images/logo.png" alt="" class="img-fluid">
					</div>
					<p>Feel free to join any extra curricular activities</p>

					<ul class="list-inline footer-socials mt-4">
						<li class="list-inline-item"><a href="https://www.facebook.com/themefisher"><i class="icofont-facebook"></i></a></li>
						<li class="list-inline-item"><a href="https://twitter.com/themefisher"><i class="icofont-twitter"></i></a></li>
						<li class="list-inline-item"><a href="https://www.pinterest.com/themefisher/"><i class="icofont-linkedin"></i></a></li>
					</ul>
				</div>
			</div>

			<div class="col-lg-2 col-md-6 col-sm-6">
				<div class="widget mb-5 mb-lg-0">
					<h4 class="text-capitalize mb-3">Department</h4>
					<div class="divider mb-4"></div>

					<ul class="list-unstyled footer-menu lh-35">
						<li><a href="#">Science </a></li>
						<li><a href="#">Arts</a></li>
						<li><a href="#">Commerce</a></li>
					</ul>
				</div>
			</div>

			<div class="col-lg-2 col-md-6 col-sm-6">
				<div class="widget mb-5 mb-lg-0">
					<h4 class="text-capitalize mb-3">Support</h4>
					<div class="divider mb-4"></div>

					<ul class="list-unstyled footer-menu lh-35">
						<li><a href="#">Terms & Conditions</a></li>
						<li><a href="#">Privacy Policy</a></li>
						<li><a href="#">Home</a></li>
						<li><a href="#">About Us</a></li>
						<li><a href="#">Contact Us</a></li>
					</ul>
				</div>
			</div>

			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="widget widget-contact mb-5 mb-lg-0">
					<h4 class="text-capitalize mb-3">Get in Touch</h4>
					<div class="divider mb-4"></div>

					<div class="footer-contact-block mb-4">
						<div class="icon d-flex align-items-center">
							<i class="icofont-email mr-3"></i>
							<span class="h6 mb-0">Support Available for 24/7</span>
						</div>
						<h4 class="mt-2"><a href="tel:+23-345-67890">Support@email.com</a></h4>
					</div>

					<div class="footer-contact-block">
						<div class="icon d-flex align-items-center">
							<i class="icofont-support mr-3"></i>
							<span class="h6 mb-0">Mon to Fri : 08:30 - 18:00</span>
						</div>
						<h4 class="mt-2"><a href="tel:+23-345-67890">+23-456-6588</a></h4>
					</div>
				</div>
			</div>
		</div>
		
		<!-- <div class="footer-btm py-4 mt-5">
			<div class="row align-items-center justify-content-between">
				<div class="col-lg-6">
					<div class="copyright">
						&copy; Copyright Reserved to <span class="text-color">Novena</span> by <a href="https://themefisher.com/" target="_blank">Themefisher</a>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="subscribe-form text-lg-right mt-5 mt-lg-0">
						<form action="#" class="subscribe">
							<input type="text" class="form-control" placeholder="Your Email address">
							<a href="#" class="btn btn-main-2 btn-round-full">Subscribe</a>
						</form>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-4">
					<a class="backtop js-scroll-trigger" href="#top">
						<i class="icofont-long-arrow-up"></i>
					</a>
				</div>
			</div>
		</div> -->
	</div>
</footer>
   

    <!-- 
    Essential Scripts
    =====================================-->

    
    <!-- Main jQuery -->
    <script src="{{asset('front-end/plugins/jquery/jquery.js')}}"></script>
    <!-- Bootstrap 4.3.2 -->
    <script src="{{asset('front-end/plugins/bootstrap/js/popper.js')}}"></script>
    <script src="{{asset('front-end/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
   
    <script src="{{asset('front-end/js/script.js')}}"></script>
    <script src="{{asset('front-end/js/contact.js')}}"></script>

  </body>
  </html>