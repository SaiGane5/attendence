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
$rollno =[""];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $day = $_POST["day"];
        $statusArray = $_POST["status"];

        $query = "INSERT INTO attendance (rollno, day, status) VALUES (?, ?, ?)";
        $stmt = $pdo->prepare($query);

        foreach ($statusArray as $key => $status) {
            $rollno = $teachers[$key]['rollno'];
            $stmt->execute([$rollno, $day, $status]);
        }

        echo '<script>alert("Attendance recorded successfully!");</script>';
    } catch (PDOException $e) {
        echo '<script>alert("Error: ' . $e->getMessage() . '");</script>';
    }
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
        <h2><?php
                echo "<span >"  ."Class:".$class."<br>"." Section:". $section. "</span>";
                ?></h2>
        <form id="attendanceForm" action="" method="post">
        <div class="board2">
                <div class="student-info">
                <label for="day">Date:<span class="required">*</span></label><br>
                <input type='date' id='day' name='day' required><br>
                <table>
                    <thead>
                        <tr>
                            <th>S.NO</th>
                            <th>RollNo</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Class Arm Name</th>
                            <th>Class Name</th>
                            <th>Status (1/0)<span class="required">*</span></th>
                        
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
                            echo "<td> <input type='text'  name='status[]' placeholder='--Status--' required><br>
                            </td>";
                            echo "<td class='error'></td>";
                            $i++;
                        }
                        ?>
                    </tbody>
                </table>
                </div>
                <button style="background-color: red;" type="submit" onclick="return validateForm()">Submit Attendance</button>
            </div>
            </form>
    </div>
</div>
</main>
<footer>
    <hr>
    <p class="copyright">&copy;Developed by Teja Akshay Kumar 2024</p>
</footer>
</body>
<script>
function validateForm() {
    var statusInputs = document.getElementsByName('status[]');
    var valid = true;

    for (var i = 0; i < statusInputs.length; i++) {
        var status = statusInputs[i].value;
        var statusCell = statusInputs[i].parentNode.nextElementSibling;

        if (status !== '0' && status !== '1') {
            statusCell.textContent = "Status must be 0 or 1";
            valid = false;
        } else {
            statusCell.textContent = "";
        }
    }

    return valid;
}
</script>
</html>
