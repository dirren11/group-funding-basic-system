<?php include('server.php')?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
    body {
        font-family: Arial, Helvetica, sans-serif;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        background-image: url("dive.jpeg");
        background-size: cover;
        background-position: center;
    }

    /* Add some overall styling */
    .container {
        max-width: 400px;
        margin: 0 auto;
        padding: 20px;
        background-color: rgba(255, 255, 255, 0.8); /* Add a semi-transparent background to the form */
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    /* Full-width input fields */
    input[type=text], input[type=password] {
        width: 100%;
        padding: 12px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    input[type=text]:focus, input[type=password]:focus {
        outline: none;
        border-color: #04AA6D;
    }

    /* Set a style for all buttons */
    button {
        background-color: #04AA6D;
        color: white;
        padding: 14px 20px;
        margin: 8px 4px; /* Adjusted margin between buttons */
        border: none;
        border-radius: 4px;
        cursor: pointer;
        width: 47%; /* Adjusted button width */
    }

    .signupbtn:hover {
        opacity: 1;
        background-color: #0a8b5c;

    }
    .cancelbtn {
        background-color: #f44336;
    }

    /* Float cancel and signup buttons */
    .cancelbtn, .signupbtn {
        float: left;
    }

    /* Add padding to container elements */
    .container {
        padding: 16px;
    }

    /* Clear floats */
    .clearfix::after {
        content: "";
        clear: both;
        display: table;
    }

    /* Change styles for cancel button and signup button on extra small screens */
    @media screen and (max-width: 300px) {
        .cancelbtn, .signupbtn {
            width: 100%;
        }
    }
</style>
</head>
<body>

<div class="container">
    <h1 style="color:#04AA6D;text-align:center;">Create an account</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>
    <form action="sign_up.php" method="post">
    <label for="username"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="username" required>
    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

    <label for="psw-repeat"><b>Confirm Password</b></label>
    <input type="password" placeholder="Repeat Password" name="psw-repeat" required>

    <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>

    <p>By creating an account you agree to our <a href="#" style="color: dodgerblue;">Terms & Privacy</a>.</p>

    <div class="clearfix">
    <a href="index.php"><button type="button" class="cancelbtn" name="cancel" >Cancel</button></a>
        <button type="submit" class="signupbtn" name="signup">Create Account</button>
    </div>
</form>

    <!-- Add a div to display the success message -->
    <?php if (isset($_POST['signup'])) : ?>
        <div class="success-message">User registered successfully.</div>
    <?php endif; ?>
</div>

</body>
</html>
