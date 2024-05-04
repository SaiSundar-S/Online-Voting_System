<?php
include("admindashboard.php");

$con = mysqli_connect("localhost", "root", "", "onlinevotingsystem");

if (!$con) {
    die(mysqli_error($con));
}

if (isset($_GET['edit_id'])) {
    $edit_id = $_GET['edit_id'];
    $query = "SELECT * FROM candidate_details WHERE id = $edit_id";
    $result = mysqli_query($con, $query) or die(mysqli_error($con));
    $candidateData = mysqli_fetch_assoc($result);

    // Output the data as JSON for JavaScript to handle
    echo json_encode($candidateData);
}
if (isset($_GET['edit_id'])) {
    $edit_id = $_GET['edit_id'];
    $query = "SELECT * FROM elections WHERE id = $edit_id";
    $result = mysqli_query($con, $query) or die(mysqli_error($con));
    $electionData = mysqli_fetch_assoc($result);

    // Output the data as JSON for JavaScript to handle
    echo json_encode($electionData);
}
?>
