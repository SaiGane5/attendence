<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $emailid = htmlspecialchars($_POST["emailid"]); // Sanitize email
    $password = $_POST["password"];
    $userRole = $_POST["userRole"];
  
    try {
      require_once "dbh.php";
      $query = "SELECT * FROM userr WHERE emailid = ? && userrole=?";
      $stmt = $pdo->prepare($query);
      $stmt->execute([$emailid,$userRole]);
      $user = $stmt->fetch(PDO::FETCH_ASSOC);
      if ($user !== false){
        if ($userRole == "administrator" || $userRole == "teacher") {
            $query = "UPDATE userr set password=? WHERE emailid = ? && userrole=?";
            $stmt = $pdo->prepare($query);
            $stmt->execute([$password,$emailid,$userRole]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            $_SESSION['message'] = "Password updated successfully.";
            header("Location: index.php");
            exit();
        } else {
            echo '<script>alert("Invalid user role.");</script>'; 
          }
        }
        else {
          echo '<script>alert("Invalid email");</script>';
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
    <link rel="stylesheet" href="style.css">

</head>   
<body id="top">

    <main>
        <div class="background-image">
            <div class="login-container">
                <h1>UPDATE YOUR CREDENTIALS</h1>
                <form id="loginForm" action="" method="post">
                <select id="userRole" name="userRole">
                <option value="" disabled selected>--Select User Role--</option>
                <option value="administrator">Administrator</option>
                <option value="teacher">Teacher</option>
                </select> 
                <br>
                <input type="text" id="emailid" name="emailid" placeholder="--Enter Email Id--" required>
                <br>
                <input type="password" id="password" name="password" placeholder="--Enter new Password--" required>
                <br>
                <input type="password" id="confirm_password" name="confirm_password" placeholder="--confirm Password--" onkeyup="checkPasswordMatch();"
 required>
                <br>
                <span id="confirm_password_error" style="color: red;"></span><br>
                <button>Update</button>
                <br>
            </form>
        </div>
    </div> 
</body>
<script src="javascript.js"></script>

</html>
