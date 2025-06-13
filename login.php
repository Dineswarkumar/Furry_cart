<?php
session_start(); // Start session for user tracking

// DB Connection
$conn = new mysqli("localhost", "root", "", "furry_cart");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate
    if (empty($email) || empty($password)) {
        echo "<script>alert('Please fill all fields.');</script>";
        echo "<script>window.location.href='login.html';</script>";
        exit();
    }

    // Prepare and bind
    $sql = "SELECT * FROM customer WHERE Email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();

        // Verify password
        if (password_verify($password, $row['Password'])) {
            $_SESSION['user_id'] = $row['ID'];
            $_SESSION['user_name'] = $row['Name'];
            $_SESSION['user_email'] = $row['Email'];
            $_SESSION['logged_in'] = true;
            
            echo "<script>window.location.href='pp.html';</script>";
            exit();
        } else {
            echo "<script>alert('Incorrect password.');</script>";
            echo "<script>window.location.href='login.html';</script>";
        }
    } else {
        echo "<script>alert('User not found. Please register first.');</script>";
        echo "<script>window.location.href='register.html';</script>";
    }

    $stmt->close();
} else {
    // If someone tries to access this page directly without submitting the form
    echo "<script>window.location.href='login.html';</script>";
}

$conn->close();
?>