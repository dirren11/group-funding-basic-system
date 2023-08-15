<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet" />
    <title>Penalties</title>
    <!-- CSS only -->
    <style>
        /* Your existing CSS styles */
        /* Additions for improved styling */

        /* Set the background image */
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

        .container {
            width: 100%;
            max-width: 800px;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin: 20px;
        }

        .penalty-form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin-bottom: 20px; /* Add margin at the bottom */
        }

        .penalty-form h2 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .penalty-form label {
            display: block;
            font-size: 14px;
            margin-bottom: 5px;
        }

        .penalty-form input[type="number"],
        .penalty-form input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 15px;
        }

        .penalty-form input[type="submit"] {
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

        .penalty-form input[type="submit"]:hover {
            background-color: #0a8b5c;
        }
        .cancelbtn {
        padding: 10px 10px;
        background-color: #f44336;
        border: none;
        border-radius: 4px;
    }

        .penalty-history {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }

        .penalty-history h2 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .penalty-history table {
            width: 100%;
            border-collapse: collapse;
        }

        .penalty-history table th,
        .penalty-history table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ccc;
        }

        .penalty-history table th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="penalty-form">
            <!-- Penalty Form -->
            <h2>Apply Penalty</h2>
            <form action="process_penalties.php" method="post">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" required>
                <label for="amount">Penalty Amount:</label>
                <input type="number" name="amount" id="amount" required>
                <label for="reason">Reason:</label>
                <input type="text" name="reason" id="reason" required>
                <input type="submit" value="Apply Penalty">
            </form>
            <a href="index.php"><button type="button" class="cancelbtn" name="cancel" >Cancel</button></a>
        </div>
        <div class="penalty-history">
            <!-- Display Penalty History -->
            <h2>Penalty History</h2>
            <table>
                <tr>
                    <th>Date</th>
                    <th>Name</th>
                    <th>Amount</th>
                    <th>Reason</th>
                </tr>
                <?php
            
                // Database connection credentials
                $db_host = "localhost";
                $db_user = "root";
                $db_pass = "";
                $db_name = "chama";

                // Establish a database connection
                $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

                // Check if the connection was successful
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                
                $sql = "SELECT * FROM penalties ORDER BY date_added DESC"; 
                $result = mysqli_query($conn, $sql);

                // Check if there are any penalties records
                if (mysqli_num_rows($result) > 0) {
                    // Loop through the penalties records and display them in the table
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row["date_added"] . "</td>";
                        echo "<td>" . $row["name"] . "</td>";
                        echo "<td>Ksh " . $row["amount"] . "</td>";
                        echo "<td>" . $row["reason"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>No penalties records found.</td></tr>";
                }

                // Close the database connection
                mysqli_close($conn);
                ?>
                
        
            </table>
        </div>
    </div>
</body>

</html>
