<?php include("admindashboard.php");


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
  <center> <h1> Admin</h1>
 <h3> 

 <marquee behavior="scroll" direction="left" scrollamount="10" width=100%>
 Panel is Recommended for only Admin and Suggested to follow the Following terms:
    </marquee></h3>
</center>
    <section>
        <h2>1. Age:</h2>
        <p>Candidates must be of a certain age to run for office. For example, they may need to be at least 18 or 21 years old.</p>

        <h2>2. Citizenship:</h2>
        <p>Candidates typically need to be citizens of the country where the election is taking place. Some elections may have additional requirements for how long a candidate must have been a citizen.</p>

        <h2>3. Residency:</h2>
        <p>Candidates often need to be residents of the specific electoral district or constituency they seek to represent. The duration of residency may vary.</p>

        <h2>4. Educational Qualifications:</h2>
        <p>Certain positions may require candidates to have a minimum level of education, specific degrees, or professional qualifications.</p>

        <h2>5. Criminal Record:</h2>
        <p>Some jurisdictions may have restrictions on candidates with certain criminal convictions. In some cases, candidates may be disqualified if they have been convicted of certain offenses.</p>

        <h2>6. Financial Deposits:</h2>
        <p>Candidates may be required to pay a financial deposit as a part of the nomination process. This deposit is sometimes refundable and serves to discourage frivolous or insincere candidates.</p>

        <h2>7. Political Affiliation:</h2>
        <p>Some elections, particularly those with party-based systems, may require candidates to be affiliated with a specific political party or meet certain party membership criteria.</p>

        <h2>8. Nomination by Supporters:</h2>
        <p>In some systems, candidates may need to gather a specified number of signatures or endorsements from eligible voters to qualify for candidacy.</p>

        <h2>9. Ethical and Conduct Standards:</h2>
        <p>Candidates may be required to adhere to ethical standards and conduct rules during the election campaign. Violations may result in disqualification.</p>

        <h2>10. Financial Disclosure:</h2>
        <p>Candidates may need to disclose their financial assets, income, and liabilities to ensure transparency and prevent conflicts of interest.</p>

        <h2>11. Gender Equality:</h2>
        <p>Some jurisdictions may have measures to ensure gender equality among candidates, encouraging a balanced representation of men and women.</p>

        <h2>12. Language Proficiency:</h2>
        <p>In regions with multiple official languages, candidates may be required to demonstrate proficiency in a designated language.</p>

        <h2>13. Party Endorsement (if applicable):</h2>
        <p>Candidates running as part of a political party may need the official endorsement of that party to be eligible.</p>

        <h2>14. Undischarged Bankruptcy:</h2>
        <p>Some jurisdictions may disqualify individuals who are undischarged bankrupts from running for certain positions.</p>

        <h2>15. Non-Discrimination:</h2>
        <p>Eligibility criteria should not discriminate based on race, religion, gender, ethnicity, or other protected characteristics.</p>
    </section>

    <footer>
        <p>It's important to note that these criteria can vary widely. Refer to the specific laws, regulations, and electoral rules of the relevant jurisdiction to understand the exact eligibility requirements for candidates in a particular election.</p>
    </footer>
    </div>
</body>

</html>
