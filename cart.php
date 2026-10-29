<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
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
            margin-left: 455px;
            /* Adjust this value to move the navbar to the right */
        }

        .navbar a {
            text-decoration: none;
            color: #000;
            /* Default link color */
            margin: 0 15px;
            /* Margin between links */
        }

        .navbar .divider {
            width: 1px;
            height: 27px;
            /* Adjust the height as needed */
            background-color: #000;
            /* Line color */
            margin: 0 15px;
            /* Space between the links and the line */
        }

        .logo img {
            max-height: 80px;
            /* Adjust logo size as needed */
            margin-left: 30px;
        }

        .logo-text {
            margin-left: 10px;
            /* Space between logo and text */
            font-size: 24px;
            /* Adjust font size as needed */
            font-weight: bold;
            /* Adjust font weight as needed */
            color: #000;
            /* Adjust text color as needed */
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
            width: 950px;
            height: 500px;
            margin-top: 150px;
            margin-bottom: 100px;
            margin-left: 60px;
            /* Adjust left margin */
            text-align: center;
            position: relative;
            /* Make this element the reference point for absolute positioning */
            float: left;
            /* Float to the left */
        }

        .image {
            width: 380px;
            /* Adjust the size of the image */
            height: 380px;
            /* Adjust the height of the image */
            margin-top: 200px;
            /* Adjust top margin */
            margin-right: 60px;
            /* Adjust right margin */
            float: right;
            /* Float to the right */
        }

        #rcorners2 {
            background: #708B7B;
            text-align: center;
            padding: 20px;
            width: 80%;
            /* Adjust the width of the table */
            max-width: 800px;
            /* Set a maximum width for responsiveness */
            margin: 20px auto;
            /* Center the table horizontally */
            border-radius: 25px;
            /* Adjust the border radius */
            position: relative;
            /* Adjust the position */
            top: 20px;
            /* Adjust the top position */
        }

        #rcorners2 table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        #rcorners2 table,
        #rcorners2 th,
        #rcorners2 td {
            border: 1px solid black;
        }

        #rcorners2 th,
        #rcorners2 td {
            padding: 15px;
            text-align: center;
        }

        .button {
            margin-top: 20px;
            background-color: #623628;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 20px;
            text-decoration: none;
            font-size: 16px;
            transition: background-color 0.3s ease;
            width: 150px;
            /* Adjust width as needed */
            height: 45px;
        }

        .button:hover {
            background-color: #34483E;
            /* Darken the hover color */
        }

        #AnotherRounded {
            border-radius: 20px;
            /* Adjust as needed */
            background-color: #D6A067;
            /* Background color for inner container */
            padding: 20px;
            margin: 20px;
            /* Adjust spacing between outer and inner containers */
            text-align: center;
            position: absolute;
            /* Position absolutely within its parent */
            top: 450px;
            /* Distance from the top of the parent container */
            left: 650px;
            /* Distance from the left of the parent container */
            height: 10px;
            /* Adjust height as needed */
            width: 100px;
        }

        #Another2Rounded {
            border-radius: 20px;
            /* Adjust as needed */
            background-color: #D6A067;
            /* Background color for inner container */
            padding: 20px;
            margin: 20px;
            /* Adjust spacing between outer and inner containers */
            text-align: center;
            position: absolute;
            /* Position absolutely within its parent */
            top: 450px;
            /* Distance from the top of the parent container */
            left: 840px;
            /* Distance from the left of the parent container */
            height: 5px;
            /* Adjust height as needed */
            width: 30px;
        }

        #Another3Rounded {
            border-radius: 20px;
            /* Adjust as needed */
            background-color: #708B7B;
            /* Background color for inner container */
            padding: 20px;
            margin: 20px;
            /* Adjust spacing between outer and inner containers */
            text-align: center;
            position: absolute;
            /* Position absolutely within its parent */
            top: 390px;
            /* Distance from the top of the parent container */
            left: 620px;
            /* Distance from the right of the parent container */
            height: 15px;
            /* Adjust height as needed */
            width: 160px;
            margin-top: 0px;
        }

        #Another4Rounded {
            border-radius: 20px;
            /* Adjust as needed */
            background-color: #708B7B;
            /* Background color for inner container */
            padding: 20px;
            margin: 20px;
            /* Adjust spacing between outer and inner containers */
            text-align: center;
            position: absolute;
            /* Position absolutely within its parent */
            top: 390px;
            /* Distance from the top of the parent container */
            left: 833px;
            /* Distance from the right of the parent container */
            height: 15px;
            /* Adjust height as needed */
            width: 40px;
            margin-top: 0px;
        }

        .button-container {
            margin-top: 25px;
            text-align: right;
            /* Align buttons to the right */
            position: fixed;
            /* Fixed position to keep buttons in view */
            bottom: 45px;
            /* Adjust vertical position from the bottom */
            right: 50px;
            /* Adjust horizontal position from the right */
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
        <!-- Content for the rounded corner box -->
        <div id="AnotherRounded">
            <h2 style="color: black;font-size:13px;margin-top:0px;">TOTAL (RM) </h2>
        </div>
        <div id="Another2Rounded">
            <h2 style="color: black;font-size:13px;margin-top:0px;">0.00</h2>
        </div>
        <div id="Another3Rounded">
            <h2 style="color: black;font-size:13px;margin-top:0px;">Delivery Fee</h2>
            <p style="color: black;font-size:13px;margin-top:10px;">Container/Processing Fee</p>
        </div>
        <div id="Another4Rounded">
            <h2 style="color: black;font-size:13px;margin-top:0px;">4.99</h2>
            <p style="color: black;font-size:13px;margin-top:10px;">2.99</p>
        </div>
        <div id="rcorners2">
            <table>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Item</th>
                        <th>Quantity</th>
                        <th>Price (RM)</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="cartTBody">
                    <!-- Orders will be populated by JavaScript -->
                </tbody>
            </table>
        </div>
    </div>
    <img src="Pictures/2ndlogo.png" alt="Image" class="image">
    <div class="button-container">
        <form action="menu.php" method="post">
            <button id="cancelButton" type="submit" name="submit" class="button">CANCEL</button>
        </form>
        <form action="" method="post">
            <input type="hidden" name="order_id">
            <button id="addButton" type="submit" name="submit" class="button">PROCEED</button>
        </form>
    </div>

    <!-- JavaScript for button functionality -->
    <script>
        // Function to load cart items from localStorage and populate the table
        function loadCartItems() {
            const cartTBody = document.getElementById('cartTBody');
            cartTBody.innerHTML = ''; // Clear any existing rows

            let cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];

            console.log(cartItems)
            cartItems.forEach((item, index) => {
                const row = document.createElement('tr');

                row.innerHTML = `
            <td>${index + 1}</td>
            <td>${item.itemName}</td>
            <td>${item.quantity}</td>
            <td>${item.price}</td>
            <td><button onclick="removeItem(${index})">Remove</button></td>
        `;

                cartTBody.appendChild(row);
            });

            updateTotal();
        }

        // Function to update the total price
        function updateTotal() {
            let cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];
            let total = cartItems.reduce((sum, item) => sum + item.price * item.quantity, 0);
            let deliveryFee = 4.99;
            let containerFee = 2.99;

            document.querySelector('#Another2Rounded h2').innerText = total.toFixed(2);
            document.querySelector('#Another4Rounded h2').innerText = deliveryFee.toFixed(2);
            document.querySelector('#Another4Rounded p').innerText = containerFee.toFixed(2);

            // Update total including fees
            let grandTotal = total + deliveryFee + containerFee;
            document.querySelector('#AnotherRounded h2').innerText = `TOTAL (RM) ${grandTotal.toFixed(2)}`;
        }

        // Function to remove item from cart
        function removeItem(index) {
    Swal.fire({
        title: 'Are you sure?',
        text: 'Do you want to remove this item from the cart?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, remove it!'
    }).then((result) => {
        if (result.isConfirmed) {
            let cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];
            cartItems.splice(index, 1);
            localStorage.setItem('cartItems', JSON.stringify(cartItems));
            loadCartItems();
            Swal.fire(
                'Removed!',
                'Your item has been removed from the cart.',
                'success'
            );
        }
    });
}


        // Call loadCartItems when the page loads
        window.onload = loadCartItems;

        // Find the buttons
        var addButton = document.getElementById('addButton');
        var cancelButton = document.getElementById('cancelButton');

        document.getElementById("addButton").addEventListener("click", function(event) {
            event.preventDefault(); // Prevent form submission

            let cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];

            if (cartItems.length === 0) {
                setTimeout(function() {
                    swal({
                        title: "Missing!",
                        text: "Your Cart is empty.",
                        icon: "warning",
                    }).then(function() {
                        window.location.href = "cart.php";
                    });
                }, 100);
                return;
            }

            <?php if(!isset($_SESSION["cust_id"])) {
                echo ' setTimeout(function() {
                    swal({
                        title: "Missing!",
                        text: "Please Login First To Make a Order!!",
                        icon: "warning",
                    }).then(function() {
                        window.location.href = "customer_login.php";
                    });
                }, 100);
                return;';
            } ?>


            let data = {
                cartItems: cartItems
            };

               // localStorage.removeItem('cartItems'); // Clear the cart
               setTimeout(function() {
                            swal({
                                title: "Success!",
                                text: "Select The Delivery Method",
                                icon: "success",
                            }).then(function() {

                                window.location.href = 'orderSummary.php'; // Redirect to confirmation page
                            });
                        }, 100);

       
        });


        // Add click event listener for CANCEL button
        cancelButton.addEventListener('click', function() {
            // Redirect to the home page or another appropriate page
            window.location.href = 'selectedMenu.php'; // Replace with your actual page URL
        });
    </script>

</body>

</html>