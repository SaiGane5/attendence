<?php
session_start();
require_once "dbh.php"; 
$emailid=$_POST["emailid"];
$firstname=$_POST["firstname"];
$lastname=$_POST["lastname"];
$phoneno=$_POST["phoneno"];
$schoolname =$_POST["schoolname"];
$location =$_POST["location"];
$password=$_POST["password"];
$userrole="Administrator";
try {

    $query ="INSERT INTO userr(emailid,password,userrole) values(?,?,?);";
    $stmt2 =$pdo->prepare($query);
    $stmt2->execute([$emailid,$password,$userrole]);
    $query ="INSERT INTO admin(emailid,firstname,lastname,phoneno,schoolname,location) VALUES(?,?,?,?,?,?);";
    $stmt1 = $pdo->prepare($query);
    $stmt1->execute([$emailid,$firstname,$lastname,$phoneno,$schoolname,$location]);
    $pdo=null;
    $stmt=null;
    echo '<script>alert("Signup SUCCESSFULLY!");</script>'; 
    $_SESSION['emailid'] = $emailid;
    echo '<script>window.location.href = "../admindashboard.php?emailid=$emailid";</script>';
} catch (PDOException $e) {
    die("Query Failed: " . $e->getMessage());
}