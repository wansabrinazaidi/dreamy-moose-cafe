

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Page</title>
    <style>
        /* Your CSS styles */
    </style>
    <!-- SweetAlert library -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>
<style> body { background-image: url('Pictures/Background.jpg'); background-size: cover; background-position: center; text-align: center; font-family: Arial, sans-serif; } form { background-color: transparent; padding: 30px; border-radius: 10px; box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1); border: none; } input[type="text"], input[type="email"], input[type="password"] { width: calc(100% - 22px); padding: 10px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 5px; } button[type="submit"] { background-color: #007bff; color: #fff; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer; transition: background-color 0.3s ease; } button[type="submit"]:hover { background-color: #0056b3; } p a.white-link { color: #FFFFFF; text-decoration: none; } p a.white-link:hover { text-decoration: underline; } p.message { color: #333; font-weight: bold; } </style>
<body>
<?php
session_start();

// Redirect to menu.php if user is already logged in
if (isset($_SESSION['username'])) {
    header("Location: menu.php");
    exit; // Make sure to exit after redirecting
}

include('connection.php');

$signup_message = "";

if (isset($_POST['signup_submit'])) {
    // Sanitize input to prevent SQL injection
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);

    // Prepare SQL query to insert data into customer table
    $sql = "INSERT INTO customer (cust_name, cust_phonenum, cust_address, cust_email, cust_password) VALUES ('$username', '$phone', '$address', '$email', '$password')";

    // Execute the query
    $result = mysqli_query($conn, $sql);

    if ($result) {
        // Registration successful
        $signup_message = "Registration successful!";
        // Show SweetAlert success message
        echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'Registration Successful',
                    text: 'You have successfully registered!',
                    confirmButtonText: 'OK'
                }).then(function() {
                    window.location = 'customer_login.php'; // Redirect to login page
                });
             </script>";
        exit; // Make sure to exit after showing the alert and redirecting
    } else {
        // Registration failed
        $signup_message = "Registration failed! " . mysqli_error($conn);
    }

    // Close database connection
    mysqli_close($conn);
}
?>
    <!-- Your HTML content -->
    <div style="margin-top: 50px;">
        <!-- Your existing content -->
    </div>
    <form action="signup.php" method="POST" style="max-width: 400px; margin: 50px auto; border: none;">
        <h3 style="color: #333;">Signup</h3>
        <label for="username" style="display: block; margin-bottom: 5px; color: #333;">Username:</label>
        <input type="text" id="username" name="username" style="width: 100%; padding: 10px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 5px;" required>
        <label for="email" style="display: block; margin-bottom: 5px; color: #333;">Email:</label>
        <input type="email" id="email" name="email" style="width: 100%; padding: 10px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 5px;" required>
        <label for="password" style="display: block; margin-bottom: 5px; color: #333;">Password:</label>
        <input type="password" id="password" name="password" style="width: 100%; padding: 10px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 5px;" required>
        <label for="phone" style="display: block; margin-bottom: 5px; color: #333;">Phone Number:</label>
        <input type="text" id="phone" name="phone" style="width: 100%; padding: 10px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 5px;" required>
        <label for="address" style="display: block; margin-bottom: 5px; color: #333;">Address:</label>
        <input type="text" id="address" name="address" style="width: 100%; padding: 10px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 5px;" required>
        <button type="submit" name="signup_submit" style="background-color: #007bff; color: #fff; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer;">Signup</button>
    </form>
    <p>Already have an account? <a href="customer_login.php" class="white-link">Login here</a>.</p>

    <?php if (!empty($signup_message)): ?>
        <p style="color: #333; font-weight: bold;"><?php echo $signup_message; ?></p>
    <?php endif; ?>
</body>
</html>
