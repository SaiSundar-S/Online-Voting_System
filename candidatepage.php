<?php 
include __DIR__ . '/../actions/connect.php';
include "admindashboard.php";
$data=$_SESSION['data'];


if(isset($_GET['added']))
{
?>
<div class="alert alert-success my-3" role="alert">
  Candidate has been added successfully
</div>
<?php
}else if(isset($_GET['largeFile'])){
  ?>
  <div class="alert alert-danger my-3" role="alert">
    Candidate image is too large,please upload small file (you can upload any image upto 2mbs.)
</div>
<?php
}else if(isset($_GET['invalidFile']))
{
  ?>
  <div class="alert alert-danger my-3" role="alert">
    only jpg,png,jpeg is valid.
</div>
<?php
}else if(isset($_GET['failed']))
{
  ?>
  <div class="alert alert-danger my-3" role="alert">
    image uploading failed ,try again.
  </div>
<?php
}
?>
<?php
// Handle the delete operation
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    mysqli_query($con, "DELETE FROM candidate_details WHERE id='$delete_id'") or die(mysqli_error($con));
    
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
    .add-election-form select {
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
    .candidate_photo{
      width:80px;
      height:80px;
      border:1px solid # 67c232;
      border-radius:100%;

    }
    .file-input-container {
    position: relative;
    overflow: hidden;
    margin-top: 10px;
  }

  /* Style for the file input */
  .file-control {
    width: 100%; /* Make the input full width */
    padding: 8px;
    margin-bottom: 10px;
    box-sizing: border-box;
    border: 1px solid ; /* Add border to the file input */
    font-size: 10px; /* Adjust the font size as needed */
    cursor: pointer;
  }
  </style>

  <!-- ... (your existing external stylesheets) ... -->
</head>

<body>

  <div class="content">
    
    
    <!-- Add your first form here -->
    <div class="add-election-form">
      <br><br>  <br>
      <h3>Add New Candidates</h3>
      <form  method="post" enctype="multipart/form-data">
        <div class="form-group">
      <select class ="form-control" name="election_id" required>
          <option value=""> Selection Election</option>
          
<?php
            $fetechingElections=mysqli_query ($con,"SELECT * FROM elections") or die(mysqli_error($con));
            $isAnyElectionAdded =mysqli_num_rows($fetechingElections);
            if($isAnyElectionAdded > 0)
            {
                while($row =mysqli_fetch_assoc($fetechingElections))
                {
                    $election_id =$row['id'];
                    $election_name=$row['election_topic'];
                    $allowed_candidates=$row['no_of_candidates'];

                    //now checking how many candidates are added in this election

                    $fetchingCandidate=mysqli_query($con,"SELECT * FROM candidate_details WHERE election_id='".$election_id ."'" ) or die(mysqli_error($con));
                    $added_candidates=mysqli_num_rows($fetchingCandidate);

                    if($added_candidates<$allowed_candidates ){

                    
                    ?>
                    <option value="<?php echo $election_id ?>"><?php echo $election_name ?></option>
                <?php
                    }
                }
            }else{
                ?>
                <option value=""> Please add election first </option>
            <?php
            }
            ?>
        </select>
       <input type="text" name="candidate_name" placeholder="Candidate Name" required="required" class="form-control">
       <div class="file-input-container">
        <input type="file" name="candidate_photo" required="required" class="file-control">
      </div>      
        <input type="text" name="candidate_details" placeholder="Candidate Details" required="required" class="form-control">

        <input type="submit" value="Add Candidates" name="addCandidateBtn" class="btn-success-small"/>
          </div>  </form>
    </div>
    <!-- Add your second form here -->
    <div class="upcoming-election-form">
      <h3>Candidate Details</h3>
      <table class="table">
          <thead>
            <tr>
              <th scope="col">S.NO</th>
              <th scope="col">Photo</th>
              <th scope="col">Name</th>
              <th scope="col">Details</th>
              <th scope="col">Election</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
             

        $fetchingData = mysqli_query($con, "SELECT * FROM candidate_details") or die(mysqli_error($con));
        $isAnyCandidateAdded = mysqli_num_rows($fetchingData);      
          if ($isAnyCandidateAdded > 0) {
            $sno = 1;
            while ($row = mysqli_fetch_array($fetchingData)) {
              $election_id=$row['election_id'];
              $fetchingElectionName = mysqli_query($con,"SELECT * FROM elections WHERE id='".$election_id."'") or die(mysqli_error($con));
             $execfetchingElectionNameQuery=mysqli_fetch_assoc($fetchingElectionName);
              $election_name=$execfetchingElectionNameQuery['election_topic'];
              $candidate_photo=$row['candidate_photo'];
          ?>
              <tr>
                <td><?php echo $election_id; ?></td>
                <td><img src="<?php echo $candidate_photo; ?>" class="candidate_photo" /></td>
                <td><?php echo $row['candidate_name']; ?></td>
                <td><?php echo $row['candidate_detials']; ?></td>
                <td><?php echo $election_name; ?></td>
                <td>
                

                <button class="btn btn-sm btn-warning" onclick="DeleteData(<?php echo $row['id'];?>)">Delete</button>
                </td>
              </tr>
          <?php
          $sno++;
            }
          } else {
          ?>
            <tr>
              <td colspan="7"> No any candidate is added yet.</td>
            </tr>
          <?php
          }
          ?>
        </tbody>
      </table>
      


    </div>

    <br><br><br>
  </div>


  <?php


if (ISSET($_POST['addCandidateBtn'])) {
    $election_id= mysqli_real_escape_string($con, $_POST['election_id']);
    $candidate_name = mysqli_real_escape_string($con, $_POST['candidate_name']);
    $candidate_details = mysqli_real_escape_string($con, $_POST['candidate_details']);
  
//photo
    $targetted_folder="../uploads/assets";
    $candidate_photo =$targetted_folder .rand(1111111111,999999999)."_".rand(1111111111,999999999). $_FILES['candidate_photo']['name'];
    $candidate_photo_tmp_name= $_FILES['candidate_photo']['tmp_name'];
    $candidate_photo_type=strtolower(pathinfo($candidate_photo,PATHINFO_EXTENSION));
    $allowed_types=array("jpg","png","jpeg");
    $image_size=$_FILES['candidate_photo']['size'];

     if($image_size < 2000000)//2mb
     {
        if(in_array($candidate_photo_type,$allowed_types))
        {

           if(move_uploaded_file($candidate_photo_tmp_name,$candidate_photo))
            {

             mysqli_query($con, "INSERT INTO candidate_details (election_id, candidate_name, candidate_detials, candidate_photo) VALUES ('$election_id','$candidate_name','$candidate_details','$candidate_photo')")
               or die(mysqli_error($con));

             echo "<script> location.assign ('candidatepage.php?addCandidatepage=1&added=1');</script>";


            }   else{
             echo "<script> location.assign ('candidatepage.php?addCandidatepage=1&failed=1');</script>";

         }
        } else {
       echo "<script> location.assign ('candidatepage.php?addCandidatepage=1&invalidFile=1');</script>";

        }
}else{
  echo "<script> location.assign ('candidatepage.php?addCandidatepage=1&largeFile=1');</script>";
}

} 
?>
<script>
    const DeleteData = (candidate_id) => {
        console.log("DeleteData function called with candidate_id:", candidate_id);
        let c = confirm("Are you sure you want to delete this candidate?");
        if (c == true) {
            location.assign("candidatepage.php?addCandidatepage=1&delete_id=" + candidate_id);
        }
    }
</script>
<script>
  const EditData=(candidate_id)=>
    {
      console.log("DeleteData function called with candidate_id:", candidate_id);
      let c = confirm("Are u really want to update");
      if(c==true)
      {
        location.assign("updatecandidate.php?addCandidatePage=1&edit_id="+candidate_id);
      }
    }
    </script>

</body>

</html>

<button class="btn-success-small" onclick= "EditData(<?php echo  $row['id'];?>)">Edit</button>