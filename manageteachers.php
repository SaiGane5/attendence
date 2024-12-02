<?php
session_start();
if (!isset($_SESSION['emailid'])) {
    header("Location: index.php");
    exit();
}
require_once "handlers/dbh.php";
$emailid=$_SESSION['emailid']; 
$query = "SELECT firstname,lastname,phoneno,classarmname,classname FROM teacher where emailid=?"; 
$stmt1 = $pdo->prepare($query);
$stmt1->execute([$emailid]);
$teachers = $stmt1->fetchAll(PDO::FETCH_ASSOC);
try {
    $query = "SELECT classarmname,classname FROM classarm where emailid=?"; 
    $stmt = $pdo->prepare($query);
    $stmt->execute([$emailid]);
    $classarm= $stmt->fetchAll(PDO::FETCH_ASSOC); 
} catch (PDOException $e) {
    die("Query Failed: " . $e->getMessage());
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
            <h2>CREATE CLASS TEACHER</h2>
            <div class="board2">
                <form id="teacher" action="handlers/teacherhandler.php?emailid=$emailid" method="post">
                <div class="student-info">
                    <label for="firstname">First Name<span class="required">*</span>:</label><br>
                    <input type="text" id="firstname" name="firstname" placeholder="--Enter First Name--" required><br>
                    
                    <label for="lastname">Last Name<span class="required">*</span>:</label><br>
                    <input type="text" id="lastname" name="lastname" placeholder="--Enter Class LAST Name--" required><br>
                    
                    <label for="tmailid">Email Id<span class="required">*</span>:</label><br>
                    <input type="text" id="tmailid" name="tmailid" placeholder="--Enter Email Id--" required><br>
                    
                    <label for="phoneno">PhoneNo <span class="required">*</span>:</label><br>
                    <input type="text" id="phoneno" name="phoneno" placeholder="--Enter PhoneNo--" required><br>
                    
                    <label for="classname">Select Class<span class="required">*</span>:</label><br>
                    <select id="classname" name="classname">
                        <option value="" disabled selected>--Select Class--</option>
                        <?php
                        foreach ($classarm as $class) {
                                echo "<option value='{$class['classname']}'>{$class['classname']}</option>";
                            }
                        ?>
                    </select><br>
                    <label for="classarmname">Select Arm<span class="required">*</span>:</label><br>
                    <select id="classarmname" name="classarmname">
                        <option value="" disabled selected>--Select Arm--</option>
                        <?php
                        foreach ($classarm as $class) {
                                echo "<option value='{$class['classarmname']}'>{$class['classarmname']}</option>";
                            }
                        ?>
                    </select><br> 
                    <label for="password">Set Password <span class="required">*</span>:</label><br>
                    <input type="password" id="password" name="password" placeholder="--Enter Password--" required><br>
                    
                    <label for="confirm_password"> Confirm Password<span class="required">*</span>:</label><br>
                    <input type="password" id="confirm_password" name="confirm_password" placeholder="--Enter password--" onkeyup="checkPasswordMatch();" required><br>
                    <span id="confirm_password_error" style="color: red;"></span><br>
                    <button >Save</button>
                </div>
                </form>
            </div>
            <br>
            <div class="board2">
                <div class="student-info">
                <table>
                    <thead>
                        <tr>
                            <th>S.NO</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Phoneno</th>
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
                            echo "<td>" . $row['firstname'] . "</td>";
                            echo "<td>" . $row['lastname'] . "</td>";
                            echo "<td>" . $row['phoneno'] . "</td>";
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
    </main>
    <footer>
        <hr>
        <p class="copyright">&copy;Developed by teja akshay kumar 2024</p>
    </footer>
    </body>
    <script src="javascript.js"></script>
    </html>
