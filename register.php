<?php
// DB Connection
$conn = new mysqli("localhost", "root", "", "furry_cart");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get input values
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];

    // Validation
    if (empty($name) || empty($email) || empty($password) || empty($confirmpassword)) {
        echo "<script>alert('Please fill all fields.');</script>";
        echo "<script>window.location.href='register.html';</script>";
        exit();
    }
    
    if ($password !== $confirmpassword) {
        echo "<script>alert('Passwords do not match.');</script>";
        echo "<script>window.location.href='register.html';</script>";
        exit();
    }
    
    if (strlen($password) < 4) {
        echo "<script>alert('Password must be at least 4 characters.');</script>";
        echo "<script>window.location.href='register.html';</script>";
        exit();
    }

    // Check if user already exists using prepared statement
    $check_sql = "SELECT * FROM customer WHERE Email = ?";
    $check_stmt = $conn->prepare($check_sql);
    $check_stmt->bind_param("s", $email);
    $check_stmt->execute();
    $check_result = $check_stmt->get_result();

    if ($check_result->num_rows > 0) {
        echo "<script>alert('Email already registered.');</script>";
        echo "<script>window.location.href='register.html';</script>";
        exit();
    }
    $check_stmt->close();

    // Generate UUID for customer ID
    $customer_id = uniqid("cust_", true);

    // Hash password & insert using prepared statement
    $hashed = password_hash($password, PASSWORD_DEFAULT);

    // Insert new user
    $insert_sql = "INSERT INTO customer (ID, Name, Email, Password) VALUES (?, ?, ?, ?)";
    $insert_stmt = $conn->prepare($insert_sql);
    $insert_stmt->bind_param("ssss", $customer_id, $name, $email, $hashed);

    if ($insert_stmt->execute()) {
        echo "<script>alert('Registration successful!');</script>";
        echo "<script>window.location.href='login.html';</script>";
    } else {
        echo "<script>alert('Error: " . $conn->error . "');</script>";
        echo "<script>window.location.href='register.html';</script>";
    }

    $insert_stmt->close();
} else {
    // If someone tries to access this page directly without submitting the form
    echo "<script>window.location.href='register.html';</script>";
}

$conn->close();
?>