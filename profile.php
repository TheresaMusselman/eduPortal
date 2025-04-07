<?php
error_reporting(E_ALL^E_NOTICE);
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$user = $_SESSION['user'];
$userID = $user['userID'];

require_once 'config.php';
require_once 'connection.php';

$db = new Database();
$conn = $db->getConnection();

try {
    $stmt = $conn->prepare("SELECT courseID FROM enrollment WHERE userID = ?");
    $stmt->execute([$userID]);
    $enrollments = $stmt->fetchAll(PDO::FETCH_COLUMN);

    $courses = [];
    if (!empty($enrollments)) {
        $placeholders = implode(',', array_fill(0, count($enrollments), '?'));
        $stmt = $conn->prepare("SELECT * FROM courses WHERE courseID IN ($placeholders)");
        $stmt->execute($enrollments);
        $courses = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    $_SESSION['enrolledCourses'] = $courses;

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    $_SESSION['enrolledCourses'] = [];
} finally {
    $db->closeConnection();
}

$courses = isset($_SESSION['enrolledCourses']) ? $_SESSION['enrolledCourses'] : [];
unset($_SESSION['enrolledCourses']);

// Retrieve and display messages from the database
$db = new Database();
$conn = $db->getConnection();

try {
    $stmt = $conn->prepare("SELECT messageText FROM messages WHERE userID = ? AND isRead = FALSE");
    $stmt->execute([$userID]);
    $messages = $stmt->fetchAll(PDO::FETCH_COLUMN);

    foreach ($messages as $message) {
        echo "<script>alert('" . htmlspecialchars($message) . "');</script>";

        // Mark message as read
        $stmt = $conn->prepare("UPDATE messages SET isRead = TRUE WHERE userID = ? AND messageText = ?");
        $stmt->execute([$userID, $message]);
    }

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
} finally {
    $db->closeConnection();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profile</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
<?php require 'master.php';?>
<div class="container text-center custom-container">
    <h2>Welcome, <?php echo htmlspecialchars($user['firstName'] . ' ' . $user['lastName']); ?>!</h2>
</div><br><br>
<div class="container text-left custom-container">
    <h3>Current Course Enrollment:</h3>
    <p>First Name: <?php echo htmlspecialchars($user['firstName']); ?></p>
    <p>Last Name: <?php echo htmlspecialchars($user['lastName']); ?></p>

    <?php if (!empty($courses)): ?>
        <table class="table">
            <thead>
            <tr>
                <th>Course ID</th>
                <th>Course Name</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($courses as $course): ?>
                <tr>
                    <td><?php echo htmlspecialchars($course['courseID']); ?></td>
                    <td><?php echo htmlspecialchars($course['courseName']); ?></td>
                    <td><?php echo htmlspecialchars($course['courseDescription']); ?></td>
                    <td>
                        <form method="post" action="profileBackend.php">
                            <input type="hidden" name="deleteCourseID" value="<?php echo htmlspecialchars($course['courseID']); ?>">
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>You are not currently enrolled in any courses.</p>
    <?php endif; ?>
</div><br><br>

<?php require 'footer.php';?>
</body>
</html>