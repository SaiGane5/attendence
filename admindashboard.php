<?php
session_start();
if (!isset($_SESSION['emailid'])) {
    header("Location: index.php");
    exit();
}
require_once "handlers/dbh.php"; 
$emailid = $_SESSION["emailid"];
try {
    $query = "select COUNT(*) FROM student where emailid=?"; 
    $stmt1 = $pdo->prepare($query);
    $stmt1->execute([$emailid]);
    $students= $stmt1->fetchAll(PDO::FETCH_ASSOC);
    $query = "select COUNT(*) FROM class where emailid=?"; 
    $stmt2 = $pdo->prepare($query);
    $stmt2->execute([$emailid]);
    $classes= $stmt2->fetchAll(PDO::FETCH_ASSOC);
    $query = "select COUNT(*) FROM classarm where emailid=?"; 
    $stmt3 = $pdo->prepare($query);
    $stmt3->execute([$emailid]);
    $classarms= $stmt3->fetchAll(PDO::FETCH_ASSOC);
    $query = "select COUNT(*) FROM teacher where emailid=?"; 
    $stmt4 = $pdo->prepare($query);
    $stmt4->execute([$emailid]);
    $teachers= $stmt4->fetchAll(PDO::FETCH_ASSOC);
    $query = "select COUNT(*) FROM session where emailid=?"; 
    $stmt5 = $pdo->prepare($query);
    $stmt5->execute([$emailid]);
    $sessions= $stmt5->fetchAll(PDO::FETCH_ASSOC);
    $query = "select COUNT(*) FROM term where emailid=?"; 
    $stmt6 = $pdo->prepare($query);
    $stmt6->execute([$emailid]);
    $terms= $stmt6->fetchAll(PDO::FETCH_ASSOC);
    $fn="";
    $ln="";
    $query = "select firstname,lastname FROM admin where emailid=?"; 
    $stmt7 = $pdo->prepare($query);
    $stmt7->execute([$emailid]);
    $details= $stmt7->fetchAll(PDO::FETCH_ASSOC);
    $fn=$details[0]['firstname'];
    $ln=$details[0]['lastname'];    
} catch (PDOException $e) {
    die("Query Failed: " . $e->getMessage());
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
        <h1>Administrator Dashboard</h1>
       <hr>
</header>
<main>
<div class="container">
    <div class="panel panel1">
    <p>  <img src="images/admin.png" alt="Your Wellness, Our Priority" class="alogo">
    <?php echo "<span >"  ."Welcome ".$fn." ".$ln. "</span>"; ?></p>
  <hr>
    <div>
    <h4>CLANS AND CLASS ARMS</h4>
    <ul class="item-list">
            <li><a href="manageclasses.php?emailid=$emailid">Manage Classes</a></li>
            <li><a href="manageclassarm.php?emailid=$emailid">Manage Class Arms</a></li>
        </ul>
    </div>
    <div>
    <h4>TEACHERS</h4>
    <ul class="item-list">
            <li><a href="manageteachers.php?emailid=$emailid">Manage Teachers</a></li>
        </ul>
    </div>
    <div>
    <h4>STUDENTS</h4>
    <ul class="item-list">
            <li><a href="createstudents.php?emailid=$emailid">Manage Students</a></li>
        </ul>
    </div>
    <div>
    <h4>SESSION & TERM</h4>
    <ul class="item-list">
            <li><a href="createsessions.php?emailid=$emailid">Manage Session & term</a></li>
        </ul>
    </div>
    <hr>
    <a class="log" href="logout.php">logout</a>
    </div>
    <div class="panel panel2">
        <h2>CLANS AND CLASS ARMS</h2>
            <div class=" db">
            <div class="board">
            <div class="student-info">
                <span class="student-text">Students</span>
                <img src="images/logo1.png" alt="Your Wellness, Our" class="dblogo">
                <br>
                <?php
                echo "<span class='student-text'>" . $students[0]['COUNT(*)'] . "</span>";
                ?>
            </div>
            </div>
            <div class="board">
            <div class="student-info">
                <span class="student-text">Classes</span>
                <img src="images/logo2.jpg" alt="Your Wellness, Our" class="dblogo">
                <br>
                <?php
                echo "<span class='student-text'>" . $classes[0]['COUNT(*)'] . "</span>";
                ?>
            </div>
            </div>
            <div class="board">
            <div class="student-info">
                <span class="student-text">Class Arms</span>
                <img src="images/logo.png" alt="Your Wellness, Our" class="dblogo">
                <br>
                <?php
                echo "<span class='student-text'>" . $classarms[0]['COUNT(*)'] . "</span>";
                ?>
            </div>
            </div>
            <div class="board">
            <div class="student-info">
                <span class="student-text">Teachers</span>
                <img src="images/logo.png" alt="Your Wellness, Our" class="dblogo">
                <br>
                <?php
                echo "<span class='student-text'>" . $teachers[0]['COUNT(*)'] . "</span>";
                ?>
            </div>
            </div>
            <div class="board">
            <div class="student-info">
                <span class="student-text">Sessions</span>
                <img src="images/logo5.png" alt="Your Wellness, Our" class="dblogo">
                <br>
                <?php
                echo "<span class='student-text'>" . $sessions[0]['COUNT(*)'] . "</span>";
                ?>
            </div>
            </div>
            <div class="board">
            <div class="student-info">
                <span class="student-text">Terms</span>
                <img src="images/logo6.png" alt="Your Wellness, Our" class="dblogo">
                <br>
                <?php
                echo "<span class='student-text'>" . $terms[0]['COUNT(*)'] . "</span>";
                ?>
            </div>
            </div>
            </div>
            </div>
    </div>
</div>
</main>
<footer>
    <hr>
    <p class="copyright">&copy;Developed by teja akshay kumar 2024</p>
</footer>
</body>
</html>
