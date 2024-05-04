
<?php 
 
$conn = mysqli_connect("localhost", "root", "", "onlinevotingsystem");

if (!$conn) {
    die(mysqli_error($conn));
}

// Retrieve data from the database
$sql = "SELECT * FROM citizendata";
$result = $conn->query($sql);
echo "<div class='back-button' style='  padding: 10px;
background: #19B3D3;
float:right;
margin-top: 30px;
margin-right: 40px;
border-radius: 2px;
font-size: 15px;
font-weight: 600;
color: #fff;
transition: 0.5s;'><a href='peopleupload.php'>Back</a></div>";
echo "<html>
        <head>
            <style>
                table {
                    width: 100%;
                    border-collapse: collapse;
                    margin-top: 20px;
                }

                th, td {
                    padding: 10px;
                    text-align: left;
                    border-bottom: 1px solid #ddd;
                }

                th {
                    background-color: #f2f2f2;
                }

                tr:hover {
                    background-color: #f5f5f5;
                }

                caption {
                    font-size: 1.5em;
                    margin-bottom: 10px;
                }

                .no-data {
                    font-style: italic;
                    color: #888;
                    margin-top: 20px;
                }
            </style>
        </head>
        <body>";

if ($result->num_rows > 0) {
    echo "<table>
            <caption>Citizen Data Table</caption>
            <tr>
                <th>NAME</th>
                <th>GENDER</th>
                <th>AGE</th>
                <th>ADHARID</th>
                <th>ELECTIONID</th>
                <th>MOBILE</th>
            </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["name"] . "</td>
                <td>" . $row["gender"] . "</td>
                <td>" . $row["age"] . "</td>
                <td>" . $row["adhar_card"] . "</td>
                <td>" . $row["election_card"] . "</td>
                <td>" . $row["mobile"] . "</td>
              </tr>";
    }

    echo "</table>";
    echo "<div class='back-button' style='  padding: 20px;
    background: #19B3D3;
    float:right;
    margin-top: 30px;
    margin-right: 40px;
    border-radius: 2px;
    font-size: 15px;
    font-weight: 600;
    color: #fff;
    transition: 0.5s;'><a href='peopleupload.php'>Back</a></div>";
} else {
    echo "<div class='no-data'>No data found in the database.</div>";
}

echo "</body></html>";

// Close the database connection
$conn->close();
?>
