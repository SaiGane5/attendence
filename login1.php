<?php
// Perform logout actions (destroy session, etc.)
// Redirect the user to another page after logout
header("Location: index.php"); // Redirect to login page
exit(); // Ensure script execution stops here
?>
