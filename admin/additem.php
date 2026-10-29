

<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>DreamyMoose | Add Item</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.css">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <link rel="stylesheet" href="./css/styles.css" />
    <link rel="stylesheet" href="./css/additem.css" />
  </head>
  <body>
  <?php
// Include the database connection file
require("../connection.php");

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // File upload handling
    $target_dir = "./assets/images/";
    $target_file = basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            // echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            // echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        // echo "Sorry, file already exists.";
        $uploadOk = 0;
    }


    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        // echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            // echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
        } else {
            // echo "Sorry, there was an error uploading your file.";
        }
    }

    // Inserting form data into menu table
    $name = $_POST['name'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    $ingredients = $_POST['ingredients'];
    $recipe = $_POST['recipe'];
$date = date("Y/m/d");
    // SQL query to insert data into menu table
    $sql = "INSERT INTO menu (menu_name, menu_price, menu_category, description, menu_ingredients, menu_recipe, menu_image, date) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    // Prepare the SQL statement
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        // Bind parameters
        mysqli_stmt_bind_param($stmt, "sdssssss", $name, $price, $category, $description, $ingredients, $recipe, $target_file, $date);

        // Execute the statement
        if (mysqli_stmt_execute($stmt)) {
            // Success message for SweetAlert
            echo '<script>
                    setTimeout(function() {
                      swal({
                        title: "Success!",
                        text: "New item added successfully.",
                        icon: "success",
                      }).then(function() {
                        window.location.href = "additem.php"; 
                      });
                    }, 100);
                  </script>';
        } else {
            echo "Error: " . mysqli_error($conn);
        }

        // Close statement
        mysqli_stmt_close($stmt);
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    // Close connection
    mysqli_close($conn);
}
?>
    <navbar>
      <div class="flex-row">
        <a class="btn" href="./index.php" style="margin-right: 15px">
          <?= $_SESSION["username_admin"]?>
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
          <a class="active" href="./additem.php"> Add New </a>
          <a class="" href="./removeitem.php"> Remove Menu </a>
          <a class="" href="./updateitem.php"> Update Menu </a>
          <a class="" href="./orderdetails.php"> Order Details</a>
        </div>
      </nav>

      <section>
      <form method="post" action="" enctype="multipart/form-data">
  <h2 style="margin-bottom: 20px;">Add Item</h2>

  <div class="flex-row">
    <div class="flex-col">
      <label for="imgInput" class="label">
        <div class="flex-col" style="padding: 20px 0">
          <img src="./assets/icons/ic_plus.svg" />
          Click to add file
        </div>
        <input id="imgInput" type="file" name="fileToUpload" />
      </label>
    </div>

    <div class="flex-col details">
      <table>
        <thead></thead>
        <tbody>
          <tr>
            <td><label for="name"> Product Name: </label></td>
            <td><input id="name" type="text" name="name" placeholder="Product Name" /></td>
          </tr>
          <tr>
            <td><label for="price"> Price: </label></td>
            <td><input id="price" type="text" name="price" placeholder="00.00" /></td>
          </tr>
          <tr>
            <td><label for="category"> Category: </label></td>
            <td>
              <select name="category" id="category">
                <option value="coffee">Coffee</option>
                <option value="non-coffee">Non-Coffee</option>
                <option value="frappe">Frappe</option>
                <option value="pastries">Pastries</option>
                <option value="hot-meals">Hot Meals</option>
              </select>
            </td>
          </tr>
          <tr>
            <td><label for="descriptions"> Description: </label></td>
            <td><textarea id="descriptions" name="description" placeholder="Descriptions"></textarea></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

  <div class="form2 flex-row">
    <div class="form21">
      <label for="ingredients"> Ingredients: </label>
      <textarea id="ingredients" name="ingredients" placeholder="Ingredients"></textarea>
    </div>

    <div class="form22">
      <label for="recipe"> Recipe: </label>
      <textarea id="recipe" name="recipe" placeholder="Recipe"></textarea>
    </div>
  </div>

  <div>
    <input type="submit" name="submit" value="Add" />
  </div>
</form>

      </section>
    </div>
  </body>
</html>
