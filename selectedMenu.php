<?php 
session_start();
require("connection.php")
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <title>Cart</title>
    <style>
        body {
            background-image: url('Pictures/Homepage_bg.jpg');
            background-size: 50%;
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
            border-bottom: 2px solid #000;
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
            margin-left:355px; /* Adjust this value to move the navbar to the right */
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
            width: 1100px;
            height: 520px;
            margin-top: 150px;
            margin-bottom: 100px;
            margin-left: 60px;
            margin-right: auto;
            text-align: center;
            position: relative; /* Make this element the reference point for absolute positioning */
        }

        #addButton {
			position:absolute;
            background-color: #623628;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            font-size: 16px;
			right:80px;
			bottom:60px;
            transition: background-color 0.3s ease;
        }

        #addButton:hover {
            background-color: #34483E; /* Darken the hover color */
        }
#cornerImage {
    position: absolute;
	bottom:330px;
    right: 60px; /* Adjust as needed */
    height: 300px;
    width: 450px;
    border-radius: 50%; /* Make the image round */
	left:850px;
}

		   /* Style for the inner rounded container */
        #innerRounded {
            border-radius: 20px; /* Adjust as needed */
            background-color: #405D4C; /* Background color for inner container */
            padding: 20px;
            margin: 20px; /* Adjust spacing between outer and inner containers */
            text-align: center;
            position: relative;
            height: 20px; /* Ensure it fills the height of the parent container */
			width:180px;
			margin-right:100px;
			margin-left:145px;
        }
 /* Style for the other rounded container */
        #OtherRounded {
            border-radius: 20px; /* Adjust as needed */
            background-color: #D6A067; /* Background color for inner container */
            padding: 20px;
            margin: 20px; /* Adjust spacing between outer and inner containers */
            text-align: center;
            position: relative;
            height: 300px; /* Ensure it fills the height of the parent container */
            width: 270px;
            margin-right: 40px;
            margin-left: 100px;
        }
#AnotherRounded {
            border-radius: 20px; /* Adjust as needed */
            background-color: #E3BC9A; /* Background color for inner container */
            padding: 20px;
            margin: 20px; /* Adjust spacing between outer and inner containers */
            text-align: center;
            position: absolute; /* Position absolutely within its parent */
            top: 30px; /* Distance from the top of the parent container */
            right: 200px; /* Distance from the right of the parent container */
            height: 20PX; /* Adjust height as needed */
            width: 180px;
        }
#Another2Rounded {
            border-radius: 20px; /* Adjust as needed */
            background-color: #E3BC9A; /* Background color for inner container */
            padding: 20px;
            margin: 20px; /* Adjust spacing between outer and inner containers */
            text-align: center;
            position: absolute; /* Position absolutely within its parent */
            top: 160px; /* Distance from the top of the parent container */
            right: 450px; /* Distance from the right of the parent container */
            height: 15px; /* Adjust height as needed */
            width: 50px;
        }
		
#Another3Rounded {
            border-radius: 20px; /* Adjust as needed */
            background-color: #E3BC9A; /* Background color for inner container */
            padding: 20px;
            margin: 20px; /* Adjust spacing between outer and inner containers */
            text-align: center;
            position: absolute; /* Position absolutely within its parent */
            top: 240px; /* Distance from the top of the parent container */
            right: 450px; /* Distance from the right of the parent container */
            height: 15px; /* Adjust height as needed */
            width: 50px;
        }
		
#Another4Rounded {
            border-radius: 20px; /* Adjust as needed */
            background-color: #E3BC9A; /* Background color for inner container */
            padding: 20px;
            margin: 20px; /* Adjust spacing between outer and inner containers */
            text-align: center;
            position: absolute; /* Position absolutely within its parent */
            top: 325px; /* Distance from the top of the parent container */
            right: 450px; /* Distance from the right of the parent container */
            height: 15px; /* Adjust height as needed */
            width: 50px;
        }

		#Another5Rounded {
            border-radius: 20px; /* Adjust as needed */
            background-color: #405D4C; /* Background color for inner container */
            padding: 20px;
            margin: 20px; /* Adjust spacing between outer and inner containers */
            text-align: center;
            position: absolute; /* Position absolutely within its parent */
            top: 460px; /* Distance from the top of the parent container */
            right: 690px; /* Distance from the right of the parent container */
            height: 15px; /* Adjust height as needed */
            width: 100px;
			margin-right:100px;
			margin-left:145px;
        }

        /* Style for the quantity selector */
.quantity-selector 
		{
    position: absolute;
    top: 465px; /* Adjust the top position to move the quantity selector higher up */
    right:200px; /* Adjust the right position to move the quantity selector more to the right */
    display: flex;
    justify-content: center;
    align-items: center;
}

        .quantity-label {
            font-size: 18px;
            color: white;
            margin-right: 10px;
        }

        .quantity-input {
            width: 50px;
            padding: 5px;
            font-size: 16px;
            text-align: center;
        }

.button-container {
    margin-top: 25px;
    text-align: right; /* Align buttons to the right */
    position: fixed; /* Fixed position to keep buttons in view */
    bottom: 45px; /* Adjust vertical position from the bottom */
    right: 50px; /* Adjust horizontal position from the right */
}

.action-button {
    background-color: #405D4C;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    text-decoration: none;
    font-size: 16px;
     margin-right: 15px; /* Adjusted margin between buttons */
	gap:30px;
    margin-top: 25px; /* Adjust vertical margin from the top */
    transition: background-color 0.3s ease;
}

.action-button:hover {
    background-color: #34483E; /* Darken the hover color */
}
  /* Style for the radio buttons */
        /* Style for the radio buttons */
        .radio-container {
            position: absolute;
            top: 200px; /* Adjust as needed */
            right: 250px; /* Distance from the right of the parent container */
            text-align: left;
        }

        .radio-container label {
            font-size: 18px;
            color: white;
            margin-right: 20px; /* Spacing between radio buttons */
        }

        .radio-container input {
            margin-right: 5px; /* Spacing between radio button and label text */
        }

		 /* Style for the size radio buttons */
        .size-radio-container {
            position: absolute;
            top: 280px; /* Adjust as needed */
            right: 225px; /* Distance from the right of the parent container */
            text-align: left;
        }

        .size-radio-container label {
            font-size: 18px;
            color: white;
            margin-right: 20px; /* Spacing between radio buttons */
        }

        .size-radio-container input {
            margin-right: 5px; /* Spacing between radio button and label text */
        }
		
		/* Style for the extras checkboxes */
        .extras-container {
            position: absolute;
            top: 360px; /* Adjust as needed */
            right: 235px; /* Distance from the right of the parent container */
            text-align: left;
        }

        .extras-container label {
            font-size: 18px;
            color: white;
            margin-right: 20px; /* Spacing between checkboxes */
        }

        .extras-container input {
            margin-right: 5px; /* Spacing between checkbox and label text */
        }
		
    </style>
</head>
<body>

<?php 
$order_id = (int) $_GET["order_id"]; // cast to int to prevent SQL injection
$sql_cart = mysqli_query($conn,"SELECT * FROM menu WHERE menu_id = '$order_id'");

$data_cart = mysqli_fetch_assoc($sql_cart);
?>
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
                <a href="NewHomepage.php" class="login-option">Home</a>
                <a href="contact.php" class="login-option">Contact</a>
                <a href="menu.php" class="login-option">Menu</a>
                <a href="cart.php" class="login-option">Cart</a>
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
		
		 <!-- Button inside the rcorners1 container -->
    <button id="addButton">Add</button>
		
		<!-- Image in the top-right corner -->
        <img id="cornerImage" src="Pictures/Dreamy.png" alt="Corner Image">
		
		 <div class="radio-container">
            <form>
                <label>
                    <input type="radio" name="type" value="cold"> Cold
                </label>
                <label>
                    <input type="radio" name="type" value="hot"> Hot
                </label>
            </form>
        </div>
		
		 <div class="size-radio-container">
            <form>
                <label>
                    <input type="radio" name="size" value="small"> Small
                </label>
                <label>
                    <input type="radio" name="size" value="large"> Large
                </label>
            </form>
        </div>
		
		
        <div class="extras-container">
            <form>
                <label>
                    <input type="checkbox" name="extras" value="sugar"> Sugar
                </label>
                <label>
                    <input type="checkbox" name="extras" value="milk"> Milk
                </label>
            </form>
        </div>
		
		<div id="innerRounded" >
            <!-- Content of #innerRounded -->
           <h2 style="color: white;font-size:18px;margin-top:5px;">SELECTED ITEM</h2>
           <img style="z-index:99999" src="" alt="">
			
        </div>
      <div id="OtherRounded" style="background-image:url('admin/assets/images/<?= $data_cart["menu_image"] ?>');background-size: contain;">
			
        </div>
		<div id="AnotherRounded">
			 <h2 style="color: black;font-size:15px;margin-top:4px;">SELECT VARIATION</h2>
        </div>
		
		<div id="Another2Rounded">
			 <h2 style="color: black;font-size:15px;margin-top:0px;">TYPE</h2>
        </div>
		
		<div id="Another3Rounded">
			 <h2 style="color: black;font-size:15px;margin-top:0px;">SIZE</h2>
        </div>
		
		<div id="Another4Rounded">
			 <h2 style="color: black;font-size:15px;margin-top:0px;">EXTRA</h2>
        </div>
		
		<div id="Another5Rounded">
			 <h2 style="color: white;font-size:15px;margin-top:0px;">RM <?= $data_cart["menu_price"] ?></h2>
        </div>
		
	  <div class="quantity-selector">
        <span class="quantity-label">Quantity:</span>
        <input type="number" id="quantity" class="quantity-input" value="1" min="1" max="10">
    </div>
		
    </div>
    <div class="button-container">
        <button class="action-button" id="backButton">Back</button>
        <button class="action-button" id="proceedButton">Proceed</button>
    </div>
	<script>
        // JavaScript to handle button clicks
        document.getElementById("backButton").addEventListener("click", function() {
            window.location.href = "menu.php"; // Navigate to menu.php
        });

        document.getElementById("proceedButton").addEventListener("click", function() {
            window.location.href = "cart.php"; // Navigate to cart.php
        });
		
    </script>

<script>
        const cartItems = [];

        function addToCart(menu_id, quantity,itemName,price) {
            // Check if the product already exists in the cart
            const existingProductIndex = cartItems.findIndex(item => item.productId === menu_id);
            
            if (existingProductIndex !== -1) {
                // If product exists, update the quantity
                cartItems[existingProductIndex].quantity += quantity;
            } else {
                // If product does not exist, add it to the cart
                cartItems.push({ menu_id, quantity,itemName,price });
            }
            
            // Save the updated cart items to localStorage
            localStorage.setItem('cartItems', JSON.stringify(cartItems));
            setTimeout(function() {
                      swal({
                        title: "Success!",
                        text: "Add To Cart successfully.",
                        icon: "success",
                      }).then(function() {
                        window.location.href = "cart.php"; 
                      });
                    }, 100);
        }

        document.getElementById('addButton').addEventListener('click', () => {
            const productId = <?php echo $_GET["order_id"] ?>; // Assuming the product ID for Caramel Croissant Pudding is 1
            const quantity = parseInt(document.getElementById('quantity').value);
            const itemName = "<?php echo $data_cart["menu_name"] ?>";
            const price = <?php echo $data_cart["menu_price"] ?>;

            addToCart(productId, quantity,itemName,price);
        });

        document.addEventListener('DOMContentLoaded', () => {
            // Load cart items from localStorage on page load
            const savedCartItems = localStorage.getItem('cartItems');
            if (savedCartItems) {
                cartItems.push(...JSON.parse(savedCartItems));
            }
        });
    </script>
</body>
</html>
