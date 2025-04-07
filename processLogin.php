<?php
session_start();
require_once 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $database = new Database();
    $conn = $database->getConnection();

    $sql = "SELECT * FROM user WHERE email = :email";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        // Check if the role is valid
        if (in_array($user['role'], ['Student', 'Admin', 'Office', 'Instructor'])) {
            // Check if userID exists
            if (isset($user['userID'])) {
                $_SESSION['user'] = $user;
                $_SESSION['username'] = $email; // Set the username to the email
                echo "Session user: " . print_r($_SESSION['user'], true) . "<br>";
                echo "Session username: " . (isset($_SESSION['username']) ? $_SESSION['username'] : 'Not set');
                header("Location: profile.php");
                exit();
            } else {
                echo "<script>alert('Error: userID not found in user data.'); window.location.href='login.php';</script>";
            }
        } else {
            // If the role is not valid
            echo "<script>alert('Unauthorized access. You must be faculty or a registered student.'); window.location.href='login.php';</script>";
        }
    } else {
        echo "<script>alert('Invalid email or password. Please try again.'); window.location.href='login.php';</script>";
    }

    $database->closeConnection();
} else {
    header("Location: login.php");
    exit();
}
?>