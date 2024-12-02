<?php
require_once "handlers/dbh.php"; 
$classnames = []; // Initialize $classnames variable

try {
    $query = "SELECT classname FROM class"; 
    $stmt = $pdo->query($query);
    $classnames = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Query Failed: " . $e->getMessage());
}
?>
