<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $emailid = htmlspecialchars($_POST["emailid"]); // Sanitize email
    $password = $_POST["password"];
    $userRole = $_POST["userRole"];
  
    try {
      require_once "dbh.php";
      $query = "SELECT * FROM userr WHERE emailid = ? && password=? && userrole=?";
      $stmt = $pdo->prepare($query);
      $stmt->execute([$emailid,$password,$userRole]);
      $user = $stmt->fetch(PDO::FETCH_ASSOC);
      if ($user !== false){
        $_SESSION['emailid'] = $emailid;
          if ($userRole == "administrator" ) { 
            $_SESSION['emailid'] = $emailid;
            header("Location: admindashboard.php?emailid=$emailid");
            exit();
          } else if ($userRole == "teacher") {
            $_SESSION['emailid'] = $emailid;
            header("Location: teacher.php?emailid=$emailid");
            exit();
          } else {
            echo '<script>alert("Invalid user role.");</script>'; 
          }
        }
        else {
          echo '<script>alert("Invalid email or password");</script>';
        }
      } catch (PDOException $e) {
      echo "Database connection failed. Please try again later."; 
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SAS</title>
    <link rel="stylesheet" href="style.css?v=1.0">

</head>   
<body id="top">
    <?php
    if (isset($_SESSION['message'])) {
        echo '<script>alert("' . $_SESSION['message'] . '");</script>';
        unset($_SESSION['message']); // Clear the message after displaying it
    }
    ?>
      <header>
          <h1>WELCOME TO ATTENDENCE MANANGEMENT SYSTEM</h1>
          <hr>
          <h2>Attendance Management that Empowers Your School Community</h2>
      </header>
      <section>
        <div class="about">
          <h3>Say goodbye to cumbersome paper records and traditional excel sheets, and 
            welcome a smarter way to manage school attendance. Generate insightful reports,
             streamline attendance tracking, and enable teachers to take attendance effortlessly.<br>
              Our cloud-based attendance management system is designed specifically for schools, 
            offering distinct administrative control for each school and hands-on features for teachers.
          </h3>
          <button class="b1" onclick="window.open('signup.php', '_blank')">Signup for free</button>
          </div>
      </section> 

      <section>
        <div class="background-image">
            <div class="login-container">
                <h1>Student Attendence System</h1>
                <img src="images/logo.png" alt="Your Wellness, Our Priority" class="logo">
                <h2>Login</h2>
                <form id="loginForm" action="" method="post">
                <select id="userRole" name="userRole">
                <option value="" disabled selected>--Select User Role--</option>
                <option value="administrator">Administrator</option>
                <option value="teacher">Teacher</option>
                </select> 
                <br>
                <input type="text" id="emailid" name="emailid" placeholder="--Enter Email Id--" required>
                <br>
                <input type="password" id="password" name="password" placeholder="--Enter Password--" required>
                <br>
                <button>Login</button>
                <br>
                <a href="forgot.php">Forgot Password</a>
                <br>
            </form>
        </div>
  </section> 
    <footer>
    <hr>
    <center>
        <p class="copyright">&copy;Developed by teja akshay kumar 2024</p>
  </center>
    </footer>
</body>
</html>
