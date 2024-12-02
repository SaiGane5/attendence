<?php
session_start();
if (!isset($_SESSION['emailid'])) {
    header("Location: ../index.php");
    exit();
}
require_once "dbh.php"; 
$emailid = $_SESSION["emailid"];
$rollno=$_POST["rollno"];
$firstname=$_POST["firstname"];
$lastname=$_POST["lastname"];
$classname =$_POST["classname"];
$classarmname =$_POST["classarmname"];
try {
    $query ="INSERT INTO student(rollno,firstname,lastname,emailid,classarmname,classname) VALUES(?,?,?,?,?,?);";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$rollno,$firstname,$lastname,$emailid,$classarmname,$classname]);
    $pdo=null;
    $stmt=null;
    echo '<script>alert("ADDED NEW STUDENT SUCCESSFULLY!");</script>'; 
    echo '<script>window.location.href = "../createstudents.php";</script>';
} catch (PDOException $e) {
    die("Query Failed: " . $e->getMessage());
}