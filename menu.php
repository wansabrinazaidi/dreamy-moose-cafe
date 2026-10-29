<?php
session_start();
require("connection.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selected Items</title>
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
            width: 1250px;
            height: 550px;
            margin-top: 170px;
            margin-bottom: 100px;
            margin-left: auto;
            margin-right: auto;
            text-align: center;
            position: relative;
        }
        a{
            color:black;
        }

        .menu-category {
            display: inline-block;
            vertical-align: top;
            width: 20%;
            padding: 10px;
            background-color: #d2d5c7;
            border-radius: 10px;
            text-align: left;
        }

        .menu-category button {
            display: block;
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            background-color: #8a8c76;
            border: none;
            color: white;
            cursor: pointer;
            border-radius: 5px;
            text-align: left;
        }

        .menu-category button:hover {
            background-color: #6e705d;
        }

        .menu-items {
            display: inline-block;
            vertical-align: top;
            width: 75%;
            padding: 10px;
        }

        .menu-item div {
            display: inline-block;
            margin-right: 10px;
        }

        .menu-item img {
            width: 150px;
            height: 150px;
            border-radius: 10px;
        }

        .menu-item h3 {
            margin: 10px 0;
            font-size: 1.2em;
        }

        .customization-container {
            display: none;
            width: 97%;
            padding: 20px;
            background-color: #d2d5c7;
            border-radius: 10px;
        }

        .customization-container img {
            width: 150px;
            height: 150px;
        }

        .customization-container h2,
        .customization-container h3 {
            margin: 10px 0;
        }

        .customization-container button {
            margin: 10px;
        }

        .cart-container button {
            margin: 10px;
        }

        .cart-container {
            display: none;
            width: 100%;
            padding: 20px;
            background-color: #D2D5C7;
            border-radius: 10px;
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
        <div class="menu-category">
            <button onclick="showMenu('coffee')">Coffee</button>
            <button onclick="showMenu('non-coffee')">Non Coffee</button>
            <button onclick="showMenu('frappe')">Frappee</button>
            <button onclick="showMenu('pastries')">Pastries</button>
            <button onclick="showMenu('hot-meals')">Hot Meals</button>
        </div>
        <div class="menu-items">
            <!-- Coffee Menu -->
            <div id="coffee" class="menu-item">
                <h2>Coffee</h2>

                <?php
                $select_coffee = mysqli_query($conn, "SELECT * FROM menu WHERE menu_category = 'coffee'");
                while ($data_coffee = mysqli_fetch_assoc($select_coffee)) {
                ?>
                    <a href="selectedMenu.php?order_id=<?= $data_coffee["menu_id"] ?>">
                        <div>
                            <h3><?= $data_coffee["menu_name"] ?></h3>
                            <img src="admin/assets/images/<?= $data_coffee['menu_image'] ?> " alt="menu1" />
                            <p>RM <?= $data_coffee['menu_price'] ?></p>
                        </div>
                    </a>
                <?php } ?>
            </div>
            <!-- Non-Coffee Menu -->
            <div id="non-coffee" class="menu-item">
                <h2>Non Coffee</h2>
                <?php
                $select_non_coffee = mysqli_query($conn, "SELECT * FROM menu WHERE menu_category = 'non-coffee'");
                while ($data_non_coffee = mysqli_fetch_assoc($select_non_coffee)) {
                ?>
                    <a href="selectedMenu.php?order_id=<?= $data_non_coffee["menu_id"] ?>">
                        <div>
                            <h3><?= $data_non_coffee["menu_name"] ?></h3>
                            <img src="admin/assets/images/<?= $data_non_coffee['menu_image'] ?>" alt="menu1" />
                            <p>RM <?= $data_non_coffee['menu_price'] ?></p>
                        </div>
                    </a>
                <?php } ?>
            </div>
            <!-- Frappee Menu -->
            <div id="frappe" class="menu-item">
                <h2>Frappee</h2>
                <?php
                $select_frappe = mysqli_query($conn, "SELECT * FROM menu WHERE menu_category = 'frappe'");
                while ($data_frappe = mysqli_fetch_assoc($select_frappe)) {
                ?>
                    <a href="selectedMenu.php?order_id=<?= $data_frappe["menu_id"] ?>">
                        <div>
                            <h3><?= $data_frappe["menu_name"] ?></h3>
                            <img src="admin/assets/images/<?= $data_frappe['menu_image'] ?> " alt="menu1" />
                            <p>RM <?= $data_frappe['menu_price'] ?></p>
                        </div>
                    </a>
                <?php } ?>
            
            </div>
            <!-- Pastries Menu -->
            <div id="pastries" class="menu-item">
                <h2>Pastries</h2>
                <?php
                $select_pastries = mysqli_query($conn, "SELECT * FROM menu WHERE menu_category = 'pastries'");
                while ($data_pastries = mysqli_fetch_assoc($select_pastries)) {
                ?>
                    <a href="selectedMenu.php?order_id=<?= $data_pastries["menu_id"] ?>">
                        <div>
                            <h3><?= $data_pastries["menu_name"] ?></h3>
                            <img src="admin/assets/images/<?= $data_pastries['menu_image'] ?> " alt="menu1" />
                            <p>RM <?= $data_pastries['menu_price'] ?></p>
                        </div>
                    </a>
                <?php } ?>
            
            </div>
            <!-- Hot Meals Menu -->
            <div id="hot-meals" class="menu-item">
                <h2>Hot Meals</h2>
                <?php
                $select_meals = mysqli_query($conn, "SELECT * FROM menu WHERE menu_category = 'hot-meals'");
                while ($data_meals = mysqli_fetch_assoc($select_meals)) {
                ?>
                    <a href="selectedMenu.php?order_id=<?= $data_meals["menu_id"] ?>">
                        <div>
                            <h3><?= $data_meals["menu_name"] ?></h3>
                            <img src="admin/assets/images/<?= $data_meals['menu_image'] ?> " alt="menu1" />
                            <p>RM <?= $data_meals['menu_price'] ?></p>
                        </div>
                    </a>
                <?php } ?>
             
            </div>
        </div>
        <div id="customization-container" class="customization-container">
            <h2 id="customization-item-name"></h2>
            <img id="customization-item-img" src="" alt="Custom Item Image">
            <h3 id="customization-item-price"></h3>
            <h3>Type</h3>
            <label>
                <input type="radio" name="type" value="hot" checked>Hot
            </label>
            <label>
                <input type="radio" name="type" value="Cold" checked>Cold
            </label>
            <h3>Size</h3>
            <label>
                <input type="radio" name="size" value="small" checked> Small
            </label>
            <label>
                <input type="radio" name="size" value="large" price=1.50> Large
            </label>
            <h3>Extras</h3>
            <label>
                <input type="checkbox" name="extra" value="whipped_cream"> Whipped Cream
            </label>
            <label>
                <input type="checkbox" name="extra" value="sugar"> Sugar
            </label>
            <h3>Quantity</h3>
            <input type="number" id="item-quantity" value="1" min="1" max="10">
            <br>
            <button onclick="addToCart()">Proceed</button>
            <button onclick="cancelCustomization()">Back</button>
        </div>
        <div class="cart-container" id="cart-container">
            <h2>Your Cart</h2>
            <ul id="cart-items">
                <!-- Cart items will be appended here -->
            </ul>
            <p>Total: RM <span id="cart-total">0.00</span></p>
            <button onclick="checkout()">Checkout</button>
        </div>
    </div>
    <script>
        let previousScrollPosition = 0;

        function showCustomization(itemName, itemPrice, itemImg) {
            previousScrollPosition = document.querySelector('.menu-items').scrollTop;
            document.getElementById('customization-item-name').textContent = itemName;
            document.getElementById('customization-item-price').textContent = 'RM ' + itemPrice.toFixed(2);
            document.getElementById('customization-item-img').src = itemImg;
            const customizationContainer = document.getElementById('customization-container');
            customizationContainer.style.display = 'block';
            document.querySelector('.menu-items').style.display = 'none';
            document.querySelector('.menu-category').style.display = 'none';
        }

        function cancelCustomization() {
            document.getElementById('customization-container').style.display = 'none';
            document.querySelector('.menu-items').style.display = 'block';
            document.querySelector('.menu-category').style.display = 'inline-block';
            document.querySelector('.menu-items').scrollTop = previousScrollPosition;
        }


        function showMenu(category) {
            const categories = ['coffee', 'non-coffee', 'frappe', 'pastries', 'hot-meals'];
            categories.forEach(cat => {
                document.getElementById(cat).style.display = cat === category ? 'block' : 'none';
            });
        }
        // Display coffee menu by default
        showMenu('coffee');
    </script>
    </div>
</body>

</html>