<?php
session_start();
// Database connection setup (assuming you have already done this)
require("../connection.php");

if(!isset($_SESSION["username_admin"])){
    header("Location: index.php");
    exit;
  }

// Query to fetch all menu items
$sql = "SELECT menu_id, menu_name, menu_price, description, menu_ingredients, menu_recipe, menu_image FROM menu";
$result = mysqli_query($conn, $sql);

$menuItems = [];
while ($row = mysqli_fetch_assoc($result)) {
    $menuItems[] = $row;
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>DreamyMoose | Update Item</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.7/dist/sweetalert2.min.css">

<!-- Include SweetAlert JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.7/dist/sweetalert2.min.js"></script>
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet" />

    <link rel="stylesheet" href="./css/styles.css" />
    <link rel="stylesheet" href="./css/additem.css" />
  </head>
  <body>
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
            <input type="text" style="margin-right: 15px" />
            <img src="./assets/icons/ic_search.svg" alt="ic_user" />
          </label>
        </div>

        <div class="flex-row" style="gap: 10px">
          <a class="" href="./menu.php"> Menus </a>
          <a class="" href="./additem.php"> Add New </a>
          <a class="" href="./removeitem.php"> Remove Menu </a>
          <a class="active" href="./updateitem.php"> Update Menu </a>
          <a class="" href="./orderdetails.php"> Order Details</a>
        </div>
      </nav>
      <?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $menu_id = $_POST['menu_id'];
    $price = $_POST['price'];
    $descriptions = $_POST['descriptions'];
    $ingredients = $_POST['ingredients'];
    $recipe = $_POST['recipe'];

    $date = date('Y-m-d');

    $sql_update = "UPDATE menu SET  menu_price = ?, description = ?, menu_ingredients = ?, menu_recipe = ?, date = ? WHERE menu_id = ?";

    $stmt = mysqli_prepare($conn, $sql_update);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sdsssi", $price, $descriptions, $ingredients, $recipe, $date, $menu_id);

        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_close($stmt);
            mysqli_close($conn);

            echo '<script>
                    Swal.fire({
                        icon: "success",
                        title: "Success!",
                        text: "Menu item updated successfully.",
                        showConfirmButton: false,
                        timer: 1500
                    }).then(() => {
                        window.location.href = "./updateitem.php"; // Redirect to updateitem.php after update
                    });
                  </script>';
            exit;
        } else {
            // Error in execution
            mysqli_stmt_close($stmt);
            mysqli_close($conn);

            // Show SweetAlert error message
            echo '<script>
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "Error updating menu item.",
                        showConfirmButton: true
                    });
                  </script>';
        }
    } else {
        // Error in preparation
        mysqli_close($conn);

        // Show SweetAlert error message
        echo '<script>
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Error preparing update statement.",
                    showConfirmButton: true
                });
              </script>';
    }
}
?>


      <section>
      <form method="post" action="">
                <h2>Update Item</h2>

                <div class="flex-row">
                    <div class="flex-col">
                        <label for="imgInput" class="label" style="overflow: hidden">
                            <img id="menuImage" src="" style="min-width: 100%; height: auto" alt="menu image" />
                        </label>
                    </div>

                    <div class="flex-col details">
                        <table>
                            <thead></thead>
                            <tbody>
                                <tr>
                                    <td><label for="productName"> Product Name: </label></td>
                                    <td>
                                        <select id="productName" name="menu_id" onchange="updateFields(this.value)">
                                            <option value="">Select Product</option>
                                            <?php foreach ($menuItems as $menuItem) { ?>
                                                <option value="<?= $menuItem['menu_id'] ?>" data-image="<?= $menuItem['menu_image'] ?>">
                                                    <?= $menuItem['menu_name'] ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="price"> Price: </label></td>
                                    <td>
                                        <input
                                            id="price"
                                            name="price"
                                            type="text"
                                            placeholder="00.00"
                                            
                                        />
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="descriptions"> Description: </label></td>
                                    <td>
                                        <textarea
                                            id="descriptions"
                                            name="descriptions"
                                            placeholder="Descriptions"
                                            
                                        ></textarea>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="form2 flex-row">
                    <div class="form21">
                        <label for="ingredients"> Ingredients: </label>

                        <textarea
                            id="ingredients"
                            name="ingredients"
                            placeholder="Ingredients"
                            
                        ></textarea>
                    </div>

                    <div class="form22">
                        <label for="recipe"> Recipe: </label>

                        <textarea
                            id="recipe"
                            name="recipe"
                            placeholder="Recipe"
                            
                        ></textarea>
                    </div>
                </div>

                <div>
                    <input type="submit" value="Update" />
                </div>
            </form>
      </section>
    </div>
    
    <script>
        function updateFields(menuId) {
            // Find the selected menu item by menuId
            const menuItem = <?= json_encode($menuItems) ?>.find(item => item.menu_id == menuId);

            // Update the form fields with the selected menu item's data
            if (menuItem) {
                document.getElementById('price').value = menuItem.menu_price;
                document.getElementById('descriptions').value = menuItem.description;
                document.getElementById('ingredients').value = menuItem.menu_ingredients;
                document.getElementById('recipe').value = menuItem.menu_recipe;
                document.getElementById('menuImage').src = './assets/images/' + menuItem.menu_image;
            } else {
                // Reset fields if no menu item is selected
                document.getElementById('price').value = '';
                document.getElementById('descriptions').value = '';
                document.getElementById('ingredients').value = '';
                document.getElementById('recipe').value = '';
                document.getElementById('menuImage').src = './assets/images/dashboard1.jpg';
            }
        }
    </script>
  </body>
</html>
