<?php
include("admindashboard.php");
$data = $_SESSION['data'];

$con = mysqli_connect("localhost", "root", "", "onlinevotingsystem");

if (!$con) {
    die(mysqli_error($con));
}

if (isset($_GET['edit_id'])) {
    $edit_id = $_GET['edit_id'];
    $query = "SELECT * FROM candidate_details WHERE id = $edit_id";
    $result = mysqli_query($con, $query);
    if ($result) {
      $candidateData = mysqli_fetch_assoc($result);
  } else {
      // Handle the error, you might want to redirect to an error page
      die(mysqli_error($con));
  }
} else {
    // Redirect to the page where you display the list of elections
    header("Location: candidatepage.php?addCandidatePage=1");
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
        <?php
        
      ?>
        
        <div class="add-election-form">
            <br><br> <br>
            <h3>Update Candidate</h3>
             <form action="../actions/backaddele.php" method="post" id="updateform">
                <input type="hidden" name="id" value="<?php echo $candidateData['id']; ?>">
                <label for="election_id">Election ID:</label>
                <input type="number" name="election_id" required="required" class="form-control" value="<?php echo $candidateData['election_id']; ?>">
                <label for="candidate_name">Candidate Name:</label>
                <input type="text" name="candidate_name" required="required" class="form-control" value="<?php echo isset($candidateData['candidate_name']) ? $candidateData['candidate_name'] : ''; ?>">
                <label for="candidate_details">Candidate Details:</label>
                <input type="text" name="candidate_detials" required="required" class="form-control" value="<?php echo isset($candidateData['candidate_detials']) ? $candidateData['candidate_detials'] : ''; ?>">
                <label for="candidate_photo">Candidate Photo:</label>
                <input type="file" name="candidate_photo" required="required" class="form-control" value="<?php echo $candidateData['candidate_photo']; ?>">

                <input type="submit" value="Update Candidate" name="updateCandidateBtn" class="btn-success-small" />
            </form>
        </div>
    </div>
    <script>
        const EditData = (candidate_id) => {
            $.get("get-candidate-data.php", { edit_id: candidate_id }, function (data) {
                const candidateData = JSON.parse(data);

                // Fill the form fields
                document.getElementById('edit_id').value = candidateData.id;
                document.getElementById('election_id').value = candidateData.election_id;
                document.getElementById('candidate_name').value = candidateData.candidate_name;

                document.getElementById('candidate_details').value = candidateData.candidate_details;
                document.getElementById('candidate_photo').value = candidateData.candidate_photo;

                // Fill other form fields similarly
            });
        }
    </script>
</body>

</html>
