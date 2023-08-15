<?php include('server.php')?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
    body {
        margin: 0px;
        padding: 0px;
        box-sizing: border-box;
        font-family: Arial, Helvetica, sans-serif;
    }


    .hero {
        height: 100vh;
        width: 100%;
        background-image: url(dive.jpeg);
        background-size: cover;
        background-position: center;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: rgba(255, 255, 255, 0.8);
    }

    form {
        border: 3px solid #f1f1f1;
        background-color: rgba(255, 255, 255, 0.8); /* Add a background color to the form */
        max-width: 400px; /* Limit the form width */
        margin: 0 auto; /* Center the form horizontally */
        padding: 20px;
    }

    input[type=text], input[type=password] {
        width: 100%;
        padding: 12px;
        margin: 8px 0;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    button {
        background-color: #04AA6D;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
    }
    .clearfix::after {
        content: "";
        clear: both;
        display: table;
    }

    button:hover {
        opacity: 0.8;
    }

    .cancelbtn {
        padding: 10px 18px;
        background-color: #f44336;
    }

    .imgcontainer {
        text-align: center;
        margin: 24px 0 12px 0;
    }

    img.avatar {
        width: 100px; /* Adjust the avatar size */
        border-radius: 50%;
    }

    .container {
        padding: 16px;
        background-color: rgba(255, 255, 255, 0.8);
    }

    span.psw {
        float: right;
        padding-top: 16px;
    }
    input[type="submit"] {
        background-color: #04AA6D;
        color: white;
        padding: 14px 20px;
        margin: 8px 4px; /* Adjusted margin between buttons */
        border: none;
        border-radius: 4px;
        cursor: pointer;
        width: 47%; /* Adjusted button width */
}

    /* Change styles for span and cancel button on extra small screens */
    @media screen and (max-width: 300px) {
        span.psw {
            display: block;
            float: none;
        }
        .cancelbtn {
            width: 100%;
        }
    }
    @media screen and (max-width: 300px) {
        .cancelbtn, .loginbtn {
            width: 100%;
        }
    }
</style>
</head>
<body>
    <div class="hero">
        <form action="login.php" method="post">
            <div class="imgcontainer">
                <img src="avatar.jpeg" alt="Avatar" class="avatar">
            </div>

            <div class="container">
                <h1 style="color:#04AA6D;text-align:center;">Login</h1>
                <label for="username"><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="username" required>

                <label for="password"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="password" required>

                <div class="clearfix">
                    <button type="submit" class="loginbtn" name="login">Login</button>
                    <a href="index.php"><button type="button" class="cancelbtn" name="cancel" >Cancel</button></a>
                </div>

                <input type="checkbox" checked="checked" name="remember"> Remember me
            </div>

            <span class="psw">Forgot <a href="#">password?</a></span>
        </form>
    </div>


    <script>
        function redirectToHome() {
            window.location.href = 'index.php';
        }
    </script>
</body>
</html>