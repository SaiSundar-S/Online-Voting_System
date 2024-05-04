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
    /* ... (your existing styles) ... */

    /* Add new styles for the form */
    .add-election-form {
      margin: 20px; /* Adjust the margin as needed */
      padding: 20px;
      background: #fff;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .add-election-form label {
      display: block;
      margin-bottom: 10px;
    }

    .add-election-form input {
      width: 100%; /* Make the input full width */
      padding: 8px;
      margin-bottom: 10px;
      box-sizing: border-box;
    }

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

    .bg-green {
        background-color:#67C232;
    }
    .text-white{color:#fff;}
    
 .bg-green {
    position: relative;
      background:#67C232;
      margin:10px;
      padding: 5px;
      width: auto;
      
 }
 .table th {
    padding: 10px; /* Adjust the padding as needed */
  }
  .candidate_photo{
    width:80px;
    height:80px;
    border:2px solid #67C232
    border-radius:100%;
  }
  </style>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  
</head>

<body>

  <div class="content">
    
    
   
   
    <!-- Add your second form here -->
    <div class="upcoming-election-form">
      <h3>Election Results</h3>
      <?php
      $fetchingActiveElections=mysqli_query($con,"SELECT * FROM elections WHERE status='Active'")or die(mysqli_error($con));
      $totalActiveElections=mysqli_num_rows($fetchingActiveElections) ;

      if($totalActiveElections > 0)
      {
        while($data=mysqli_fetch_assoc($fetchingActiveElections))
        {
        $election_id=$data['id'];
        $election_topic=$data['election_topic'];
        ?>
            <table class="table">
            <thead>
                <tr>
                <th colspan="8" class="bg-green text-white">ELECTION TOPIC:<?php echo strtoupper($election_topic);?></th>
                </tr>
                <tr>
                

                <th scope="col">Photo</th>
                <th scope="col">Candidate Details</th>
                <th scope="col"># of Votes</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $fetchingCandidates=mysqli_query($con,"SELECT * FROM candidate_details WHERE election_id ='" . $election_id ."'" )or die(mysqli_error($con));

                while ($candidateData=mysqli_fetch_assoc($fetchingCandidates))
                {
                    $candidate_id=$candidateData['id'];
                    $candidate_photo=$candidateData['candidate_photo'];

                    //fetching candidates votes
                    $fetchingVotes=mysqli_query($con,"SELECT * FROM votings WHERE candidate_id='". $candidate_id ."'") or die(mysqli_error($con));
                    $totalVotes=mysqli_num_rows($fetchingVotes);

                    
                    ?>
                    <tr>
                        <td><img src="<?php echo $candidate_photo; ?>" class="candidate_photo"></td>
                        <td><?php  echo "<b>". $candidateData['candidate_name']."</b><br/>".$candidateData['candidate_detials'];?></td>
                        <td><?php echo $totalVotes;?></td>
                       
                </tr>


                <?php
                }
                ?>
            </tbody>
        </table>
        <?php

        }
    }else{
        echo "no active elections";
      }
      ?>
      
<hr><h3>Voting Details </h3>
<table class="table">
<tr>
  <th> S.No </th>
  <th> Voter Name </th>
  <th> Contact No </th>
  <th> Voted To  </th>
  <th> Date </th>
  <th> Time  </th>
    </tr>
<?php 

 $fetchingVoteDetails=mysqli_query ($con,"SELECT * FROM votings WHERE election_ID='".$election_id."'");
 $number_of_votes=mysqli_num_rows($fetchingVoteDetails);
 if($number_of_votes >0)
 {
  $sno=1;
  while ($data=mysqli_fetch_assoc($fetchingVoteDetails)){
    $voters_id=$data['voters_id'];
    $candidate_id=$data['candidate_id'];

    $fetchingUsername=mysqli_query($con,"SELECT * FROM userdata WHERE id='".$voters_id."'")or die(mysqli_error($con));
    $isDataAvailable=mysqli_num_rows($fetchingUsername);
    $userData=mysqli_fetch_assoc($fetchingUsername);

    if($isDataAvailable > 0)
    {
      $username=$userData['username'];
      $contact_no=$userData['phonenumber'];
    }else{
      $username="NO_data";
      $contact_no=$userData['phonenumber'];
    }

    $fetchingCandidatename=mysqli_query($con,"SELECT * FROM candidate_details WHERE id='".$candidate_id."'")or die(mysqli_error($con));
    $isDataAvailable=mysqli_num_rows($fetchingCandidatename);
    $candidateData=mysqli_fetch_assoc($fetchingCandidatename);

    if($isDataAvailable > 0)
    {
      $candidate_name=$candidateData['candidate_name'];
    }else{
      $candidate_name="NO_data";
    }
    ?>

          <tr>
            <td><?php echo $sno++; ?> </td>
            <td><?php echo $username; ?> </td>
            <td><?php echo $contact_no ;?> </td>
            <td><?php echo  $candidate_name; ?> </td>
            <td><?php echo $data['vote_date']?> </td>
            <td><?php echo $data['vote_time']?> </td>

  </tr>



    <?php

  }



 }else{
  echo "No any vote detail is available";
 }




?>
    </div>

    <br><br><br>
  </div>
  

</body>

</html>
