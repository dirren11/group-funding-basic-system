
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet" />
    <title>Contributions</title>
    <!-- CSS only -->
    <style>

        
        body {
            background-image: url("dive.jpeg");
            background-size: cover;
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            margin: 0;
            height: 100vh; 
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .hero {
            width: 100%;
            max-width: 800px;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin: 20px;
        }

        .contribution-form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin-bottom: 20px; 
        }

        .contribution-form h2 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .contribution-form label {
            display: block;
            font-size: 14px;
            margin-bottom: 5px;
        }

        .contribution-form input[type="text"],
        .contribution-form input[type="number"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 15px;
        }

        .contribution-form input[type="submit"] {
            width: 100%;
            background-color: #04AA6D;
            color: #fff;
            border: none;
            border-radius: 4px;
            padding: 10px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .contribution-form input[type="submit"]:hover {
            background-color: #0a8b5c;
        }
        .cancelbtn {
        padding: 10px 10px;
        background-color: #f44336;
        border: none;
        border-radius: 4px;
    }

        .contribution-history {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }

        .contribution-history h2 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .contribution-history table {
            width: 100%;
            border-collapse: collapse;
        }

        .contribution-history table th,
        .contribution-history table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ccc;
        }

        .contribution-history table th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <div class="hero">
        <div class="body-text">
            <div class="contribution-form">
                <!-- Contribution Form -->
                <h2>Make a Contribution</h2>
                <form action="process_contribution.php" method="post">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name">
                    <label for="amount">Amount:</label>
                    <input type="number" name="amount" id="amount" required>
                    <input type="submit" value="Contribute">
                </form>
                <a href="index.php"><button type="button" class="cancelbtn" name="cancel" >Cancel</button></a>
            </div>
        </div>
        <div class="contribution-history">
            <!-- Display Contribution History -->
            <h2>Contribution History</h2>
            <table>
                <tr>
                    <th>Date</th>
                    <th>Name</th>
                    <th>Amount</th>
                </tr>
                <!-- PHP code to retrieve and display contribution history will be added here -->
                <?php
                // PHP code to retrieve and display contribution history
                require_once 'db_config.php'; // Include the database configuration file

                // Query to fetch contribution history from the database
                $query = "SELECT name, date, amount FROM contributions ORDER BY date DESC";

                // Execute the query
                $result = $conn->query($query);

                // Check if there are any contributions
                if ($result->num_rows > 0) {
                    // Loop through the results and display each contribution as a table row
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['date'] . "</td>";
                        echo "<td>". $row['name'] . "</td>";
                        echo "<td>Ksh " . $row['amount'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='2'>No contributions yet.</td></tr>";
                }

                // Close the database connection
                $conn->close();
                ?>
            </table>
            
        </div>
    </div>
</body>

</html>
