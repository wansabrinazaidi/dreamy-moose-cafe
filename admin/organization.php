<?php 
session_start();
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
    <title>DreamyMoose | Organization</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet" />

    <link rel="stylesheet" href="./css/styles.css" />
    <link rel="stylesheet" href="./css/organization.css" />
  </head>
  <body>
    <navbar>
      <div class="flex-row">
        <a class="btn" href="./index.php" style="margin-right: 15px"> <?= $_SESSION["username_admin"] ?> </a>
        <img src="./assets/icons/ic_user.svg" alt="ic_user" />
      </div>

      <div class="flex-row" style="gap: 10px">
        <a class="" href="./dashboard.php"> Home </a>
        <a class="active" href="./organization.php"> Organization </a>
        <a class="" href="menu.php"> Inventory </a>
      </div>
      <img src="./assets/images/logo.png" style="height: 100%" />
    </navbar>

    <div class="main">
      <div class="flex-col" style="gap: 5vw">

        <div class="flex-row" style="margin-top:30px; gap:20px; justify-content: space-between;">

          <div class="card flex-row">
            <img src="./assets/images/org1.png" alt="org1" />
            <div style="margin-left: 20px">
              <p style="border-bottom-left-radius: 0; border-bottom-right-radius: 0;">Alia Afifah</p>
              <p style="border-bottom-left-radius: 0; border-bottom-right-radius: 0;">20 Years Old</p>
              <p>General Manager</p>
            </div>
          </div>

          <div class="flex-row card">
            <img src="./assets/images/org2.png" alt="org2" />
            <div style="margin-left: 20px">
              <p >Nurfatin Sofea</p>
              <p style="border-top-left-radius: 0; border-top-right-radius: 0;">20 Years Old</p>
              <p style="border-top-left-radius: 0; border-top-right-radius: 0;">Baker</p>
            </div>
          </div>
        </div>

        <div class="flex-row"  style="margin-top:30px; gap:20px; justify-content: space-between;">
          <div class="card flex-row">
            <img src="./assets/images/org3.png" alt="org3" />
            <div style="margin-left: 20px">
              <p style="border-bottom-left-radius: 0; border-bottom-right-radius: 0;"> Syarafeena</p>
              <p>20 Years Old</p>
              <p style="border-top-left-radius: 0; border-top-right-radius: 0;">Barista</p>
            </div>
          </div>

          <div class="flex-row card">
            <img src="./assets/images/org4.png" alt="org4" />
            <div style="margin-left: 20px">
              <p style="border-bottom-left-radius: 0; border-bottom-right-radius: 0;">Azira</p>
              <p>20 Years Old</p>
              <p style="border-top-left-radius: 0; border-top-right-radius: 0;">Chef</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
