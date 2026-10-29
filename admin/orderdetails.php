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
  <title>DreamyMoose | Order Details</title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- SweetAlert CDN -->
  <link rel="stylesheet" href="./css/styles.css" />
  <link rel="stylesheet" href="./css/orderdetails.css" />
  <script>
    // Function to load order details based on order_id
    function loadOrderDetails(order_id) {
      // AJAX request to fetch order details
      var xhr = new XMLHttpRequest();
      xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          // Parse JSON response
          var orderDetails = JSON.parse(this.responseText);

          // Update order details section
          document.getElementById('orderID').innerHTML = orderDetails.order_id;
          document.getElementById('date').innerHTML = orderDetails.order_date;
          document.getElementById('time').innerHTML = orderDetails.order_time;

          // Build the items list
          var itemsHtml = '';
          orderDetails.items.forEach(function(item) {
            itemsHtml += '<tr>';
            itemsHtml += '<td>' + item.quantity + ' x</td>';
            itemsHtml += '<td>' + item.menu_name + '</td>';
            itemsHtml += '<td>' + item.menu_price + '</td>';
            itemsHtml += '</tr>';
          });
          document.getElementById('itemsList').innerHTML = itemsHtml;

          // Update fees and total
          document.getElementById('deliveryFee').innerHTML = orderDetails.delivery_fee;
          document.getElementById('processingFee').innerHTML = orderDetails.processing_fee;
          document.getElementById('total').innerHTML = orderDetails.total_amount;
        } else if (this.readyState == 4 && this.status != 200) {
          // Display an error message if request fails
          Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Failed to fetch order details!',
          });
        }
      };
      xhr.open("GET", "query/get_order_details.php?cust_id=" + order_id, true);
      xhr.send();
    }
  </script>
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
        <a class="" href="./updateitem.php"> Update Menu </a>
        <a class="active" href="./orderdetails.php"> Order Details</a>
      </div>
    </nav>

    <section class="flex-row">
    <div class="listorder flex-col">
    <img src="./assets/images/neworder.png">
    <?php
    $sql_order = mysqli_query($conn, "SELECT * FROM order_details o JOIN customer c ON o.cust_id = c.cust_id JOIN menu m ON o.menu_id = m.menu_id WHERE o.order_status = 'pending'");
    $displayed_customers = []; // Array to track displayed customer IDs
    while ($data_order = mysqli_fetch_assoc($sql_order)) {
        $cust_id = $data_order["cust_id"];
        if (!in_array($cust_id, $displayed_customers)) {
            // Display this customer's order only if not already displayed
            $displayed_customers[] = $cust_id; // Add to displayed list
        ?>
            <div>
                <a href="orderdetails.php?order_id=<?= $data_order["cust_id"] ?> ">FP<?= $data_order["cust_id"] ?></a>
            </div>
        <?php
        }
    }
    ?>
</div>


<?php 
if (isset($_GET["order_id"])) {
    $order_id = (int) $_GET["order_id"]; // cast to int to prevent SQL injection
    $sql_detail_order = mysqli_query($conn, "SELECT * FROM order_details o JOIN customer c ON o.cust_id = c.cust_id JOIN menu m ON o.menu_id = m.menu_id WHERE o.cust_id = '$order_id'");
    ?>

    <div class="orderdetails">
        <table>
            <tbody>
                <?php 
                while ($data_detail_order = mysqli_fetch_assoc($sql_detail_order)) {
                    // Display order ID, date, and time (show once for all items)
                    if ($data_detail_order === mysqli_fetch_assoc($sql_detail_order)) {
                ?>
                    <tr>
                        <td style="padding-right: 30px;">Order ID:</td>
                        <td>
                            <h4 id="orderID"><?= $data_detail_order["order_id"] ?></h4>
                        </td>
                    </tr>
                    <tr>
                        <td>Date:</td>
                        <td>
                            <h4 id="date"><?= $data_detail_order["order_date"] ?></h4>
                        </td>
                    </tr>
                    <tr>
                        <td>Time:</td>
                        <td>
                            <h4 id="time">
                                <?php
                                $time = $data_detail_order["order_placetime"];
                                $datetime = DateTime::createFromFormat('H:i:s', $time);
                                echo $datetime->format('h:i A');
                                ?>
                            </h4>
                        </td>
                    </tr>
                <?php } ?>

                <!-- Items list dynamically populated via PHP -->
                <tr>
                    <th>Quantity</th>
                    <th>Menu Name</th>
                    <th>Price</th>
                    <th>Total</th>
                </tr>
                <?php
                // Fetch and display each item in the order
                mysqli_data_seek($sql_detail_order, 0); // Reset pointer to fetch items
                $total_amount = 0;
                while ($order_item = mysqli_fetch_assoc($sql_detail_order)) {
                ?>
                    <tr>
                        <td><?= $order_item["quantity"] ?></td>
                        <td><?= $order_item["menu_name"] ?></td>
                        <td><?= $order_item["menu_price"] ?></td>
                        <td><?php $total_amount += $order_item["quantity"] * $order_item["menu_price"] ?></td>
                    </tr>
                <?php } ?>

                <!-- Display fees and total -->
                <tr>
                    <td></td>
                    <td>
                        <h5>Delivery Fee</h5>
                    </td>
                    <td colspan="2" id="deliveryFee">4.99</td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <h5>Container/Processing Fee</h5>
                    </td>
                    <td colspan="2" id="processingFee">6.99</td>
                </tr>
                <tr>
                    <td style="border-top: 1px solid #6D3E1E;"></td>
                    <td style="border-top: 1px solid #6D3E1E;">
                        <h3>Total (RM) <?= $total_amount ?></h3>
                    </td>
                    <td style="border-top: 1px solid #6D3E1E;" id="total"></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="button flex-col" style="gap: 20px">
        <button class="btn" onclick="confirmOrder(<?php echo $order_id; ?>)">Confirm</button>
        <button class="btn" onclick="deleteOrder(<?php echo $order_id; ?>)">Delete</button>
    </div>

<?php }} ?>

    </section>
  </div>
  <script>
    function deleteOrder(order_id) {
      // Confirm with user before proceeding
      Swal.fire({
        title: 'Are you sure?',
        text: "This action cannot be undone!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
          // User confirmed, proceed with deletion
          var xhr = new XMLHttpRequest();
          xhr.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              // Handle success response
              Swal.fire({
                icon: 'success',
                title: 'Order Deleted!',
                text: 'The order has been successfully deleted.',
              });
              // You might want to update UI or perform other actions after deletion
            } else if (this.readyState == 4 && this.status != 200) {
              // Handle error response
              Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Failed to delete order. Please try again.',
              });
            }
          };
          xhr.open("POST", "query/delete_order.php", true); // Adjust URL as per your backend endpoint
          xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
          xhr.send("order_id=" + order_id);
          setTimeout(function() {
              window.location.href = 'orderdetails.php';
            }, 1500);
        }
      });
    }
  </script>

  <script>
    // Function to handle confirmation
    function confirmOrder(order_id) {
      Swal.fire({
        title: 'Confirm Order?',
        text: 'Are you sure you want to confirm this order?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, confirm it!'
      }).then((result) => {
        if (result.isConfirmed) {
          // AJAX request to update order status
          var xhr = new XMLHttpRequest();
          xhr.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              var response = JSON.parse(this.responseText);
              if (response.status === 'success') {
                Swal.fire(
                  'Confirmed!',
                  'The order has been confirmed.',
                  'success'
                )
                setTimeout(function() {
              window.location.href = 'orderdetails.php';
            }, 1500);
                // Optionally, update the UI after confirmation
                // For example, change order status indicator or reload order list
              } else {
                Swal.fire(
                  'Oops...',
                  'Failed to confirm order.',
                  'error'
                );
              }
            }
          };
          xhr.open("GET", "query/update_order_status.php?order_id=" + order_id, true);
          xhr.send();
        }
      });
    }
  </script>

  <script>
    // Function to clear order details
    function clearOrderDetails() {
      // Clear order details section
      document.getElementById('orderID').innerHTML = '';
      document.getElementById('date').innerHTML = '';
      document.getElementById('time').innerHTML = '';
      document.getElementById('itemsList').innerHTML = '';
      document.getElementById('deliveryFee').innerHTML = '';
      document.getElementById('processingFee').innerHTML = '';
      document.getElementById('total').innerHTML = '';
    }
    // clearOrderDetails();
  </script>
</body>

</html>