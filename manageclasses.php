<?php
session_start();
if (!isset($_SESSION['emailid'])) {
    header("Location: index.php");
    exit();
}
require_once "handlers/dbh.php"; 
$emailid=$_SESSION['emailid'];  
$classnames = [];
$query = "SELECT classname FROM class where emailid=?"; 
    $stmt = $pdo->prepare($query);
    $stmt->execute([$emailid]);
    $classnames = $stmt->fetchAll(PDO::FETCH_ASSOC);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $classname = $_POST["classname"];
    try {
        $query = "INSERT INTO class(classname,emailid) VALUES(?,?);";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$classname,$emailid]);
        echo '<script>alert("CLASS CREATED SUCCESSFULLY!");</script>'; 
        echo '<script>window.location.href = "manageclasses.php?emailid=$emailid";</script>'; 
    
        // header("Location: manageclasses.php"); 
        exit(); 
    } catch (PDOException $e) {
        echo '<script>alert("CLASS ALREDY EXIST!!");</script>'; 
        echo '<script>window.location.href = "manageclasses.php?emailid=$emailid";</script>';
    }
    
}
$fn="";
    $ln="";
    $query = "select firstname,lastname FROM admin where emailid=?"; 
    $stmt7 = $pdo->prepare($query);
    $stmt7->execute([$emailid]);
    $details= $stmt7->fetchAll(PDO::FETCH_ASSOC);
    $fn=$details[0]['firstname'];
    $ln=$details[0]['lastname']; 
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Two Panels Example</title>
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
            <h2>CREATE CLASS</h2>
            <form id="class" action="" method="post">
            <div class="board2">
                <div class="student-info">
                    <label for="classname">Class Name<span class="required">*</span>:</label><br>
                    <input type="text" id="classname" name="classname" placeholder="--Enter Class Name--" required><br>
                    <button>Save</button>
                    <br><br>
                    <table>
                    <thead>
                        <tr>
                            <th>S.NO</th>
                            <th>Class Name</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php   
                    $i=1;
                        foreach ($classnames as $row) {
                            echo "<tr>";
                            echo "<td>$i</td>"; // Assuming you want to show a serial number
                            echo "<td>" . $row['classname'] . "</td>"; // Display class name
                            echo "</tr>";
                            $i++;
                        }
                        ?>
                    </tbody>
                </table>  
                </div>
            </div>
            </form>
            <br>
        </div>
    </div>
    </main>
    <footer>
        <hr>
        <p class="copyright">&copy;Developed by teja akshay kumar 2024</p>
    </footer>
    </body>
    </html>
