<?php 
session_start();
$data=$_SESSION['data'];

?>

<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">

  <style media="screen">
    a:link {
      text-decoration: none;
      font-family:Comic sans MS;
    }

    body {
      margin: 0;
      padding: 0;
      font-family: "Gill Sans", sans-serif;
      background: url('https://www.shutterstock.com/image-photo/india-national-flag-on-leaders-260nw-1385296979.jpg') no-repeat center center fixed ;
      background-size: cover;
           
    }

    header {
      position: fixed;
      background: linear-gradient(135deg, #4caf50, #2196f3);
      padding: 5px;
      width: 100%;
      z-index: 1;
    }

    .left_area h3 {
      color: #fff;
      margin: 0px;
      text-transform: uppercase;
      font-family:Comic sans MS;
      font-size: 22px;
      font-weight: 900;
    }

    .left_area span {
      color: #19B3D3;
    }

    .logout_btn {
      padding: 5px;
      background: #19B3D3;
      text-decoration: none;
      float: right;
      margin-top: -30px;
      margin-right: 40px;
      border-radius: 2px;
      font-size: 15px;
      font-weight: 600;
      color: #fff;
      transition: 0.5s;

    }

    .logout_btn:hover {
      background: #0B87A6;
    }

    .sidebar {
       background: linear-gradient(135deg, #4caf50, #2196f3);
      margin-top: 70px;
      padding-top: 30px;
      position: fixed;
      left: 0;
      width: 250px;
      height: 100%;
      transition: 0.5s;
      transition-property: left;
    }

    .sidebar .profile_image {
      width: 100px;
      height: 100px;
      border-radius: 100px;
      margin-bottom: 10px;
    }

    .sidebar h4 {
      color: #ccc;
      margin-top: 0;

    }

    .sidebar a {
      color: #fff;
      display: block;
      width: 100%;
      line-height: 60px;
      text-decoration: none;
      padding-left: 40px;
      box-sizing: border-box;
      transition: 0.5s;

    }

    .sidebar a:hover {
      background: #19B3D3;
    }

    .sidebar i {
      padding-right: 10px;
    }

    label #sidebar_btn {
      z-index: 1;
      border-radius: 1px;
      background:transparent;
      color: #fff;
      position: left;
      cursor: pointer;
      left: 200px;
      font-size: 20px;
      margin: 2px 0;
      transition: 0.5s;
      transition-property: color;
    }

    label #sidebar_btn:hover {
      color: #19B3D3;
    }

    #check:checked~.sidebar {
      left: -190px;
    }

    #check:checked~.sidebar a span {
      display: none;
    }

    #check:checked~.sidebar a {
      font-size: 20px;
      margin-left: 170px;
      width: 80px;
    }

    .content {
      margin-left: 250px;
      background: url(background.png) no-repeat;
      background-position: center;
      background-size: cover;
      height: 100vh;
      transition: 0.5s;
    }

    #check:checked~.content {
      margin-left: 60px;
    }

    #check {
      display: none;
    }
    
  </style>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">


</head>

<body>

  <input type="checkbox" id="check">
  <!--header area start-->
  <header>
   
    <div class="left_area">
      <h3>ONLINE VOTING SYSTEM</h3>
       <label for="check">
      <i style="left: 100px;margin-top: 17px;"class="fas fa-bars" id="sidebar_btn"></i>
     
    </label>
    </div>
    <div class="right_area">
      <a href="../phpfiles/home.php" class="logout_btn">Logout</a>
    </div>
  </header>
  <!--header area end-->
  <!--sidebar start-->
  <div class="sidebar">
   
    <center>

<img src="../uploads/<?php echo $data['photo']?>" class="profile_image" alt="">
<h4><?php echo $data['username']?></h4>
<h6 style="color: rgb(255, 255, 255);"></h6>
<h3>Voterpanel</h3>
    </center>

    <a href="voterhome.php"><i class="fas fa-home"></i><span>HOME</span></a>
    <a href="voterpanel.php"><i class="bi bi-bar-chart-line"></i><span>VOTERPANEL</span></a>
    <a href="retrieve.php"><i class="bi bi-people-fill"></i><span>VOTERLIST</span></a>
    <a href="../phpfiles/login.php"><i class="bi bi-box-arrow-right"></i><span>LOGOUT</span></a>
  </div>
  <!--sidebar end-->

  
</body>

</html>