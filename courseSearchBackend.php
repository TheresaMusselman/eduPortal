<?php
session_start();

require_once 'config.php';
require_once 'connection.php';

$db = new Database();
$conn = $db->getConnection();

$items = isset($_GET['items']) ? $_GET['items'] : [];

try {
    $whereClauses = [];
    $params = [];

    if (!empty($items)) {
        $departmentClauses = [];
        $semesterClauses = [];

        foreach ($items as $item) {
            if (in_array($item, ['Spring', 'Summer', 'Fall'])) {
                $semesterClauses[] = "LOWER(TRIM(semester)) = LOWER(?)";
                $params[] = $item;
            } else {
                $departmentClauses[] = "LOWER(TRIM(department)) = LOWER(?)";
                $params[] = $item;
            }
        }

        if (!empty($departmentClauses) && !empty($semesterClauses)) {
            $whereClauses[] = "(" . implode(" OR ", $semesterClauses) . ") AND (" . implode(" OR ", $departmentClauses) . ")";
        }
        else if (!empty($departmentClauses)){
            $whereClauses[] = "(" . implode(" OR ", $departmentClauses) . ")";
        }
        else if (!empty($semesterClauses)){
            $whereClauses[] = "(" . implode(" OR ", $semesterClauses) . ")";
        }

        if (!empty($whereClauses)) {
            $sql = "SELECT * FROM courses WHERE " . implode(" AND ", $whereClauses);
            $stmt = $conn->prepare($sql);

            echo "SQL: " . $sql . "<br>"; // Debugging
            print_r($params); // Debugging

            $stmt->execute($params);
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $_SESSION['searchResults'] = $results;
        } else {
            $_SESSION['searchResults'] = [];
        }
    } else {
        $_SESSION['searchResults'] = [];
    }

    header("Location: courses.php");

} catch (PDOException $e) {
    $_SESSION['error'] = "Error: " . $e->getMessage();
    header("Location: courses.php");
} finally {
    $db->closeConnection();
}
?>