

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Voting System</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            background: linear-gradient(to right, #3498db, #8e44ad);
            color: #fff;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        .container {
            background: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            max-width: 800px;
            width: 100%;
        }

        h1 {
            margin-bottom: 30px;
            color: #333;
        }

        .service-container {
            background: #ecf0f1;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }

        .service-container:hover {
            transform: scale(1.05);
        }

        .service-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
            color: #333;
        }

        .service-description {
            font-size: 18px;
            line-height: 1.6;
            margin-bottom: 20px;
            color: #555;
        }

        .service-image {
            max-width: 100%;
            border-radius: 8px;
            margin-bottom: 15px;
        }

        .btn {
            background-color: #2ecc71;
            color: #fff;
            padding: 10px 20px;
            font-size: 16px;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
            cursor: pointer;
            display: inline-block;
        }

        .btn:hover {
            background-color: #27ae60;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Welcome to our Online Voting System</h1>

        <div class="service-container">
            <img src="../uploads/image11.jpg" alt="Secure Voting" class="service-image">
            <div class="service-title">1. Secure and Encrypted Voting Process</div>
            <div class="service-description">
                The Online Voting System ensures a secure and encrypted voting process to maintain the confidentiality and integrity of the votes cast.
                Advanced encryption techniques are employed to protect voter information and prevent tampering with the election results.
            </div>
        </div>

        <div class="service-container">
            <img src="../uploads/image2.png" alt="User-Friendly Interface" class="service-image">
            <div class="service-title">2. User-Friendly Interface for Voters</div>
            <div class="service-description">
                The system offers a user-friendly interface for voters, making it easy for them to cast their votes. Clear instructions, intuitive design,
                and accessibility features are implemented to ensure that voters, regardless of their technical proficiency, can participate seamlessly.
            </div>
        </div>

        <div class="service-container">
            <img src="../uploads/image1.jpg" alt="Real-Time Result Tracking" class="service-image">
            <div class="service-title">3. Real-Time Result Tracking</div>
            <div class="service-description">
                Real-time result tracking is a key feature of the Online Voting System. It allows stakeholders, including voters, candidates, and administrators,
                to monitor election results as they unfold. This transparency enhances the credibility of the electoral process.
            </div>
        </div>

        <div class="service-container">
            <img src="../uploads/image3.jpg" alt="Customizable Configurations" class="service-image">
            <div class="service-title">4. Customizable Election Configurations</div>
            <div class="service-description">
                Administrators have the flexibility to customize various aspects of the election, such as the number of candidates, voting periods, and specific rules.
                This adaptability ensures that the system can accommodate different types of elections, from local community polls to national elections.
            </div>
        </div>

        <div class="service-container">
            <img src="../uploads/image4.jpg" alt="Multi-Level Authentication" class="service-image">
            <div class="service-title">5. Multi-Level Authentication for Administrators</div>
            <div class="service-description">
                To prevent unauthorized access and ensure the integrity of the system, multi-level authentication is implemented for administrators. This typically
                involves secure login credentials and additional verification methods to access sensitive administrative functionalities.
            </div>
        </div>

        <a href="login.php" class="btn">Get Started</a>
        <a href="home.php" class="btn">Back</a>
    </div>
</body>

</html>
