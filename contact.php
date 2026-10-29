<?php 
 session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link href="https://globalfonts.pro/font/alyssum" rel="stylesheet">
    <style>
        body {
            background-image: url('Pictures/Homepage_bg.jpg');
            background-size: cover;
            background-position: center;
            text-align: center;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        
        header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid #000; /* Add a bottom border */
        }

        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
        }
        
        .logo-container {
            display: flex;
            align-items: center;
        }
        
        .navbar {
            display: flex;
            justify-content: center;
            flex-grow: 1;
            margin-left: 550px; /* Adjust this value to move the navbar to the right */
        }

        .navbar a {
            text-decoration: none;
            color: #000; /* Default link color */
            margin: 0 15px; /* Margin between links */
        }

        .navbar .divider {
            width: 1px;
            height: 27px; /* Adjust the height as needed */
            background-color: #000; /* Line color */
            margin: 0 15px; /* Space between the links and the line */
        }
        
        .logo img {
            max-height: 80px; /* Adjust logo size as needed */
            margin-left: 30px;
        }
        
        .logo-text {
            margin-left: 10px; /* Space between logo and text */
            font-size: 24px; /* Adjust font size as needed */
            font-weight: bold; /* Adjust font weight as needed */
            color: #000; /* Adjust text color as needed */
        }
        
        .login-options {
            margin-top: 10px;
        }

        .login-option {
            background-color: #E3BC9A;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            font-size: 16px;
            margin-top: 10px;
            transition: background-color 0.3s ease;
            display: inline-block;
        }

        .login-option:hover {
            background-color: #405D4C;
        }

        #rcorners1 {
            border-radius: 25px;
            background: #708B7B;
            padding: 20px;
            width: 1200px;
            height: 500px;
            margin-top: 170px;
            margin-bottom: 100px;
            margin-left: auto;
            margin-right: auto;
            text-align: center;
            position: relative; /* Make this element the reference point for absolute positioning */
        }

   #rcorners1 .center-image {
        position: absolute;
        top: 50%;
        left: 0; /* Align to the left */
        transform: translateY(-50%);
        width: 450px; /* Adjust the size of the image */
        height: 450px; /* Adjust the height of the image */
        margin-top: 5px; /* Adjust top margin */
        margin-left: 60px; /* Adjust left margin */
    }
		
		#rcorners1 .side-image.right {
        position: absolute;
        top: 150px; /* Adjust the top distance */
        left: 0; /* Align to the left */
        transform: translateY(-50%);
        width: 50px; /* Adjust the size of the image */
        height: 50px; /* Adjust the height of the image */
        margin-top: 5px; /* Adjust top margin */
		margin-bottom: 85px;
        margin-left: 545px; /* Adjust left margin */
        }
		 #rcorners1 .side-text {
            position: absolute;
            top: 140px; /* Adjust the top distance */
            left: 610px; /* Adjust the left distance */
            color:white; /* Text color */
            font-size: 19px; /* Font size */
        }
		
		 .additional-image {
        position: absolute;
        top: 250px; /* Adjust the top distance */
        left: 0; /* Align to the left */
        transform: translateY(-50%);
        width: 45px; /* Adjust the size of the image */
        height: 45px; /* Adjust the height of the image */
        margin-top: 5px; /* Adjust top margin */
		margin-bottom: 85px;
        margin-left: 551px; /* Adjust left margin */
        }
		
		.additional-text {
            position: absolute;
            top: 244px;
            left: 613px;
            color: white;
            font-size: 19px;
        }
		
		.additional-image-2 {
            position: absolute;
        top: 350px; /* Adjust the top distance */
        left: 0; /* Align to the left */
        transform: translateY(-50%);
        width: 65px; /* Adjust the size of the image */
        height: 65px; /* Adjust the height of the image */
        margin-top: 5px; /* Adjust top margin */
		margin-bottom: 85px;
        margin-left: 545px; /* Adjust left margin */
        }

        .additional-text-2 {
           position: absolute;
            top: 345px;
            left: 620px;
            color: white;
            font-size: 19px;
        }
    </style>
</head>
<body>
    <header>
        <div class="header-container">
            <div class="logo-container">
                <a href="#" class="logo">
                    <img src="Pictures/logo.png" alt="Logo">
                </a>
                <div class="logo-text">
                    <span style="color: #405D4C; font-size: 29px;">DREAMY</span><br>
                    <span style="color: #000000; font-size: 29px;">MOOSE</span><br>
                </div>
            </div>
            <nav class="navbar">
                <a href="index.php" class="login-option">Home</a>
                <a href="contact.php" class="login-option">Contact</a>
                <a href="menu.php" class="login-option">Menu</a>
                <div class="divider"></div>
                <?php if (!isset($_SESSION["username"])) { ?>
                    <a href="loginPage.php" class="login-option">Log in</a>
                    <a href="signup.php" class="login-option">Sign up</a>
                <?php } else { ?>
                    <a href="logout.php" class="login-option">Log out</a>
                <?php } ?>
            </nav>
        </div>
    </header>
<div id="rcorners1">
        <img src="Pictures/2ndlogo.png" alt="Center Image" class="center-image">
        <img src="Pictures/location.png" alt="Side Image Right" class="side-image right">
		<div class="side-text">48D Jln Brp 6/11 Seksyen U20, 40160 Shah Alam , Malaysia </div>
		<img src="Pictures/whatsapp.png" alt="Additional Image" class="additional-image">
	    <div class="additional-text">+6011-49213047</div>
	    <img src="Pictures/instagram.png" alt="Phone" class="additional-image-2">
	    <div class="additional-text-2">creamyMoore_</div>
	    
    </div>
</body>
</html>
