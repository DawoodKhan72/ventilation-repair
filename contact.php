<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
   

    if (!empty($name) && !empty($email)) {
        $stmt = $conn->prepare("INSERT INTO messages (name, email) VALUES (?, ?)");
        $stmt->bind_param("ss", $name, $email);
        if ($stmt->execute()) {
            header("Location: thankyou.html");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }
    } else {
        echo "All fields are required!";
    }
    $stmt->close();
    $conn->close();
}
?>