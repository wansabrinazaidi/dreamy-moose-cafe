<?php 
session_start();
require("connection.php");

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Order Summary</title>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
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
    .text {
        position: absolute;
        top: 5px; /* Adjust the top margin */
        left: 50%;
        transform: translateX(-50%);
        font-size: 75px; /* Adjust the font size */
        color: #405D4C; /* Adjust the color */
    }
    .sub-text {
        position: absolute;
        top: 75px; /* Adjust the top margin */
        left: 50%;
        transform: translateX(-50%);
        font-size: 65px; /* Adjust the font size */
        color: #000000; /* Adjust the color */
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
    /* Style for the inner rounded container */
    #innerRounded {
        border-radius: 20px; /* Adjust as needed */
        background-color: #E2A165; /* Background color for inner container */
        padding: 20px;
        margin: 20px; /* Adjust spacing between outer and inner containers */
        text-align: center;
        position: relative;
        height: 20px; /* Ensure it fills the height of the parent container */
        width: 180px;
        margin-right: 100px;
        margin-left: 550px;
    }
    .item-image {
        width: 250px; /* Adjust image width as needed */
        height: 200px; /* Maintain aspect ratio */
        border-radius: 10px; /* Rounded corners for the image */
        position: absolute;
        top: 0px; /* Distance from the top of the parent container */
        margin-top: 65px;
        right: 335px; /* Distance from the right of the parent container */
        transform: translate(-50%, -50%); /* Center horizontally and vertically */
        margin-right: 100px; /* Adjust margin-right if necessary */
        margin-left: 145px; /* Adjust margin-left if necessary */
    }
    .button-container {
        position: absolute;
        right: 40px;
        bottom: 60px;
        display: flex;
        gap: 10px; /* Space between buttons */
    }
    .button {
        background-color: #623628;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 20px;
        text-decoration: none;
        font-size: 16px;
        transition: background-color 0.3s ease;
        width: 150px; /* Adjust width as needed */
        height: 45px;
    }
    .button:hover {
        background-color: #34483E; /* Darken the hover color */
    }
    .rectangle {
        width: 300px; /* Adjust the width of the rectangle */
        height: 250px; /* Adjust the height of the rectangle */
        border: 5px solid #34483E; /* Border color (#34483E) and thickness */
        border-radius: 10px; /* Rounded corners for the rectangle */
        font-weight: bold; /* Make the border bold */
        color: #34483E; /* Text color of the rectangle */
        position: absolute; /* Position the rectangle absolutely */
        top: 50%; /* Position at 50% from the top */
        left: 85%; /* Position at 50% from the left */
        right: 890px; /* Distance from the right of the parent container */
        transform: translate(-50%, -50%); /* Center the rectangle */
    }
    #OtherRounded {
        border-radius: 20px; /* Adjust as needed */
        background-color: #B5DDAB; /* Background color for inner container */
        padding: 20px;
        margin: 20px; /* Adjust spacing between outer and inner containers */
        text-align: center;
        position: relative;
        height: 20px; /* Ensure it fills the height of the parent container */
        width: 150px;
        margin-right: 40px;
        margin-left: 25px;
    }
    .radio-label {
        display: block;
        margin-bottom: 20px; /* Adjust margin bottom as needed */
        position: absolute; /* Position the label absolutely */
        left: 50%; /* Position at 50% from the left */
        transform: translateX(-50%); /* Center horizontally */
        width: 100%; /* Make the label full width */
    }
    .radio-input {
        margin-right: 10px;
    }
    .online-banking-label {
        top: 90px; /* Distance from the top of the parent container */
    }
    .cash-label {
        top: 130px; /* Distance from the top of the parent container to create the gap */
        left: 52px;
    }
	
	    #AnotherRounded {
        border-radius: 20px; /* Adjust as needed */
        background-color: #D6A067; /* Background color for inner container */
        padding: 20px;
        margin: 20px; /* Adjust spacing between outer and inner containers */
        text-align: center;
        position: absolute; /* Position absolutely within its parent */
        top: 410px; /* Distance from the top of the parent container */
        left: 160px; /* Distance from the left of the parent container */
        height: 20px; /* Adjust height as needed */
        width: 100px;
    }
    #Another2Rounded {
        border-radius: 20px; /* Adjust as needed */
        background-color: #D6A067; /* Background color for inner container */
        padding: 20px;
        margin: 20px; /* Adjust spacing between outer and inner containers */
        text-align: center;
        position: absolute; /* Position absolutely within its parent */
        top: 410px; /* Distance from the top of the parent container */
        left: 550px; /* Distance from the left of the parent container */
        height: 15px; /* Adjust height as needed */
        width: 50px;
    }
	#Another3Rounded {
            border-radius: 20px; /* Adjust as needed */
            background-color: #708B7B; /* Background color for inner container */
            padding: 20px;
            margin: 20px; /* Adjust spacing between outer and inner containers */
            text-align: center;
            position: absolute; /* Position absolutely within its parent */
            top: 350px; /* Distance from the top of the parent container */
            left: 110px; /* Distance from the right of the parent container */
            height: 15px; /* Adjust height as needed */
            width: 200px;
		   margin-top:0px;
        }
	
	#Another4Rounded {
            border-radius: 20px; /* Adjust as needed */
            background-color: #708B7B; /* Background color for inner container */
            padding: 20px;
            margin: 20px; /* Adjust spacing between outer and inner containers */
            text-align: center;
            position: absolute; /* Position absolutely within its parent */
            top: 350px; /* Distance from the top of the parent container */
            left: 475px; /* Distance from the right of the parent container */
            height: 15px; /* Adjust height as needed */
            width: 200px;
		    margin-top:0px;
        }
</style>
</head>
<body>
    <div class="text">Dreamy</div>
    <div class="sub-text">Moose</div>
    <div id="rcorners1">
        <!-- Content of the Order Summary page goes here -->
        <div class="rectangle">
            <div id="OtherRounded">
                <h2 style="color: #623628;font-size:15px;margin-top:4px;">Payment Method</h2>
                <!-- Radio button for Online Banking -->
                <label class="radio-label online-banking-label">
                    <input type="radio" name="payment-method" class="radio-input" value="online banking">
                    <span style="font-size: 18px;color: white;">Online Banking</span>
                </label>
                <!-- Radio button for Cash -->
                <label class="radio-label cash-label">
                    <input type="radio" name="payment-method" class="radio-input" value="cash">
                    <span style="font-size: 18px;color:white">Cash</span>
                </label>
            </div>
        </div>
        <div id="innerRounded">
            <h2 style="color: white; font-size: 18px; margin-top: 5px;">ORDER SUMMARY</h2>
        </div>
		<div id="AnotherRounded">
            <h2 style="color: black;font-size:15px;margin-top:4px;">TOTAL (RM) </h2>
        </div>
    


        <div id="cartContainer">
        <!-- Cart items will be populated by JavaScript -->
    </div>

        <div id="Another2Rounded">
            <h2 style="color: black;font-size:15px;margin-top:0px;">RM 50.00</h2>
        </div>

		<div id="Another3Rounded">
         
			 <h2 style="color: black;font-size:13px;margin-top:0px;">Delivery Fee</h2>
			 <p style="color: black;font-size:13px;margin-top:10px;">Container/Processing Fee</p>
        </div>
		<div id="Another4Rounded">
			 <h2 style="color: black;font-size:13px;margin-top:0px;">4.99</h2>
			 <p style="color: black;font-size:13px;margin-top:10px;">2.99</p>
        </div>
        <!-- Buttons inside the rcorners1 container -->
        <div class="button-container">
            <button id="cancelButton" class="button">CANCEL</button>
			<button id="addButton" class="button">PLACE ORDER</button>
        </div>
        <img src="Pictures/Order.png" alt="Product Image" class="item-image">
    </div>

    <!-- JavaScript for button functionality -->
    <script>
        // Find the buttons
        var addButton = document.getElementById('addButton');
        var cancelButton = document.getElementById('cancelButton');

        document.getElementById("addButton").addEventListener("click", function(event) {
    event.preventDefault(); // Prevent form submission

    // Get the selected payment method
    let paymentMethod = document.querySelector('input[name="payment-method"]:checked');

    if (paymentMethod == null) {
        setTimeout(function() {
                    swal({
                        title: "Missing!",
                        text: "Please select a payment method.",
                        icon: "warning",
                    }).then(function() {
                        window.location.href = "orderSummary.php";
                    });
                }, 100);
                return;
    }

    let cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];

if (cartItems.length === 0) {
    setTimeout(function() {
                    swal({
                        title: "Missing!",
                        text: "Your Cart is empty.",
                        icon: "warning",
                    }).then(function() {
                        window.location.href = "orderSummary.php";
                    });
                }, 100);
                return;
}

    // Prepare the data to send to the server
    let data = {
        paymentMethod: paymentMethod.value,
        cartItems: cartItems
    };

    fetch('query/update_order.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    })
    .then(response => response.json())
    .then(result => {
        if (result.success) {
            localStorage.removeItem('cartItems');
            setTimeout(function() {
                            swal({
                                title: "Success!",
                                text: "Order placed successfully!",
                                icon: "success",
                            }).then(function() {

                                window.location.href = 'order-details.php'; // Redirect to confirmation page
                            });
                        }, 100);
        } else {
            alert("Failed to place order. Please try again.");
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert("An error occurred. Please try again.");
    });
});


        // Add click event listener for CANCEL button
        cancelButton.addEventListener('click', function() {
            // Redirect to the home page or another appropriate page
            window.location.href = 'menu.php'; // Replace with your actual page URL
        });

        function loadCartItems() {
    const cartContainer = document.getElementById('cartContainer');
    cartContainer.innerHTML = ''; // Clear any existing content

    let cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];

    console.log(cartItems);
    cartItems.forEach((item, index) => {
        const itemElement = document.createElement('h3');
        itemElement.innerText = `${item.quantity}X ${item.itemName} RM${(item.price * item.quantity).toFixed(2)}`;
        
        cartContainer.appendChild(itemElement);
    });

    updateTotal();
}

function updateTotal() {
    let cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];
    let total = cartItems.reduce((sum, item) => sum + item.price * item.quantity, 0);
    let deliveryFee = 4.99;
    let containerFee = 2.99;

    document.querySelector('#Another2Rounded h2').innerText = `RM ${total.toFixed(2)}`;
    document.querySelector('#Another4Rounded h2').innerText = deliveryFee.toFixed(2);
    document.querySelector('#Another4Rounded p').innerText = containerFee.toFixed(2);

    // Update total including fees
    let grandTotal = total + deliveryFee + containerFee;
    document.querySelector('#AnotherRounded h2').innerText = `TOTAL (RM) ${grandTotal.toFixed(2)}`;
}

loadCartItems();
    </script>
</body>
</html>
