<?php
require_once 'config.php';
require_once 'connection.php';

$db = new Database();
$conn = $db->getConnection();

// Get POST data and validate inputs
$firstName = isset($_POST['firstName']) ? $_POST['firstName'] : '';
$lastName = isset($_POST['lastName']) ? $_POST['lastName'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';
$courseID = isset($_POST['courseID']) ? $_POST['courseID'] : '';
$addToWaitlist = isset($_POST['role']) && $_POST['role'] == 'student';

try {
    // Validate that courseID is provided
    if (empty($courseID)) {
        echo "<script>alert('Course ID is missing or invalid.'); window.location.href='enrollment.php';</script>";
        exit();
    }

    // Fetch user details from the database
    $sql = "SELECT * FROM user WHERE firstName = :firstName AND lastName = :lastName AND email = :email";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':firstName', $firstName);
    $stmt->bindParam(':lastName', $lastName);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Validate user credentials
    if ($user && password_verify($password, $user['password'])) {
        if (in_array($user['role'], ['Student'])) {
            // Fetch course details
            $stmt = $conn->prepare("SELECT courseID, currentEnroll, maxEnroll FROM courses WHERE courseID = ?");
            $stmt->execute([$courseID]);
            $courseData = $stmt->fetch(PDO::FETCH_ASSOC);

            // Validate course existence
            if (!$courseData || !isset($courseData['courseID'])) {
                echo "<script>alert('Invalid course ID or course not found.'); window.location.href='enrollment.php';</script>";
                exit();
            }

            // Check enrollment capacity
            if ($courseData['currentEnroll'] < $courseData['maxEnroll']) {
                // Increment currentEnroll
                $nextEnroll = $courseData['currentEnroll'] + 1;
                $stmt = $conn->prepare("UPDATE courses SET currentEnroll = ? WHERE courseID = ?");
                $stmt->execute([$nextEnroll, $courseData['courseID']]);

                // Insert into enrollment table
                $stmt = $conn->prepare("INSERT INTO enrollment (userID, courseID, status) VALUES (?, ?, 'Enrolled')");
                $stmt->execute([$user['userID'], $courseData['courseID']]);

                // Redirect user to profile
                header("Location: profile.php");
                exit();
            } else {
                // Course is full
                if ($addToWaitlist) {
                    // Handle waitlist logic
                    $stmt = $conn->prepare("SELECT MAX(queueOrder) AS maxQueueOrder FROM waitlist WHERE courseID = ?");
                    $stmt->execute([$courseData['courseID']]);
                    $maxQueueOrder = $stmt->fetch(PDO::FETCH_ASSOC)['maxQueueOrder'];

                    $nextQueueOrder = $maxQueueOrder ? $maxQueueOrder + 1 : 1;

                    $stmt = $conn->prepare("INSERT INTO waitlist (userID, courseID, queueOrder) VALUES (?, ?, ?)");
                    $stmt->execute([$user['userID'], $courseData['courseID'], $nextQueueOrder]);

                    echo "<script>alert('Course is full. You have been added to the waitlist. Your queue order is: " . $nextQueueOrder . "'); window.location.href='profile.php';</script>";
                    exit();
                } else {
                    // Course full, checkbox not selected, notify and redirect
                    echo "<script>alert('Course is full and you did not select to be added to the waitlist.'); window.location.href='enrollment.php';</script>";
                    exit();
                }
            }
        } else {
            echo "<script>alert('Invalid email or password or not a student.'); window.location.href='login.php';</script>";
        }
    } else {
        echo "<script>alert('Invalid email or password. Please try again.'); window.location.href='login.php';</script>";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
} finally {
    $db->closeConnection();
}
?>