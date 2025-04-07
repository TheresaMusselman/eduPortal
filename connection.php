<?php
require_once 'config.php';

class Database {
    private $pdo;

    public function __construct() {
        try {
            $this->pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getConnection() {
        return $this->pdo;
    }

    public function executeSelectQuery($con, $sql) {
        try {
            $statement = $con->query($sql);
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function executeQuery($con, $sql) {
        try {
            $con->exec($sql);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
	}
	public function closeConnection() {
		$this->pdo = null;
    }
}
?>