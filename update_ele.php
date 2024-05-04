<?php
include("admindashboard.php");
$data = $_SESSION['data'];

$con = mysqli_connect("localhost", "root", "", "onlinevotingsystem");

if (!$con) {
    die(mysqli_error($con));
}

if (isset($_GET['edit_id'])) {
    $edit_id = $_GET['edit_id'];
    $query = "SELECT * FROM elections WHERE id = $edit_id";
    $result = mysqli_query($con, $query);
    $electionData = mysqli_fetch_assoc($result);
} else {
    // Redirect to the page where you display the list of elections
    header("Location: addelection.php?addElectionPage=1");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">

    <style media="screen">
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
    width: 130px !important;
  }
  .btn  {
    /* Add your custom styles here */
    background-color: orange !important; /* Bootstrap success button color */
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
      margin: 20px; /* Adjust the margin as needed */
      padding: 20px;
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

   
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>

<body>

    <div class="content">
        <!-- Add your form for updating election here -->
        <div class="add-election-form">
            <br><br> <br>
            <h3>Update Election</h3>
            <form action="../actions/backaddele.php" method="post" id="updateform">
                <input type="hidden" name="edit_id" value="<?php echo $electionData['id']; ?>">
                <label for="election_topic">Election Topic:</label>
                <input type="text" name="election_topic" placeholder="Enter Election Topic" required="required" class="form-control" value="<?php echo $electionData['election_topic']; ?>">
                <input type="number" name="number_of_candidates" placeholder="No of Candidate" required="required" class="form-control" value="<?php echo $electionData['no_of_candidates']; ?>">
                <input type="text" onfocus="this.type='Date'" name="starting_date" placeholder="Starting Date" required="required" class="form-control" value="<?php echo $electionData['starting_date']; ?>">
                <input type="text" onfocus="this.type='Date'" name="ending_date" placeholder="Ending Date" required="required" class="form-control" value="<?php echo $electionData['ending_date']; ?>">

                <input type="submit" value="Update Election" name="updateElectionBtn" class="btn-success-small" />
            </form>
        </div>
    </div>
    <script>
        const EditData = (e_id) => {
            $.get("get-election-data.php", { edit_id: e_id }, function (data) {
                const electionData = JSON.parse(data);

                // Fill the form fields
                document.getElementById('edit_id').value = electionData.id;
                document.getElementById('election_topic').value = electionData.election_topic;
                document.getElementById('no_of_candidates').value = electionData.no_of_candidates;
                document.getElementById('starting_date').value = electionData.starting_date;
                document.getElementById('ending_date').value = electionData.ending_date;
                document.getElementById('election_status').value = electionData.election_status;

                // Fill other form fields similarly
            });
        }
    </script>
</body>

</html>
