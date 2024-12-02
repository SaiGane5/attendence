<?php
session_start();
if (!isset($_SESSION['emailid'])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Two Panels Example</title>
    <link rel="stylesheet" href="style1.css">
</head>

<body>
<header>
        <h1>Class Teacher Dashboard</h1>
       <hr>
</header>
<main>
    <div class="container">
        <div class="panel panel1">
        <p>  <img src="images/admin.png" alt="Your Wellness, Our Priority" class="alogo">
    welcome Teacher</p>
    <hr>
        <div>
        <h4>STUDENTS</h4>
        <ul class="item-list">
                <li><a href="#">All Students</a></li>
            </ul>
        </div>
        <div>
        <h4>ATTENDANCE</h4>
        <ul class="item-list">
                <li><a href="#">Take Attendence</a></li>
                <li><a href="#">View Class Attendence</a></li>
                <li><a href="#">view Students Attendence</a></li>
                <li><a href="#">Today's Report</a></li>
            </ul>
        </div>
        <hr>
        <a class="log" href="#">logout</a>
        </div>
        <div class="panel panel2">
            <h2>CLASS IV-1</h2>
            <hr>
    <p class="copyright">&copy;Developed by Teja Akshay Kumar 2024</p>
        </div>
    </div>
</main>
</body>
</html>
