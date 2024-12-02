<?php
session_start();
$tmailid=$_SESSION["emailid"];
require_once "handlers/dbh.php";
$email="";
$class="";
$section="";
$fn="";
$ln="";
$query="SELECT emailid,classname,classarmname,firstname,lastname from teacher where tmailid=?";
$stmt2=$pdo->prepare($query);
$stmt2->execute([$tmailid]);
$result = $stmt2->fetchAll(PDO::FETCH_ASSOC);
if (!empty($result)) {
    $email = $result[0]['emailid'];
    $class = $result[0]['classname'];
    $section = $result[0]['classarmname'];
    $fn=$result[0]['firstname'];
    $ln=$result[0]['lastname'];
}
else {
    echo "No data found for the teacher with email ID: $tmailid";
    exit(); 
}
$query = "SELECT firstname,lastname,rollno,classarmname,classname FROM student where emailid=? and classname=? and classarmname=?"; 
$stmt1 = $pdo->prepare($query);
$stmt1->execute([$email,$class,$section]);
$teachers = $stmt1->fetchAll(PDO::FETCH_ASSOC); 
try {
    $query = "select COUNT(*) FROM student where emailid=? and classname=? and classarmname=?"; 
    $stmt = $pdo->prepare($query);
    $stmt->execute([$email,$class,$section]);
    $students= $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e){
    die("Query Failed: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AMS</title>
    <link rel="stylesheet" href="style1.css">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
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
    <?php echo "<span>" ."Welcome ".$fn." ".$ln. "</span>" ?></p>
  <hr>
    <div>
    <h4>STUDENTS</h4>
    <ul class="item-list">
            <li><a href="teacher.php">All Students</a></li>
        </ul>
    </div>
    <div>
    <h4>ATTENDANCE</h4>
    <ul class="item-list">
            <li><a href="takeattendance.php">Take Attendance</a></li>
            <li><a href="viewclassattendance.php">View Class Attendance</a></li>
            <li><a href="viewstudentattendance.php">view Students Attendance</a></li>
            <li><a href="todaysreport.php">Today's Report</a></li>
        </ul>
    </div>
    <hr>
    <a class="log" href="index.php">logout</a>
    </div>
    <div class="panel panel2">
        <h2> <?php
                echo "<span >"  ."Class:".$class."<br>"." Section:". $section. "</span>";
                ?></h2>
            <div class=" db">
            <div class="board">
            <div class="student-info">
                <span class="student-text">STUDENTS</span>
                <img src="images/logo1.png" alt="Your Wellness, Our" class="dblogo">
                <br>
                <?php
                echo "<span class='student-text'>" . $students[0]['COUNT(*)'] . "</span>";
                ?>
            </div>
            </div>
    </div>
            <div class="board2">
            <div class="student-info">
            <table>
                    <thead>
                        <tr>
                            <th>S.NO</th>
                            <th>RollNo</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Class Arm Name</th>
                            <th>Class Name</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php   
                    $i=1;
                        foreach ($teachers as $row) {
                            echo "<tr>";
                            echo "<td>$i</td>";
                            echo "<td>" . $row['rollno'] . "</td>"; 
                            echo "<td>" . $row['firstname'] . "</td>";
                            echo "<td>" . $row['lastname'] . "</td>";
                            echo "<td>" . $row['classarmname'] . "</td>";
                            echo "<td>" . $row['classname'] . "</td>";
                            echo "</tr>";
                            $i++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            </div>
            </div>
    </div>
</div>
</main>
<footer>
    <hr>
    <p class="copyright">&copy;Developed by Teja Akshay Kumar 2024</p>
</footer>
</body>
</html>
