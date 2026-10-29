<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        body {
            background-image: url('Pictures/Background.jpg');
            background-size: cover;
            background-position: center;
            text-align: center;
            font-family: Arial, sans-serif;
        }

        .row {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
            gap: 20px; /* Add this line to create space between columns */
        }

        .column {
            padding: 5px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Subtle shadow for depth */
            flex: 1; /* Equal width columns */
            max-width: 300px; /* Max width for each column */
        }

        .column img {
            width: 50%;
            height: auto;
            margin-top: 40px;
        }

        .login-options {
            margin-top: 10px;
        }

        .login-option {
            background-color: #007bff;
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
            background-color: #0056b3;
        }

        .login-as {
            color: #000000;
            font-size: 20px;
            top: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100px; /* Adjust this height as needed */
        }

        .admin-column {
            margin-right: 0px; /* Adjust the right margin to move the admin column more to the right */
			margin-left:40px;
        }
    </style>
</head>
<body>
    <div style="margin-top: 50px;">
        <h2 style="color: #333;">
            <span style="color: #FEFEFE; font-size: 32px;">Welcome peeps!</span><br>
            <span style="color: #E2A165; font-size: 98.2px;">DREAMY</span><br>
            <span style="color: #000000; font-size: 98.2px;">MOOSE</span><br>
            <span style="color: #FEFEFE; font-size: 23px;">“Where coffee meets comfort”</span><br>
        </h2>
    </div>

    <div class="row">
        <div class="column admin-column">
            <img src="Pictures/Admin.jpg" alt="Admin">
            <div class="login-options">
                <a href="admin" class="login-option">Admin</a>
            </div>
        </div>
        
        <div class="column">
            <img src="Pictures/Customer.jpg" alt="Customer">
            <div class="login-options">
                <a href="customer_login.php" class="login-option">Customer</a>
            </div>
        </div>
    </div>

    <div class="login-as">
        <p>Log in as?</p>
    </div>
	
	
</body>
</html>