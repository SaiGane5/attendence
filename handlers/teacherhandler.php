<?php
session_start();
if (!isset($_SESSION['emailid'])) {
    header("Location: index.php");
    exit();
}
require_once "dbh.php"; 
$emailid=$_SESSION["emailid"];
$firstname=$_POST["firstname"];
$lastname=$_POST["lastname"];
$tmailid=$_POST["tmailid"];
$phoneno=$_POST["phoneno"];
$classname =$_POST["classname"];
$classarmname =$_POST["classarmname"];
$password=$_POST["password"];
$userrole="Teacher";
try {

    $query ="INSERT INTO userr(emailid,password,userrole) values(?,?,?);";
    $stmt2 =$pdo->prepare($query);
    $stmt2->execute([$tmailid,$password,$userrole]);
    $query ="INSERT INTO teacher(tmailid,firstname,lastname,phoneno,classname,classarmname,emailid) VALUES(?,?,?,?,?,?,?);";
    $stmt1 = $pdo->prepare($query);
    $stmt1->execute([$tmailid,$firstname,$lastname,$phoneno,$classname,$classarmname,$emailid]);
    $pdo=null;
    $stmt=null;
    echo '<script>alert("ADDED NEW TEACHER SUCCESSFULLY!");</script>'; 
    echo '<script>window.location.href = "../manageteachers.php";</script>';
} catch (PDOException $e) {
    die("Query Failed: " . $e->getMessage());
}