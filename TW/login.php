<?php
// Initialize the session
session_start();
 

// Include config file
require_once "PHP/config.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
			//$param_password = $password;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){   
					mysqli_stmt_close($stmt);
					$sql = "SELECT id, username, password FROM users WHERE password = ?";
					
					if($stmt = mysqli_prepare($link, $sql)){
					// Bind variables to the prepared statement as parameters
						mysqli_stmt_bind_param($stmt, "s", $param_password);
            
						// Set parameters
						$param_password = $password;
            
						// Attempt to execute the prepared statement
						if(mysqli_stmt_execute($stmt)){
							// Store result
							mysqli_stmt_store_result($stmt);
                
							// Check if username exists, if yes then verify password
							if(mysqli_stmt_num_rows($stmt) == 1){

                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            // Redirect user to welcome page
						header("location: home.php");}
						else{
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
                }

            }
                 else{
                    // Display an error message if username doesn't exist
                    $username_err = "No account found with that username.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="hov_dropdown.css">
	<link rel="stylesheet" href="in.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&family=Sen:wght@400;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <title>Log In</title>
	<link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <!--Stylesheet-->
</head>
<body style="background: linear-gradient(to bottom, rgba(0,0,0,0), #151515), url('Poze/in.jpg'); background-repeat: no-repeat; background-size: cover;">

    <div class="navbar">
        <div class="navbar-container">
            <div class="logo-container">
                <h1 class="logo">TheFilmCabin</h1>
            </div>
            <div class="menu-container">
                <ul class="menu-list">
                    <li class="menu-list-item"><a href="home.php" style="color: white;">Home</a></li>
                    <li class="menu-list-item">All Movies</li>
                </ul>
            </div>
			<div class="dropdown">
                <button class="dropbtn">My account
                <i class="fas fa-caret-down"></i></button>
				<div class="dropdown-content">
					<a href="login.php">Log In</a>
					<a href="register.php">Sign In</a>
				</div>
			</div>
        </div>
    </div>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <h3>Login Here</h3>

        <label for="username">Username</label>
        <input type="text" placeholder="Email or Phone" name="username" value="<?php echo $username; ?>">

        <label for="password">Password</label>
        <input type="password" placeholder="Password" name="password" value="<?php echo $password; ?>">

        <button>Log In</button>
        <div class="social">
			<p style="color:white;">Don't have an account? <a href="register.php">Sign up now</a>.</p>
        </div>
    </form>

</body>
</html>