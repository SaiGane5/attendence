<?php
session_start();
$tmailid=$_SESSION["emailid"];
require_once "handlers/dbh.php";
$email="";
$class="";
$section="";
$fn="";
$ln="";
$query=" SELECT emailid,classname,classarmname,firstname,lastname from teacher where tmailid=?";
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
$students=[""];
// if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["classarmname"])) {
    // $classarmname =htmlspecialchars($_POST["classarmname"]);
    try {
        $query = "SELECT firstname, lastname, student.rollno, classarmname, classname, day, status 
        FROM student 
        LEFT JOIN attendance ON student.rollno = attendance.rollno 
        WHERE student.emailid=? and student.classname=? and student.classarmname = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$email,$class,$section]);
        $students = $stmt->fetchAll(PDO::FETCH_ASSOC); 
    } catch (PDOException $e) {
        echo '<script>alert("Error: ' . $e->getMessage() . '");</script>';
    }
// }
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
                        <th>Total</th>
                        <th>Present</th>
                        <th>Absent</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $i=1;
                    $uniqueStudents = []; // Array to store unique student data
                    if (is_array($students) && !empty($students)) {
                        foreach ($students as $row) {
                            $rollNo = $row['rollno'];
                            if (!array_key_exists($rollNo, $uniqueStudents)) {
                                $uniqueStudents[$rollNo] = [
                                    'rollno' => $row['rollno'],
                                    'firstname' => $row['firstname'],
                                    'lastname' => $row['lastname'],
                                    'classarmname' => $row['classarmname'],
                                    'classname' => $row['classname'],
                                    'total' => 0,
                                    'presents' => 0,
                                    'absents' => 0,
                                ];
                            }

                            // Assuming 'status' key exists in $row
                            if (array_key_exists('status', $row)) {
                                $uniqueStudents[$rollNo]['total']++; // Count total attendance
                                if ($row['status'] == 1) {
                                    $uniqueStudents[$rollNo]['presents']++;
                                } else {
                                    $uniqueStudents[$rollNo]['absents']++;
                                }
                            } else {
                                // Handle case where 'status' is missing (already done in previous correction)
                                echo "<tr><td colspan='8'>Attendance data missing for student " . $row['rollno'] . "</td></tr>";
                            }
                        }
                    } else {
                        echo "<tr><td colspan='8'>No data available</td></tr>";
                    }

                    // Display data with unique students and calculated values
                    $i = 1;
                    foreach ($uniqueStudents as $student) {
                        echo "<tr>";
                        echo "<td>" . $i . "</td>"; // Use $i for student number
                        echo "<td>" . $student['rollno'] . "</td>";
                        echo "<td>" . $student['firstname'] . "</td>";
                        echo "<td>" . $student['lastname'] . "</td>";
                        echo "<td>" . $student['classarmname'] . "</td>";
                        echo "<td>" . $student['classname'] . "</td>";
                        echo "<td>" . $student['total'] . "</td>";
                        echo "<td>" . $student['presents'] . "</td>";
                        echo "<td>" . $student['absents'] . "</td>";
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
</main>
<footer>
    <hr>
    <p class="copyright">&copy;Developed by Teja Akshay Kumar 2024</p>
</footer>
</body>
</html>
