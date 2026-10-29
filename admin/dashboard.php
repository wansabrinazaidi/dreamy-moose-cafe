<?php 
session_start();
require("../connection.php");
if(!isset($_SESSION["username_admin"])){
  header("Location: index.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>DreamyMoose | Dashboard</title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="./css/styles.css" />
  <link rel="stylesheet" href="./css/dashboard.css" />
</head>
<body>
  <navbar>
    <div class="flex-row">
      <a class="btn" href="./index.php" style="margin-right: 15px"> <?= $_SESSION["username_admin"] ?> </a>
      <img src="./assets/icons/ic_user.svg" alt="ic_user" />
    </div>
    <div class="flex-row" style="gap: 10px">
      <a class="active" href="./dashboard.php"> Home </a>
      <a class="" href="organization.php"> Organization </a>
      <a class="" href="menu.php"> Inventory </a>
    </div>
    <img src="./assets/images/logo.png" style="height: 100%" />
  </navbar>
  <div class="main">
    <div class="flex-row" style="justify-content: start; gap: 5vw; padding-left: 5vw">
      <img src="./assets/images/dashboard1.png" style="height: 60vh; width: auto" />
      <div class="flex-col" style="align-items: start">
        <h1>Hello Manager!</h1>
        <h2 id="current-date">SUNDAY | 14 APRIL 2024</h2>
        <?php 
        $get_total_payment = mysqli_query($conn,"SELECT SUM(total) FROM payment");
        $total_payment = mysqli_fetch_assoc($get_total_payment);
        ?>
        <p style="border-bottom-left-radius: 0;border-bottom-right-radius: 0">
          <strong>Sales: </strong> <?= $total_payment["SUM(total)"] ?>
        </p>
        <p style="border-top-left-radius: 0; padding-right: 15px;">
          <strong>Profit: </strong> <?= 0.15*$total_payment["SUM(total)"] ?>
        </p>
      </div>
    </div>
  </div>
  <script>
    function getCurrentDate() {
      const days = ["SUNDAY", "MONDAY", "TUESDAY", "WEDNESDAY", "THURSDAY", "FRIDAY", "SATURDAY"];
      const months = ["JANUARY", "FEBRUARY", "MARCH", "APRIL", "MAY", "JUNE", "JULY", "AUGUST", "SEPTEMBER", "OCTOBER", "NOVEMBER", "DECEMBER"];
      
      const now = new Date();
      const day = days[now.getDay()];
      const date = now.getDate();
      const month = months[now.getMonth()];
      const year = now.getFullYear();
      
      return `${day} | ${date} ${month} ${year}`;
    }

    document.getElementById('current-date').textContent = getCurrentDate();
  </script>
</body>
</html>
