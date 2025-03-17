<?php 
// A three-page application that uses NO HTML FORMS.
  
// TODO: Create a shopping cart, using a PHP array, by saving items into the
// cart and saving the cart into the session.  Use the same concepts as in 
// your JSP solution.
if (!isset($_SESSION['cart'])) {
    // create empty card (empty list)
    $cart = [];
}

// add item to cart
$cart[] = "item";
?>
<html>
    <head>
        <title>Shopping Cart</title>
    </head>
    <body>
        <!-- TODO: Create a HTML link to the checkout page (checkout.php).
            If there is nothing in the cart, send them back here from
            checkout.php. Otherwise, show the contents and challenge for
            credentials.  test the credentials in success.php and
            show the message only if the credentials are "valid" (username
            and password are the same and more than 3 characters).
        -->
        <a href="checkout.php">Checkout</a>

        <!-- TODO: display each item in the db table -->

        <!-- TODO: Transform each row into a link using a query string.
            Make sure that the link references this same page and that the
            query string has the brand/product info only (no price, qty, etc.)
        -->
        <a href="index.php?brand=Ring&product=Doorbell">Ring Doorbell</a>

        <hr/>
        <ul>
            <!-- TODO: display the contents of the cart here -->
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "bestbye.ddl";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT id, brand, product, price FROM items";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              // output data of each row
              while($row = $result->fetch_assoc()) {
                echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
              }
            } else {
              echo "0 results";
            }
            $conn->close();
            ?>
        </ul>

    </body>
</html>
