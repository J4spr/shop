<?php
session_start();
include './connect.inc.php';

if (isset($_POST['checkout'])) {
    $user_id = $_SESSION['user_id'];

    // Retrieve the cart items for the current user
    $stmt = $conn->prepare("SELECT * FROM cart WHERE user_id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Create a new order
        $order_id = uniqid(); // Generate a unique ID for the order
        $products = array();
        $total_price = 0;

        while ($row = $result->fetch_assoc()) {
            // Retrieve the product information from the products table
            $stmt2 = $conn->prepare("SELECT * FROM products WHERE id = ?");
            $stmt2->bind_param("i", $row['product_id']);
            $stmt2->execute();
            $result2 = $stmt2->get_result();

            if ($result2->num_rows > 0) {
                $product = $result2->fetch_assoc();
                $product['quantity'] = $row['quantity'];
                $products[] = $product;
                $total_price += $product['price'] * $row['quantity'];
            }
        }

        // Serialize the products array
        $serialized_products = serialize($products);

        // Insert the order into the orders table
        $stmt = $conn->prepare("INSERT INTO orders (id, user, products, status) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("sisi", $order_id, $user_id, $serialized_products, 0);
        $stmt->execute();

        // Remove the items from the cart
        $stmt = $conn->prepare("DELETE FROM cart WHERE user_id = ?");
        $stmt->bind_param("i", $user_id);
        $stmt->execute();

        echo "Order placed successfully. Total price: $" . number_format($total_price, 2);
    } else {
        echo "Error: Cart is empty.";
    }
} else {
    echo "Error: Checkout button not pressed.";
}
header("Location: ../index.php")
?>