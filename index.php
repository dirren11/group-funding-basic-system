<!DOCTYPE html>

<html lang="en">

  <head>

    <meta charset="UTF-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link

      href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap"

      rel="stylesheet"

    />
    <title>Home</title>
    <!-- CSS only -->
    <style>
        *{
margin: 0px;

padding: 0px;

box-sizing: border-box;

}

.body-text {

display: flex;

font-family: "Montserrat", sans-serif;

align-items: center;

justify-content: center;

margin-top: 250px;

}
.hero{
	height: 100vh;
	width: 100%;
	background-image: url(dive.jpeg);
	background-size: cover;
	background-position: center;
}

nav {

display: flex;

justify-content: space-around;

align-items: center;

min-height: 8vh;


font-family: "Montserrat", sans-serif;

}

.heading {

color: white;

text-transform: uppercase;

letter-spacing: 5px;

font-size: 20px;

}

.nav-links {

display: flex;

justify-content: space-around;

width: 30%;

}

.nav-links li {

list-style: none;

}

.nav-links a {

color: white;

text-decoration: none;

letter-spacing: 3px;

font-weight: bold;

font-size: 14px;

padding: 14px 16px;

}

.nav-links a:hover:not(.active) {

background-color: #0a8b5c;

}

.nav-links li a.active {

background-color: #04AA6D;

}
button {
  cursor: pointer;
  border: 0;
  border-radius: 4px;
  font-weight: 600;
  margin: 0 10px;
  width: 200px;
  padding: 10px 0;
  box-shadow: 0 0 20px rgba(104, 85, 224, 0.2);
  transition: 0.4s;
}
.log {
  color: rgb(104, 85, 224);
  background-color: rgba(255, 255, 255, 1);
  border: 1px solid rgba(104, 85, 224, 1);
}

button:hover {
  color: white;
  box-shadow: 0 0 20px rgba(104, 85, 224, 0.6);
  background-color: #04AA6D;
}
.hamburger {
            display: none;
            flex-direction: column;
            cursor: pointer;
        }

        .hamburger div {
            width: 25px;
            height: 3px;
            background-color: white;
            margin: 4px;
            transition: all 0.3s ease;
        }

        /* Show/Hide Navigation Links when Checkbox is Checked */
        .checkbox-toggle {
            display: none;
        }

        .checkbox-toggle:checked ~ .nav-links {
            display: flex;
        }

        /* Responsive Styles */
        @media only screen and (max-width: 768px) {
            .nav-links {
                width: 60%;
            }

            .body-text h1 {
                font-size: 32px;
            }

            .hamburger {
                display: flex;
            }

            .nav-links {
                display: none;
            }
        }

        @media only screen and (max-width: 480px) {
            .nav-links {
                width: 100%;
            }

            .body-text h1 {
                font-size: 24px;
            }
        }
    </style>
</head>

<body>
    <div class="hero">
        <nav>
            <div class="heading">
                <h4>Group Funding System</h4>
            </div>
            <label class="hamburger" for="toggle">&#9776;</label>
            <input type="checkbox" class="checkbox-toggle" id="toggle" />
            <ul class="nav-links">
 
        <li><a class="active" href="index.html">Home</a></li>

        <li><a href="login.php">Login</a></li>


        <li><a href="contributions.php">Contributions</a></li>
        
        <li><a href="deductions.php">Deductions</a></li>

        <li><a href="penalties.php">Penalties</a></li>


        <li><a href="table_banking.php">Banking</a></li>




      </ul>

    </nav>

    
    <div class="body-text">
    <h1 style="color: white">Welcome to the Group Funding System!</h1>
    <a href="sign_up.php">
        <button class="sign-up-btn">Create account to get started</button>
    </a>
</div>






  </body>

</html>