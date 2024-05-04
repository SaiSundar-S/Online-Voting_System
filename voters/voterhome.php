<?php include("voterdashboard.php");
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">z

<head>
  <meta charset="utf-8">

  <style media="screen">
    body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
            color: #333;
            margin: 0;
            padding: 0;
            display: block;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .upcoming-election-form {
            background-color: #fff;
            margin: 30px 30px 30px 300px; /* Adjust the margin as needed */
             padding: 30px;
             background: #fff;
              border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            width: 100%;
        }

        h2 {
            color: #3498db;
        }
       

        p {
            line-height: 1.6;
            margin-bottom: 15px;
        }

        footer {
            background-color: #3498db;
            color: #fff;
            padding: 10px;
            text-align: center;
            border-bottom-left-radius: 8px;
            border-bottom-right-radius: 8px;
        }

        footer p {
            margin: 0;
        }
         
         marquee {
            color: #fff; /* Text color */
            background: linear-gradient(135deg, #4caf50, #2196f3); /* Background color */
            padding: 10px; /* Padding around the text */
            font-size: 16px; /* Font size */
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

</head>

<body>
<div class="upcoming-election-form">
  <center> <h1> Voter</h1>
 <h3> 

 <marquee behavior="scroll" direction="left" scrollamount="10" width=100%>
 Panel is Recommended for only Voter and Suggested to follow the Following terms:
    </marquee></h3>
</center>
<section>
        <h2>Voter Eligibility Criteria:</h2>
        <ol>
            <li><h2>Age:</h2> Voters must be at least 18 years old.</li>
            <li><h2>Citizenship:</h2> Only citizens of the country are eligible to vote.</li>
            <li><h2>Residency:</h2> Voters must be residents of the electoral district or constituency.</li>
            <li><h2>Registration:</h2> Voters need to register with electoral authorities.</li>
            <li><h2>Criminal Record:</h2> Individuals with certain criminal convictions may be disqualified.</li>
            <li><h2>Mental Competency:</h2> Voters should be mentally competent and able to make informed decisions.</li>
            <li><h2>Not Disqualified:</h2> Individuals holding certain public offices may be disqualified.</li>
            <li><h2>Not Multiple Voting:</h2> Voters are not allowed to vote more than once in the same election.</li>
            <li><h2>Not a Convicted Election Offender:</h2> Individuals convicted of election-related offenses may be disqualified.</li>
        </ol>
    </section>
    <footer>
        <p>It's important to note that these criteria can vary widely. Refer to the specific laws, regulations, and electoral rules of the relevant jurisdiction to understand the exact eligibility requirements for candidates in a particular election.</p>
    </footer>
    </div>
</body>

</html>
