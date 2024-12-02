<?php
session_start();
if (!isset($_SESSION['emailid'])) {
    header("Location: index.php");
    exit();
}
require_once "dbh.php";
$emailid=$_SESSION['emailid'];
$session =$_POST["session"];
$term =$_POST["term"];
$startdate=$_POST["startdate"];
$enddate=$_POST["enddate"];
try {
    $query ="INSERT INTO term(term,session,startdate,enddate,emailid) VALUES(?,?,?,?,?);";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$term,$session,$startdate,$enddate,$emailid]);
    $pdo=null;
    $stmt=null;
    echo '<script>alert("SESSION CREATED SUCCESSFULLY!");</script>'; 
    echo '<script>window.location.href = "../createsessions.php";</script>';
} catch (PDOException $e) {
    die("Query Failed: " . $e->getMessage());
}