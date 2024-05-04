<?php include 'header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Registration</title>
    <style>
        body {
            
            align-items: center;

            height: 100vh;
            margin: 0;
            background-color: #f8f9fa; /* Set a background color for the body */
        }

        .login {
            width: 450px;
            height: 550px;
            background: transparent;
            border: 2px solid rgba(255, 255, 255, 0.5);
            border-radius: 20px;
            backdrop-filter: blur(15px);
            display: flex;
            flex-direction: column;
            align-items: center;
            padding:20px 55px;
        }

        .login h2 {
            color: white; /* Adjust the color of the heading text */
        }

        .login form {
            width: 100%; /* Make the form width 100% of the container */
            max-width: 300px; /* Set a max-width for better responsiveness */
        }

        .login .mb-3 {
            width: 100%; /* Make the form inputs width 100% of the container */
        }

        .login button {
            width: 100%; /* Make the button width 100% of the container */
        }

        /* Add any other styles as needed */
    </style>
</head>
<body>
    <center>
    <div class="login">
        <h2 class="text-center">Register </h2>
        <form action="../actions/back1.php" method="POST" enctype="multipart/form-data">
        <div class="container text-center">
                <div class="mb-3">
                    <input type="text" class="form-control w-100" name="username" placeholder="Enter your username" required="required">
                </div> 
                <div class="mb-3">
                <input type="password" class="form-control w-100" name="password" id="password" placeholder="Enter your password" oninput="displayAsterisks(this.value)" required="required">
                </div>
                <div class="mb-3">
                <input type="password" class="form-control w-100" name="password" id="password" placeholder="confirm your password" oninput="displayAsterisks(this.value)" required="required">
                </div>
                <div class="mb-3">
    <input type="text" class="form-control w-100" name="phonenumber" placeholder="Enter your phone number" required="required" pattern="[0-9]{10}" title="Please enter a 10-digit phone number consisting of numbers only">
</div>
                <div class="mb-3">
                    <input type="file" class="form-control w-100" name="photo"  required="required">
                </div>
                <div class="mb-3">
                    <select class="form-select w-100" name="std" required="required">
                        <option value="group">Group</option>
                        <option value="voter">Voter</option>
                    </select>    
                </div>
                <button type="submit" class="btn btn-dark my-4">Register</button>
                <p>Already have account? <a href="./login.php" class="text-white">Login here</a></p>
        </div>
    </form>
    </div>
    <center>
    <script>
    function displayAsterisks(input) {
            var passwordField = document.getElementById("password");
            var displayField = document.getElementById("displayPassword");

            var asterisks = "*".repeat(input.length);

            displayField.value = asterisks;
        }
    </script>
    <script>
    function validatePhoneNumber() {
        var phoneNumberInput = document.getElementsByName("phonenumber")[0];
        var phoneNumber = phoneNumberInput.value;
        phoneNumber = phoneNumber.replace(/\D/g, '');
        if (phoneNumber.length !== 10) {
            alert("Please enter a 10-digit phone number.");
            phoneNumberInput.value = ""; 
            return false;
        }
        return true;
    }
</script>


</body>
</html>
