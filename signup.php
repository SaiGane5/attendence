<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SAS</title>
    <link rel="stylesheet" href="style.css?v=1.0">

</head>   
<body id="top">
      <section>
        <div class="background-image1">
            <div class="login-container">
                <h1>Signup your School</h1>
                <form id="loginForm" action="handlers/adminhandler.php" method="post">
                <label for="firstname">First Name<span class="required">*</span>:</label><br>
                    <input type="text" id="firstname" name="firstname" placeholder="--Enter First Name--" required><br>
                    
                    <label for="lastname">Last Name<span class="required">*</span>:</label><br>
                    <input type="text" id="lastname" name="lastname" placeholder="--Enter Class LAST Name--" required><br>
                    
                    <label for="emailid">Email Id<span class="required">*</span>:</label><br>
                    <input type="email" id="emailid" name="emailid" placeholder="--Enter Email Id--" required><br>
                    
                    <label for="phoneno">PhoneNo <span class="required">*</span>:</label><br>
                    <input type="text" id="phoneno" name="phoneno" placeholder="--Enter PhoneNo--" required><br>

                    <label for="schoolname">SchoolName <span class="required">*</span>:</label><br>
                    <input type="text" id="schoolname" name="schoolname" placeholder="--Enter SchoolName--" required><br>

                    <label for="location">Location <span class="required">*</span>:</label><br>
                    <input type="text" id="location" name="location" placeholder="--Enter Location--" required><br>
                    
                    
                    <label for="password">Set Password <span class="required">*</span>:</label><br>
                    <input type="password" id="password" name="password" placeholder="--Enter Password--" required><br>
                    
                    <label for="confirm_password"> Confirm Password<span class="required">*</span>:</label><br>
                    <input type="password" id="confirm_password" name="confirm_password" placeholder="--Enter password--" onkeyup="checkPasswordMatch();" required><br>
                    <span id="confirm_password_error" style="color: red;"></span><br>
                    <button >Signup</button>
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
<script src="javascript.js"></script>
</html>
