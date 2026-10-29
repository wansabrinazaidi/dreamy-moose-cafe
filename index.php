<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Responsive Cold Brew Website</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">

	<!--- box icons link --->
	<link rel="stylesheet"
    href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

    <!--- remix icons link --->
    <link
    href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css"
    rel="stylesheet"/>

    <!--- google fonts link --->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

     <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
</head>
<body>

	<!--- header --->
	<header>
    <a href="#" class="logo">
        <img src="Pictures/Textlogo.png" alt="Cold Brew Logo">
    </a>

    <ul class="navlist">
        <li><a href="index.php">Home</a></li>
        <li><a href="contact.php">Contact</a></li>
        <li><a href="menu.php">Menu</a></li>
    </ul>



    <div class="right-content">
	<?php if (!isset($_SESSION["username"])) { ?>
                   
				   <a href="loginPage.php" class="nav-btn">Log in</a>
				   
							  
				   <a href="signup.php" class="nav-btn">Sign Up</a>
						   <?php } else { ?>
							<a href="logout.php" class="nav-btn">Log Out</a>
						   <?php } ?>
        <div class="bx bx-menu" id="menu-icon"></div>
    </div>
</header>


	<!--- hero --->
	<section class="hero">
		<div class="hero-text">
			<h5 data-aos="fade-right" data-aos-duration="1400">#Every Bite is a Delight</h5>
			<h2 data-aos="zoom-in-left" data-aos-duration="1400" data-aos-delay="200">Coffee Lovers</h2>
			<p data-aos="fade-right" data-aos-duration="1400" data-aos-delay="300">Savor the perfect blend of coffee, indulge in flavorful meals, and treat yourself to heavenly pastries. Discover your dreamy moment at Dreamy Moose Cafe.</p>

			<div class="main-hero" data-aos="flip-down" data-aos-duration="1400" data-aos-delay="400">
				<a href="menu.php" class="btn">Order Now</a>
				<a href="#" class="price">
					<span>Treat Yourself Today</span>
				</a>
			</div>
		</div>

		<div class="hero-img" data-aos="zoom-in" data-aos-duration="1400">
			<img src="img/hero.png">
		</div>
	</section>

	<div class="icons">
		<a href="#" data-aos="fade-in" data-aos-duration="1400" data-aos-delay="600"><i class="ri-facebook-fill"></i></a>
		<a href="#" data-aos="fade-in" data-aos-duration="1400" data-aos-delay="700"><i class="ri-youtube-fill"></i></a>
		<a href="#" data-aos="fade-in" data-aos-duration="1400" data-aos-delay="800"><i class="ri-twitter-fill"></i></a>
	</div>

	<div class="scroll" data-aos="zoom-out-down" data-aos-duration="1400" data-aos-delay="550">
		<a href="#">
			<i class="ri-scroll-to-bottom-line"></i>
			Scroll Down
		</a>
	</div>

	<!--- js link --->
	<script src="js/script.js"></script>

	 <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init({
    	offset:1,
    });
  </script>

</body>
</html>