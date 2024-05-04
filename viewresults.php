<?php include("admindashboard.php");
$data=$_SESSION['data'];
$_SESSION['user_id']=$data['id'];

$con=mysqli_connect("localhost","root","","onlinevotingsystem");

if(!$con){
   die(mysqli_error($con))  ;
}


?>


<!DOCTYPE html>
<html lang="en" dir="ltr">z

<head>
  <meta charset="utf-8">

  <style media="screen">
    

   /* Add a style for the "Add Election" button */
   .btn-success-small {
    /* Add your custom styles here */
    background-color: #28a745 !important; /* Bootstrap success button color */
    color: #fff !important; /* Text color */
    border: none !important; /* Remove button border */
    padding: 8px 16px !important; /* Adjust padding as needed */
    border-radius: 4px !important; /* Optional: Add border-radius for rounded corners */
    cursor: pointer !important;
    font-size: 14px !important; 
    width: 110px !important;
  }

  .btn-success-small:hover {
    background: #218838 !important; /* Change color on hover */
  }

    .upcoming-election-form {
      margin: 40px; /* Adjust the margin as needed */
      padding: 30px;
      background: #fff;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .upcoming-election-form label {
      display: block;
      margin-bottom: 10px;
    }

    .upcoming-election-form input {
      width: 100%; /* Make the input full width */
      padding: 8px;
      margin-bottom: 10px;
      box-sizing: border-box;
    }

    .upcoming-election-form button {
      background: #2196f3;
      color: #fff;
      padding: 10px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    .upcoming-election-form button:hover {
      background: #0b7dda;
    }

    .table {
      border-collapse: separate;
      border-spacing: 20px; /* Adjust the spacing as needed */
    }
  </style>

  <!-- ... (your existing external stylesheets) ... -->
</head>

<body>

  <div class="content">
    
    
    
   
    <!-- Add your second form here -->
    <div class="upcoming-election-form">
      <h2> Elections</h2>
      <table class="table">
          <thead>
            <tr>
              <th scope="col">S.NO</th>
              <th scope="col">Election Name</th>
              <th scope="col"># Candidate</th>
              <th scope="col">Starting Date</th>
              <th scope="col">Ending Date</th>
              <th scope="col">Status </th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
             $query = "SELECT userdata.username, userdata.password, userdata.phonenumber, userdata.photo, 
             userdata.standard, userdata.status AS user_status, userdata.votes, 
             elections.election_topic, elections.no_of_candidates, 
             elections.starting_date, elections.ending_date, 
             elections.status AS election_status, elections.inserted_by, elections.inserted_on
            FROM userdata
           INNER JOIN elections ON userdata.username = elections.inserted_by";

        $fetchingData = mysqli_query($con, $query) or die(mysqli_error($con));
        $isAnyElectionAdded = mysqli_num_rows($fetchingData);      
          if ($isAnyElectionAdded > 0) {
            $sno = 1;
            if($row = mysqli_fetch_array($fetchingData)) {
              $election_id=$_SESSION['user_id'];
          ?>
              <tr>
                <td><?php echo $sno++; ?></td>
                <td><?php echo $row['election_topic']; ?></td>
                <td><?php echo $row['no_of_candidates']; ?></td>
                <td><?php echo $row['starting_date']; ?></td>
                <td><?php echo $row['ending_date']; ?></td>
                <td><?php echo $row['election_status']; ?></td>
                <td>
                  <a href="results.php?viewResult=<?php echo $election_id;  ?>" class="btn-success-small">View Results</a>
                </td>
              </tr>
          <?php
            }
          } else {
          ?>
            <tr>
              <td colspan="7"> No any election is added yet.</td>
            </tr>
          <?php
          }
          ?>
        </tbody>
      </table>
      


    </div>

    <br><br><br>
  </div>
        
</body>

</html>
