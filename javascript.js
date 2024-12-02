function navigate() {
    var selectElement = document.getElementById("class");
    var selectedOption = selectElement.options[selectElement.selectedIndex].value;
    
    if (selectedOption === "manageclasses") {
        window.location.href = "images/p.php"; // Replace with the appropriate URL
    } else if (selectedOption === "manageclassarms") {
        window.location.href = "index.php"; // Replace with the appropriate URL
    }
}

function checkPasswordMatch() {
    var password = document.getElementById("password").value;
    var confirmPassword = document.getElementById("confirm_password").value;

    if (password != confirmPassword) {
        document.getElementById("confirm_password_error").innerHTML = "Passwords do not match!";
    } else {
        document.getElementById("confirm_password_error").innerHTML = "";
    }
}
