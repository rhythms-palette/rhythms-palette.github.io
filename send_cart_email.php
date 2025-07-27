<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "Rhythm.c.chauhan@gmail.com"; // Your email
    $subject = "New Art Purchase Request";

    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $phone = htmlspecialchars($_POST["phone"]);
    $comments = htmlspecialchars($_POST["comments"]);
    $cart = json_decode($_POST["cart"], true);

    $message = "You have a new art purchase request:\n\n";
    $message .= "Name: $name\n";
    $message .= "Email: $email\n";
    $message .= "Phone: $phone\n";
    $message .= "Comments:\n$comments\n\n";
    $message .= "Items in cart:\n";

    foreach ($cart as $item) {
        $message .= "- Title: " . $item["title"] . "\n";
        $message .= "  Price: " . $item["price"] . "\n";
        $message .= "  SKU: " . $item["sku"] . "\n\n";
    }

    $headers = "From: $email\r\n";

    if (mail($to, $subject, $message, $headers)) {
        echo "success";
    } else {
        echo "error";
    }
}
?>
