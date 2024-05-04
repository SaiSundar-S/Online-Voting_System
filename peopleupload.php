<?php include ("header.php")?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excel File Upload</title>
    <style>
        /* Styles specific to the upload form */
        .upload-form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            text-align: center;
        }

        .upload-form label {
            display: block;
            margin-bottom: 10px;
            font-size: 16px;
            font-weight: bold;
        }

        .upload-form input {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .upload-form #btn {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .upload-form #btn:hover {
            background-color: #45a049;
        }
        a{
            text-decoration: none; /* Remove underline */
            color: #ffffff;
        }
    </style>
</head>

<body>
    <center>
        <form action="fileupload.php" method="post" enctype="multipart/form-data" class="upload-form">
            <label for="excelFile">Choose Excel File:</label>
            <input type="file" name="excelFile" accept=".xls, .xlsx" required>
            <button id="btn" type="submit" name="upload">Upload</button>

        </form>
        
        <form action="retrieve.php" method="post" enctype="multipart/form-data" class="upload-form">
        <button id="btn" type="submit" name="view">ViewList</button>&nbsp;&nbsp;&nbsp;
        <button id="btn"  name="back"><a href="adminhome.php">Back</a></button>
    </form>
    </center>
</body>

</html>
