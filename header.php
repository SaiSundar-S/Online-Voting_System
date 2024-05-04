 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Online Voting System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            background: url('https://akm-img-a-in.tosshub.com/indiatoday/indian-flag-647_070417124550.jpg') no-repeat center center fixed ;
           background-size:cover;
           
           
        }
        a:hover{
            background-color:#FFA500;
        }
        .container {
            padding: 0px;
            font-family: 'Comic Sans MS', cursive, sans-serif;
            
        }

        .text-danger {
            color: black!important; /* Override Bootstrap text-danger color */
        }

        .display-6{
            color: white;
        }
        .lead,
        strong {
            color: white;
            font-size:25px;
           
        }
 
    </style>
</head>
<body class="p-0 m-0 border-0 bd-example m-0 border-0">

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg " data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="home.php"><font face="Comic sans MS" size="5">Online Voting System</font></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="./login.php" class="nav-link active"  >Admin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="./login.php">User</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="service.php">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#"></a>
                    </li>
                </ul>
                <form class="d-flex" role="logout" data-action="/logout">
                    <button class="btn btn-outline-primary active" type="button" style="background-color: red;" onclick="logout()">Logout</button>
                </form>
                
                <script>
    function logout() {
        // Handle logout action here, for example, using JavaScript or making an AJAX request
        console.log('Logout action triggered');

        // Redirect to the home page
        window.location.href = "home.php"; // Replace with the actual home page URL
    }
</script>

            </div>
        </div>
    </nav>
    
</body>
</html>