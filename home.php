<?php include("header.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>home
    </title>
 <style>         
 /* Apply styles to the div */
 .my-div {
    padding: 40px;
    font-family: 'Comic Sans MS', cursive, sans-serif;
      background-color: rgba(255, 0, 0, 0.2);;
      color: #fff;
      text-align: center;
      transition: background-color 0.9s ease;
    }

    /* Apply hover styles */
    .my-div:hover {
      background:transperant;
    }
    .my-div  {
      position: relative;
      animation: moveRightAndLeft 4s linear infinite alternate ;
     
    }

    /* Define the animation keyframes */
    @keyframes moveRightAndLeft {
      0%, 100% {
        left: 0;
      }
      50% {
        left: calc(10% - 50px); /* Adjust the width of the moving element */
      }
    }

    .display-1 {
      animation: blink 1s infinite;
    }

    /* Define the animation keyframes for blinking text */
    @keyframes blink {
      0%, 50%, 100% {
        opacity: 1;
      }
      25%, 75% {
        opacity: 0;
      }
    }
    </style>
</head>
<body>
<section id="section-jumbotron" class="jumbotron jumbotron-fluid d-flex justify-content-center align-items-center">
  <div class="container text-center">
    <div class="my-div" >
    <h1 class="display-1 text-danger"><b>My Vote My Voice</b></h1>
    <p class="display-6 d-none d-sm-block">"Click to Shape Tomorrow: Online Voting Made Easy."</p>
    <p class="lead">We organize Online Voting to select your right Leader for Tomorrow</p>



    <p class="lead"> Embrace the power of technology in shaping the democratic process -it's time for your vote to make a difference."</p>
    <p><strong> "The Ballet is Stronger than The Bullet" select your right choice:</strong></p>
    <a href="login.php" class="btn btn-lg btn-info" style="padding-right: 35px;"><i class="fa fa-user-plus" aria-hidden="true"></i> Vote Here</a>
</div>

  </div>  
</section>

</body>
</html>