

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Login</title>
 
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.7/dist/sweetalert2.min.css">

<!-- Include SweetAlert JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.7/dist/sweetalert2.min.js"></script>
    <style>
        body {
            background-image: url('Pictures/Background.jpg');
            background-size: cover;
            background-position: center;
            text-align: center;
            font-family: Arial, sans-serif;
        }
        a.white-link {
            color: #FFFFFF; /* White color for the link */
        }
        a.white-link:hover {
            text-decoration: underline; /* Optional: Underline on hover */
        }
    </style>
</head>
<body>
<?php
session_start();

// Redirect logged-in users to menu.php
if (isset($_SESSION['username'])) {
    header("Location: menu.php");
    exit; // Make sure to exit after redirecting
}

$login = false;
include('connection.php');

if (isset($_POST['submit'])) {
    $username_or_email = $_POST['username'];
    $password = $_POST['password'];
    
    // Query to check if customer credentials are correct
    // Prepared statement to prevent SQL injection
    $stmt = mysqli_prepare($conn, "SELECT * FROM customer WHERE cust_name = ? OR cust_email = ?");
    mysqli_stmt_bind_param($stmt, "ss", $username_or_email, $username_or_email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        // Check if passwords match (assuming plaintext passwords for demonstration, NOT recommended in production)
        if ($password == $row["cust_password"]) {
            $login = true;
            $_SESSION['username'] = $row['cust_name']; // Storing customer username in session
            $_SESSION['cust_id'] = $row['cust_id']; // Storing customer username in session
            $_SESSION['loggedin'] = true;
            // Redirect to menu.php after successful login
            header("Location: menu.php");
            exit; // Make sure to exit after redirecting
        } else {
            echo "<script>
                    swal.fire({
                        title: 'Oops!',
                        text: 'Login failed. Invalid username or password!',
                        icon: 'error',
                        button: 'Ok',
                    });
                  </script>";
        }
    } else {
        echo "<script>
                swal.fire({
                    title: 'Oops!',
                    text: 'Login failed. Invalid username or password!',
                    icon: 'error',
                    button: 'Ok',
                });
              </script>";
    }
    
    mysqli_close($conn);
}
?>
    <div style="margin-top: 50px;">
        <h2 style="color: #333;">
            <span style="color: #FEFEFE; font-size: 30px;">Welcome peeps!</span><br>
            <span style="color: #E2A165; font-size: 98.2px;">DREAMY</span><br>
            <span style="color: #000000; font-size: 98.2px;">MOOSE</span><br>
            <span style="color: #FEFEFE; font-size: 22px;">“Where coffee meets comfort”</span><br>
        </h2>
    </div>
    <form action="customer_login.php" method="POST" style="max-width: 400px; margin: 50px auto;">
        <h3 style="color: #333;">Customer Login</h3>
        <label for="username" style="display: block; margin-bottom: 5px; color: #333;">Username or Email:</label>
        <input type="text" id="username" name="username" style="width: 100%; padding: 10px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 5px;" required>
        <label for="password" style="display: block; margin-bottom: 5px; color: #333;">Password:</label>
        <input type="password" id="password" name="password" style="width: 100%; padding: 10px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 5px;" required>
        <button type="submit" name="submit" style="background-color: #007bff; color: #fff; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer;">Login</button>
    </form>
    <p>Are you new? <a href="signup.php" class="white-link">Click here</a> to signup.</p>

</body>
</html>
