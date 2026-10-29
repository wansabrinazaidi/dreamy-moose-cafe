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

require("../connection.php");
if(isset($_POST['submit'])){
$username = $_POST['username'];
$password = $_POST['password'];
// Prepared statement to prevent SQL injection
$stmt = mysqli_prepare($conn, "SELECT admin_name FROM admin WHERE admin_name = ? AND admin_password = ?");
mysqli_stmt_bind_param($stmt, "ss", $username, $password);
mysqli_stmt_execute($stmt);
$data_admin = mysqli_stmt_get_result($stmt);
if(mysqli_num_rows($data_admin) > 0){
  session_regenerate_id(true);
  $_SESSION["username_admin"] = $username;
  header("Location: dashboard.php");
  exit;
}else{
  echo "<script>
  swal({
      title: 'Invalid Username or Password',
      text: 'Please try again',
      icon: 'error'
  }).then(function() {
      window.location.href = 'index.php';
  });
</script>";

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
                  <label for="password">Password: </label>
                </td>
                <td>
                  <input type="password" name="password" id="password" />
                </td>
              </tr>
            </tbody>
          </table>
          <div class="w-full flex-row" style="justify-content: right">
            <input type="submit" value="Login" class="btn" name="submit" />
            <a href="register-admin.php">Click to register admin </a>
          </div>
        </form>
      </div>
    </div>
  </body>
</html>
