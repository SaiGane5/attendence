<?php
session_start();
if (!isset($_SESSION['emailid'])) {
    header("Location: index.php");
    exit();
}
require_once "dbh.php"; 
$classnames = [];
$classname =$_POST["classname"];
$classarmname =$_POST["classarmname"];
$emailid=$_SESSION["emailid"];
try {

    $query ="INSERT INTO classarm(classarmname,classname,emailid) VALUES(?,?,?);";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$classarmname,$classname,$emailid]);

    $pdo=null;
    $stmt=null;
    echo '<script>alert("CLASS CREATED SUCCESSFULLY!");</script>'; 
    echo '<script>window.location.href = "../manageclassarm.php";</script>';
} catch (PDOException $e) {
    die("Query Failed: " . $e->getMessage());
}