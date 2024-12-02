<?php
session_start();
if (!isset($_SESSION['emailid'])) {
    header("Location: index.php");
    exit();
}
require_once "dbh.php";
$emailid=$_SESSION['emailid'];
$sessionname=$_POST["sessionname"];
try {
    $query ="INSERT INTO session(sessionname,emailid) VALUES(?,?);";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$sessionname,$emailid]);
    $pdo=null;
    $stmt=null;
    echo '<script>alert("SESSION CREATED SUCCESSFULLY!");</script>'; 
    echo '<script>window.location.href = "../createsessions.php";</script>';
} catch (PDOException $e) {
    die("Query Failed: " . $e->getMessage());
}