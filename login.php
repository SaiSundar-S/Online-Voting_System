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
            width: 400px;
            height: 450px;
            background: transparent;
            border: 2px solid rgba(255, 255, 255, 0.5);
            border-radius: 20px;
            backdrop-filter: blur(15px);
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
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
            <h2 class="text-center">Login</h2>
            <div class="container text-center">
                <form action="../actions/back2.php" method="POST">
                    <div class="mb-3">
                        <input type="text" class="form-control w-100" name="username" placeholder="Enter your username" required="required">
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control w-100" name="password" id="password" placeholder="Enter your password" oninput="displayAsterisks(this.value)" required="required">
                    </div>
                    
                    <div class="mb-3">
                        <select class="form-select w-100" name="std" required="required">
                            <option value="group">Group</option>
                            <option value="voter">Voter</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-dark my-4">Login</button>
                    <p>Don't have an account? <a href="./Register.php" class="text-white">Register here</a></p>
                </form>
            </div>
        </div>
    <center>

    <script>
        function displayAsterisks(input) {
            // Get the input field and the display field
            var passwordField = document.getElementById("password");
            var displayField = document.getElementById("displayPassword");

            // Create a string with the same length as the input, filled with asterisks
            var asterisks = "*".repeat(input.length);

            // Set the value of the display field to the asterisks string
            displayField.value = asterisks;
        }
    </script>
</body>


</html>
