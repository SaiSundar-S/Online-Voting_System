<?php

// Include the necessary libraries
require 'vendor/autoload.php'; // Assuming you've installed PhpSpreadsheet via Composer
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

$conn = mysqli_connect("localhost", "root", "", "onlinevotingsystem");

if (!$conn) {
    die(mysqli_error($conn));
}

// Check if the form is submitted
if (isset($_POST['upload'])) {
    // File upload handling
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($_FILES["excelFile"]["name"]);
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if the file is an Excel file
    if ($fileType != "xls" && $fileType != "xlsx") {
        echo '<script>alert("Only Excel files are allowed.");</script>';
        $uploadOk = 0;
    }

    // If the file is allowed, proceed with the upload
    if ($uploadOk == 1) {
        move_uploaded_file($_FILES["excelFile"]["tmp_name"], $targetFile);

        // Read Excel file and store data in the database
        $spreadsheet = (new Xlsx())->load($targetFile);
        $worksheet = $spreadsheet->getActiveSheet();
        $highestRow = $worksheet->getHighestRow();

        for ($row = 2; $row <= $highestRow; ++$row) {
            $data1 = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
            $data2 = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
            $data3 = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
            $data4 = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
            $data5 = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
            $data6 = $worksheet->getCellByColumnAndRow(6, $row)->getValue();

            // Check if the data already exists in the database
            $checkSql = "SELECT * FROM citizendata WHERE name = '$data1' AND gender = '$data2' AND age = '$data3' AND adhar_card = '$data4' AND election_card = '$data5' AND mobile = '$data6'";
            $result = $conn->query($checkSql);

            if ($result) {
                if ($result->num_rows == 0) {
                    // If the data does not exist, insert into the database
                    $insertSql = "INSERT INTO citizendata (name, gender, age, adhar_card, election_card, mobile) VALUES ('$data1', '$data2','$data3', '$data4','$data5', '$data6')";
                    if ($conn->query($insertSql)) {
                        echo '<script>alert("Row inserted successfully: ' . $data1 . ', ' . $data2 . ', ' . $data3 . ', ' . $data4 . ', ' . $data5 . ', ' . $data6 . '");</script>';
                    } else {
                        echo '<script>alert("Error inserting row: ' . $conn->error . '");</script>';
                    }
                } else {
                    echo '<script>alert("Row already exists: ' . $data1 . ', ' . $data2 . ', ' . $data3 . ', ' . $data4 . ', ' . $data5 . ', ' . $data6 . '");</script>';
                }
            } else {
                echo '<script>alert("Query error: ' . $conn->error . '");</script>';
            }
        }

        echo '<script>alert("File uploaded and data stored successfully.");</script>';
        echo '<script>window.location.href = "retrieve.php";</script>'; // Redirect to retrieve.php
    } else {
        echo '<script>alert("Error uploading file.");</script>';
    }

    // Close the database connection
    $conn->close();
}


?>
