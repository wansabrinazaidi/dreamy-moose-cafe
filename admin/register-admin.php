<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>DreamyMoose | Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.css">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <link rel="stylesheet" href="./css/styles.css" />
    <link rel="stylesheet" href="./css/login.css" />
  </head>

  <body>
  <?php
include '../connection.php'; // Include your database connection file

if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $position = $_POST['position'];
    $password = $_POST['password'];
    $date = date('Y-m-d'); // or you can use any other format or value for the date
    $inventory_id = 1; // Assign appropriate value or fetch it as needed

    // Sanitize input
    $username = mysqli_real_escape_string($conn, $username);
    $email = mysqli_real_escape_string($conn, $email);
    $position = mysqli_real_escape_string($conn, $position);
    $password = mysqli_real_escape_string($conn, $password);
    
    // Check if user already exists
    $check_user_query = "SELECT admin_name FROM admin WHERE admin_name = '$username'";
    $result = mysqli_query($conn, $check_user_query);

    if(mysqli_num_rows($result) > 0){
        echo "<script>
        swal({
            title: 'Username already exists',
            text: 'Please choose another username',
            icon: 'error'
        }).then(function() {
            window.location.href = 'index.php';
        });
        </script>";
    } else {
        // Insert query
        $insert_query = "INSERT INTO `admin`(`admin_id`, `admin_name`, `position`, `date`, `admin_email`, `admin_password`, `inventory_id`) VALUES (NULL, '$username', '$position', '$date', '$email', '$password', '$inventory_id')";

        if(mysqli_query($conn, $insert_query)){
            $_SESSION["username_admin"] = $username;
            header("Location: dashboard.php");
        } else {
            echo "<script>
            swal({
                title: 'Error',
                text: 'Failed to register',
                icon: 'error'
            }).then(function() {
                window.location.href = 'index.php';
            });
            </script>";
        }
    }
}
?>
    <navbar style="background: none;">
      <div class="flex-row" style="margin: 20px 0; gap: 10px">
        <a class="btn" href="#"> Login </a>
        <img src="./assets/icons/ic_user.svg" alt="ic_user" />
      </div>
    </navbar>

    <div class="main">
      <div class="flex-col">
        <img
          src="./assets/images/login2.png"
          style="height: 200px; width: auto" />
      </div>
      <div class="flex-row">
        <img src="./assets/images/login1.png" />
        <form action="" method="post" style="height: fit-content; gap: 20px">
          <table>
            <tbody>
              <tr>
                <td>
                  <label for="username">Username: </label>
                </td>
                <td>
                  <input type="text" name="username" id="username" />
                </td>
              </tr>
              <tr>
                <td>
                  <label for="email">Email: </label>
                </td>
                <td>
                  <input type="text" name="email" id="email" />
                </td>
              </tr>
              <tr>
                <td>
                  <label for="position">position: </label>
                </td>
                <td>
                  <input type="text" name="position" id="position" />
                </td>
              </tr>

              <tr>
                <td>
                  <label for="password">Password: </label>
                </td>
                <td>
                  <input type="password" name="password" id="password" />
                </td>
              </tr>
            </tbody>
          </table>
          <div class="w-full flex-row" style="justify-content: right">
            <input type="submit" value="Register" class="btn" name="submit" />
            <a href="index.php">Click to login as Admin</a>
          </div>
        </form>
      </div>
    </div>
  </body>
</html>
