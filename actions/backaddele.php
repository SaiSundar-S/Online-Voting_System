<?php
include 'connect.php';

session_start();
$data = $_SESSION['data'];

// Handling form submissions
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Inserting new election
    if (isset($_POST['addElectionBtn'])) {
        // Extracting form data
        $election_topic = mysqli_real_escape_string($con, $_POST['election_topic']);
        $number_of_candidates = mysqli_real_escape_string($con, $_POST['number_of_candidates']);
        $starting_date = mysqli_real_escape_string($con, $_POST['starting_date']);
        $ending_date = mysqli_real_escape_string($con, $_POST['ending_date']);
        $inserted_by = $data['username'];
        $inserted_on = date("Y-m-d");

        // Calculating status based on dates
        $date1 = date_create("$inserted_on");
        $date2 = date_create("$starting_date");
        $diff = date_diff($date1, $date2);
        
        if ($diff->format("%R%a") > 0) {
            $status = "InActive";
        } else {
            $status = "Active";
        }

        // Inserting into database
        mysqli_query($con, "INSERT INTO elections (election_topic, no_of_candidates, starting_date, ending_date, status, inserted_by, inserted_on) VALUES ('$election_topic','$number_of_candidates','$starting_date','$ending_date','$status','$inserted_by','$inserted_on')")
         or die(mysqli_error($con));

        // Redirecting back to the same page
        header("Location: ../phpfiles/addelection.php");
        exit();
    } 
}
if (isset($_POST['updateElectionBtn'])) {
    $edit_id = $_POST['edit_id'];
    $newElectionTopic = $_POST['election_topic'];

    $updateQuery = "UPDATE elections SET election_topic='$newElectionTopic' WHERE id=$edit_id";
    mysqli_query($con, $updateQuery) or die(mysqli_error($con));

    // Redirect back to the same page or handle as needed
    header("Location: ../phpfiles/addelection.php");
    exit();
}

if (isset($_POST['updateCandidateBtn'])) {
    $edit_id = $_POST['id'];
    $newElectionid= $_POST['election_id'];

    $updateQuery = "UPDATE candidate_details SET election_id='$newElectionid' WHERE id=$edit_id";
    mysqli_query($con, $updateQuery) or die(mysqli_error($con));

    // Redirect back to the same page or handle as needed
    header("Location: ../phpfiles/candidatepage.php");
    exit();
}
?>
