<?php
// Include config file
require_once "PHP/config.php";
 
// Define variables and initialize with empty values
$username = $password = $confirm_password ="";
$username_err = $password_err = $confirm_password_err ="";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }

    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (username, password) VALUES (?,?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
            
            // Set parameters
            $param_username = $username;
            $param_password = $password;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: login.php");
				
				
            } else{
                echo "Something went wrong. Please try again later.";
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
    <title>Sign in</title>
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

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" style="height: 750px;">
        <h3>Register Here</h3>

        <label for="username">Username</label>
        <input type="text" placeholder="Email or Phone" name="username" value="<?php echo $username; ?>">
<!--		
		<label for="firstname">First Name</label>
        <input type="text" placeholder="Email or Phone" id="firstname">
		
		<label for="lastname">Last Name</label>
        <input type="text" placeholder="Email or Phone" id="lastname">
	
		<label for="birthday">Birthday</label>
		<input type="date" required="required">
-->
        <label for="password">Password</label>
        <input type="password" placeholder="Password" name="password" value="<?php echo $password; ?>">

		<label for="password">Confirm Password</label>
        <input type="password" placeholder="Password" name="confirm_password" value="<?php echo $confirm_password; ?>">

        <button>Sign In</button>
		
        <div class="social">
			<p style="color:white;">Already have an account? <a href="login.php">Log in here</a>.</p>
        </div>
    </form>

</body>
</html>