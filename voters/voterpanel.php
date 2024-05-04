<?php include("voterdashboard.php");
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
      <h3>Voter Panel</h3>
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
                <th scope="col">Action</th>
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
                        <td>
                            <?php
                            $checkIfVoteCasted=mysqli_query($con,"SELECT * FROM votings WHERE voters_id='".$_SESSION['user_id']."'AND election_id='".$election_id."'") or die(mysqli_error($con));
                            
                            $isVoteCasted=mysqli_num_rows($checkIfVoteCasted);

                            if( $isVoteCasted > 0)
                            {
                                $voteCastedDate=mysqli_fetch_assoc($checkIfVoteCasted);
                                $voteCastedToCandidate=$voteCastedDate['candidate_id'];

                                if($voteCastedToCandidate == $candidate_id)
                                {
                            ?>
                                    <img src="../uploads/assets/vote.png" width="100px;">
                            <?php

                                }
                       
                            }else{
                             ?>
                             <button class="btn btn-md btn-success " onclick="CastVote(<?php echo $election_id; ?>,<?php echo $candidate_id;?>,<?php echo $_SESSION['user_id'];?>)">VOTE</button>
                            <?php

                             }
                            ?>
                        </td>
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
      


    </div>

    <br><br><br>
  </div>
  <script>
   const CastVote = (election_id, customer_id, voters_id) =>
   { 
        $.ajax({
            type:"POST",
            url:"./ajaxCalls.php",
            data:"e_id="+ election_id + "&c_id="+ customer_id + "&v_id=" +voters_id,
            success: function(response)
            {
             if(response=="Success")
             {
                location.assign("voterpanel.php?voteCasted=1");
             }else{
                location.assign("voterpanel.php?voteNOTCasted=1");

             }
            }
        });

   }

    </script>

</body>

</html>
