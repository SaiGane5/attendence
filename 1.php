<?php
session_start();
if (isset($_SESSION['emailid'])) {
    $emailid = $_SESSION['emailid'];
    echo "Welcome, $emailid!";
} else {
    header("Location: index.php");
    exit();
}
?>