<?php
require_once 'config.php';
require_once 'connection.php';

$db = new Database();
$conn = $db->getConnection();

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$phone = $_POST['phone'];
$role = $_POST['role'];

$uuidStmt = $conn->query("SELECT UUID() AS uuid");
$uuid = $uuidStmt->fetchColumn();

$sql = "INSERT INTO user (userID, email, password, firstName, lastName, phone, role) VALUES (:userID, :email, :password, :firstName, :lastName, :phone, :role)";
$stmt = $conn->prepare($sql);

$stmt->bindParam(':userID', $uuid);
$stmt->bindParam(':firstName', $firstName);
$stmt->bindParam(':lastName', $lastName);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':password', $password);
$stmt->bindParam(':phone', $phone);
$stmt->bindParam(':role', $role);

if ($stmt->execute()) {
    // Registration successful, redirect to login.php
    header("Location: login.php");
    exit(); // Important: Stop further execution after redirection
} else {
    // Registration failed, display error message
    echo "<div class=\"container text-center custom-container\">";
    echo "<h4>Error: " . $stmt->errorInfo()[2] . "</h4>";
    echo "</div>";
}

$db->closeConnection();
?>
