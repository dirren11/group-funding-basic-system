<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet" />
    <title>Table Banking</title>
    <style>
        /* Your existing CSS styles */
        /* Additions for improved styling */

        body {
            background-image: url("dive.jpeg");
            background-size: cover;
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            margin: 0;
            height: 100vh; /* Ensure full viewport height */
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
        .contribution-form input[type="number"],
        .contribution-form input[type="date"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 15px;
        }
        .cancelbtn {
        padding: 10px 10px;
        background-color: #f44336;
        border: none;
        border-radius: 4px;
    }
        
        .downloadbtn {
           background-color: DodgerBlue;
           border: none;
           border-radius: 4px;
           color: white;
           padding: 10px 15px;
           cursor: pointer;
           font-size: 20px;
        }


        .contribution-form input[type="submit"],
        .contribution-form input[type="button"] {
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

        .contribution-form input[type="submit"]:hover,
        .contribution-form input[type="button"]:hover {
            background-color: #0a8b5c;
        }

        .table {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }

        .table h2 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .table table {
            width: 100%;
            border-collapse: collapse;
        }

        .table table th,
        .table table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ccc;
        }

        .table table th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Table Banking System</h1>
        <div class="contribution-form">
            <!-- Contribution Form -->
            <h2>Table Banking Member's Contribution</h2>
            <form action="process_table_banking.php" method="post">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" required>
                <label for="contribution_amount">Contribution Amount:</label>
                <input type="number" name="contribution_amount" id="contribution_amount" required>
                <label for="date_column">Date:</label>
                <input type="date" name="date_column" id="date_column" required>
                <input type="submit" value="Add Contribution">
                <a href="index.php"><button type="button" class="cancelbtn" name="cancel" >Cancel</button></a>
            </form>
            <br>
            <a href="generate_pdf.php" class="downloadbtn">Download PDF</a>
        </div>
        </div>
        <div class="table">
            <h2>Member Contributions</h2>
            <table>
                <tr>
                    <th>Name</th>
                    <th>Contribution Amount</th>
                    <th>Date</th>
                </tr>
                <?php
                // Include the database configuration
                require_once 'db_config.php';

                // Fetch member contributions from the database
                $query = "SELECT * FROM table_banking";
                $result = mysqli_query($conn, $query);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td>" . $row['contribution_amount'] . "</td>";
                        echo "<td>" . $row['date_column'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>No contributions found.</td></tr>";
                }
                ?>
            </table>
        </div>
    </div>
</body>

</html>
