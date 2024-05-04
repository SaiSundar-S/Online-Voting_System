<?php include("admindashboard.php");
$data=$_SESSION['data'];

$con=mysqli_connect("localhost","root","","onlinevotingsystem");

if(!$con){
   die(mysqli_error($con))  ;
}?>
<?php
 if(isset($_GET['delete_id']))
 {
  $d_id=$_GET['delete_id'];
  mysqli_query($con,"DELETE FROM elections WHERE id='".$d_id."'")or die(mysqli_error($con));
 

?>
<div class="alert alert-danger my-3" role="alert">
Election has deleted successfully.
</div>
<?php
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

  <!-- ... (your existing external stylesheets) ... -->
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>

<body>

  <div class="content">
    <!-- Add your first form here -->
    <div class="add-election-form">
      <br><br>  <br>
      <h3>Add New Election</h3>
      <form  action="../actions/backaddele.php"  method="post" >
      <input type="hidden" id="edit_id" name="edit_id">
        <label for="election_topic">Election Topic:</label>
        <input type="text" id="election_topic" name="election_topic" placeholder="Enter Election Topic" required="required" class="form-control" >
        <input type="number" id="no_of_candidates" name="number_of_candidates" placeholder="No of Candidate" required="required" class="form-control" >
        <input type="text" onfocus="this.type='Date'" id="starting_date" name="starting_date" placeholder="Starting Date" required="required" class="form-control" >
        <input type="text" onfocus="this.type='Date'" id="ending_date" name="ending_date" placeholder="Ending Date" required="required" class="form-control" >

        <input type="submit" value="Add Election" name="addElectionBtn" class="btn-success-small"/>

      </form>
    </div>
   
    <div class="upcoming-election-form">
      <h3>Upcoming Election</h3>
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
         elections.id, elections.election_topic, elections.no_of_candidates, 
         elections.starting_date, elections.ending_date, 
         elections.status AS election_status, elections.inserted_by, elections.inserted_on
       FROM userdata
       INNER JOIN elections ON userdata.username = elections.inserted_by";

$fetchingData = mysqli_query($con, $query) or die(mysqli_error($con));
$isAnyElectionAdded = mysqli_num_rows($fetchingData);

// Check if any election is added
if ($isAnyElectionAdded > 0) {
    $sno = 1;
    // Fetch rows one by one
    if($row = mysqli_fetch_array($fetchingData)) {
      
        $election_id = $row['id'];
?>
        <tr>
            <td><?php echo $sno++; ?></td>
            <td><?php echo $row['election_topic']; ?></td>
            <td><?php echo $row['no_of_candidates']; ?></td>
            <td><?php echo $row['starting_date']; ?></td>
            <td><?php echo $row['ending_date']; ?></td>
            <td><?php echo $row['election_status']; ?></td>
            <td>
                <button class="btn-success-small" onclick= "EditData(<?php echo $election_id;?>)">Edit</button>
                <button class="btn btn-sm btn-warning" onclick="DeleteData(<?php echo $election_id;?>)">Delete</button>
            </td>
        </tr>
<?php
$sno++;
    }
} else {
    // If no election is added yet, display a message
?>
    <tr>
        <td colspan="7"> No elections have been added yet.</td>
    </tr>
<?php
}
?>

        </tbody>
      </table>
      


    </div>

    <br><br><br>
  </div>

  <script>
    const DeleteData=(e_id)=>
    {
      let c = confirm("Are u really want to delete it");
      if(c==true)
      {
        location.assign("addelection.php?addElectionPage=1&delete_id="+e_id);
      }
    }
    </script>
       <script>
    const EditData=(e_id)=>
    {
      let c = confirm("Are u really want to update");
      if(c==true)
      {
        location.assign("update_ele.php?addElectionPage=1&edit_id="+e_id);
      }
    }
    </script>


</body>

</html>
