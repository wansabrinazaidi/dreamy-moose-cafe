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
  <title>DreamyMoose | Organization</title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet" />

  <link rel="stylesheet" href="./css/styles.css" />
  <link rel="stylesheet" href="./css/menu.css" />
</head>

<body>
  <div id="top"></div>
  <navbar>
    <div class="flex-row">
      <a class="btn" href="./index.php" style="margin-right: 15px">
        <?= $_SESSION["username_admin"] ?>
      </a>
      <img src="./assets/icons/ic_user.svg" alt="ic_user" />
    </div>

    <div class="flex-row" style="gap: 10px">
      <a class="" href="./dashboard.php"> Home </a>
      <a class="" href="./organization.php"> Organization </a>
      <a class="active" href="menu.php"> Inventory </a>
    </div>
    <img src="./assets/images/logo.png" style="height: 100%" />
  </navbar>

  <div class="main">
    <nav>
      <div class="flex-row">
        <label>
          <form id="searchForm" onsubmit="return false;">
            <input type="text" id="searchInput" style="margin-right: 15px;" placeholder="Search..." />
          </form>
          <img src="./assets/icons/ic_search.svg" alt="ic_user" />
        </label>
      </div>

      <div class="flex-row" style="gap: 10px">
        <a class="active" href="./menu.php"> Menus </a>
        <a class="" href="./additem.php"> Add New </a>
        <a class="" href="./removeitem.php"> Remove Menu </a>
        <a class="" href="./updateitem.php"> Update Menu </a>
        <a class="" href="./orderdetails.php"> Order Details</a>
      </div>
    </nav>

    <div style="display: flex; margin: 30px 0; gap: 20px; width: 70%">
      <a class="btn" href="#coffee"> Coffee</a>
      <a class="btn" href="#noncoffee"> Non-Coffee</a>
      <a class="btn" href="#frappe"> Frappe</a>
      <a class="btn" href="#pastries"> Pastries</a>
      <a class="btn" href="#hotmeals"> Hot Meals</a>
    </div>

    <section id="coffee">
      <div>
        <div class="title">
          <h2>Coffee</h2>
          <div>
            <div class="border"></div>
          </div>
        </div>
        <div class="flex-row">
          <?php
          $sql_coffee = mysqli_query($conn, "SELECT *, COUNT(menu_name) AS quantity
FROM menu m
WHERE m.menu_category = 'coffee'
GROUP BY m.menu_id, m.menu_name, m.menu_category, m.menu_price, m.description;
");
          
          while ($data_coffee = mysqli_fetch_assoc($sql_coffee)) {
          ?>
            <div class="card">
              <img src="./assets/images/<?= $data_coffee['menu_image'] ?> " alt="menu1" />
              <div class="card-details">
                <h3><?= $data_coffee['menu_name'] ?> | RM <?= $data_coffee['menu_price'] ?></h3>
                <h4>Quantity: <?= $data_coffee['quantity'] ?></h4>
                <h5>Last Updated: <?= $data_coffee['date'] ?></h5>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
    </section>

    <section id="noncoffee">
      <div>
        <div class="title">
          <h2>Non Coffee</h2>
          <div>
            <div class="border"></div>
          </div>
        </div>
        <div class="flex-row">
          <?php
          $sql_non_coffee = mysqli_query($conn, "SELECT *, COUNT(menu_name) AS quantity
          FROM menu m
          WHERE m.menu_category = 'non-coffee'
          GROUP BY m.menu_id, m.menu_name, m.menu_category, m.menu_price, m.description;
          ");
          while ($data_non_coffee = mysqli_fetch_assoc($sql_non_coffee)) {
          ?>
            <div class="card">
              <img src="./assets/images/<?= $data_non_coffee['menu_image'] ?> " alt="menu1" />
              <div class="card-details">
                <h3><?= $data_non_coffee['menu_name'] ?> | RM <?= $data_non_coffee['menu_price'] ?></h3>
                <h4>Quantity: <?= $data_non_coffee['quantity'] ?></h4>
                <h5>Last Updated: <?= $data_non_coffee['date'] ?></h5>
              </div>
            </div>
          <?php } ?>

        </div>
      </div>
    </section>

    <section id="frappe">
      <div>
        <div class="title">
          <h2>Frappe</h2>
          <div>
            <div class="border"></div>
          </div>
        </div>
        <div class="flex-row">
          <?php
          $sql_frappe = mysqli_query($conn, "SELECT *, COUNT(menu_name) AS quantity
          FROM menu m
          WHERE m.menu_category = 'frappe'
          GROUP BY m.menu_id, m.menu_name, m.menu_category, m.menu_price, m.description;
          ");
          while ($data_frappe = mysqli_fetch_assoc($sql_frappe)) {
          ?>
            <div class="card">
              <img src="./assets/images/<?= $data_frappe['menu_image'] ?> " alt="menu1" />
              <div class="card-details">
                <h3><?= $data_frappe['menu_name'] ?> | RM <?= $data_frappe['menu_price'] ?></h3>
                <h4>Quantity: <?= $data_frappe['quantity'] ?></h4>
                <h5>Last Updated: <?= $data_frappe['date'] ?></h5>
              </div>
            </div>
          <?php } ?>

        </div>
      </div>
    </section>

    <section id="pastries">
      <div>
        <div class="title">
          <h2>Pastries</h2>
          <div>
            <div class="border"></div>
          </div>
        </div>
        <div class="flex-row">
          <?php
              $sql_pastries = mysqli_query($conn, "SELECT *, COUNT(menu_name) AS quantity
              FROM menu m
              WHERE m.menu_category = 'pastries'
              GROUP BY m.menu_id, m.menu_name, m.menu_category, m.menu_price, m.description;
              ");
          while ($data_pastries = mysqli_fetch_assoc($sql_pastries)) {
          ?>
            <div class="card">
              <img src="./assets/images/<?= $data_pastries['menu_image'] ?>" alt="menu1" />
              <div class="card-details">
                <h3><?= $data_pastries['menu_name'] ?> | RM <?= $data_pastries['menu_price'] ?></h3>
                <h4>Quantity: <?= $data_pastries['quantity'] ?></h4>
                <h5>Last Updated: <?= $data_pastries['date'] ?></h5>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
    </section>

    <section id="hotmeals">
      <div>
        <div class="title">
          <h2>Hot Meals</h2>
          <div>
            <div class="border"></div>
          </div>
        </div>

        <div class="flex-row">
          <?php
          $sql_meals = mysqli_query($conn, "SELECT *, COUNT(menu_name) AS quantity
          FROM menu m
          WHERE m.menu_category = 'hot-meals'
          GROUP BY m.menu_id, m.menu_name, m.menu_category, m.menu_price, m.description;
          ");
          while ($meals = mysqli_fetch_assoc($sql_meals)) {
          ?>
            <div class="card">
              <img src="./assets/images/<?= $meals['menu_image'] ?>" alt="menu1" />
              <div class="card-details">
                <h3><?= $meals['menu_name'] ?> | RM <?= $meals['menu_price'] ?></h3>
                <h4>Quantity: <?= $meals['quantity'] ?></h4>
                <h5>Last Updated: <?= $meals['date'] ?></h5>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
    </section>
  </div>

  <a href="#top" class="arrow-up"><img src="./assets/icons/ic_arrow.svg" /></a>
  <footer style="margin: 20px;">

  </footer>
  <script>
    // Function to handle the search functionality
    function handleSearch() {
      // Get the search input value
      const searchInput = document.getElementById('searchInput').value.trim().toUpperCase();

      // Get all section titles
      const sectionTitles = document.querySelectorAll('.title h2');

      // Loop through each section title to find a match
      sectionTitles.forEach(title => {
        const sectionName = title.textContent.trim().toUpperCase();
        const section = title.closest('section');

        // Check if the section name contains the search input
        if (sectionName.includes(searchInput)) {
          section.style.display = 'block'; // Show the section
        } else {
          section.style.display = 'none'; // Hide the section
        }
      });
    }

    // Event listener for the search input
    document.getElementById('searchInput').addEventListener('input', handleSearch);
  </script>


</body>

</html>