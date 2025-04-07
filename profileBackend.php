<?php
require_once 'config.php';
require_once 'connection.php';

session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$user = $_SESSION['user'];
$userID = $user['userID'];

$db = new Database();
$conn = $db->getConnection();

if (isset($_POST['deleteCourseID'])) {
    $deleteCourseID = $_POST['deleteCourseID'];

    try {
        // Delete enrollment record
        $stmt = $conn->prepare("DELETE FROM enrollment WHERE userID = ? AND courseID = ?");
        $stmt->execute([$userID, $deleteCourseID]);

        // Decrease currentEnroll in courses table
        $stmt = $conn->prepare("UPDATE courses SET currentEnroll = currentEnroll - 1 WHERE courseID = ?");
        $stmt->execute([$deleteCourseID]);

        // Check waitlist
        $stmt = $conn->prepare("SELECT currentEnroll, maxEnroll, courseName FROM courses WHERE courseID = ?");
        $stmt->execute([$deleteCourseID]);
        $courseData = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($courseData['currentEnroll'] == $courseData['maxEnroll'] - 1) {
            // Find the first user on the waitlist
            $stmt = $conn->prepare("SELECT userID FROM waitlist WHERE courseID = ? ORDER BY queueOrder ASC LIMIT 1");
            $stmt->execute([$deleteCourseID]);
            $waitlistUser = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($waitlistUser) {
                $waitlistUserID = $waitlistUser['userID'];

                // Insert message into the messages table
                $messageText = "A spot has opened in " . htmlspecialchars($courseData['courseName']) . " (Course ID: " . htmlspecialchars($deleteCourseID) . ").";
                $stmt = $conn->prepare("INSERT INTO messages (userID, messageText, courseID) VALUES (?, ?, ?)");
                $stmt->execute([$waitlistUserID, $messageText, $deleteCourseID]);

                //remove the user from the waitlist.
                $removeStmt = $conn->prepare("DELETE from waitlist where userID = ? and courseID = ?");
                $removeStmt->execute([$waitlistUserID, $deleteCourseID]);
            }
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    } finally {
        $db->closeConnection();
        header("Location: profile.php");
        exit();
    }
} else {
    header("Location: profile.php"); // Redirect if no delete action.
    exit();
}
?>