<?php
session_start();

$connect = mysqli_connect("localhost", "root", "", "proiect_tw");

error_reporting (E_ALL ^ E_NOTICE);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="hov_dropdown.css">
	<link rel="stylesheet" href="movie_info.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&family=Sen:wght@400;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <title>The Film Cabin</title>
</head>

<body>
    <div class="navbar">
        <div class="navbar-container">
            <div class="logo-container">
                <h1 class="logo">TheFilmCabin</h1>
            </div>
            <div class="menu-container">
                <ul class="menu-list">
                    <li class="menu-list-item"><a href="home.php" style="color: white;">Home</a></li>
                    <li class="menu-list-item active">All Movies</li>
                </ul>
            </div>
			<div class="dropdown">
			<?php
			if(isset($_SESSION["loggedin"]) !== true){
				?>
                <button class="dropbtn">My account
                <i class="fas fa-caret-down"></i></button>
				<div class="dropdown-content">
					<a href="login.php">Log In</a>
					<a href="register.php">Sign In</a>
				</div>
				<?php } else {?>
					<button class="dropbtn">Welcome, <?php echo htmlspecialchars($_SESSION["username"]); ?>! :)
						<i class="fas fa-caret-down"></i>
					</button>
					<div class="dropdown-content">
						<a href="logout.php">Log Out</a>
					</div>
				<?php } ?>
			</div>
        </div>
    </div>
    <div class="sidebar">
        <i class="left-menu-icon fas fa-search"></i>
        <i class="left-menu-icon fas fa-users"></i>
        <i class="left-menu-icon fas fa-bookmark"></i>
        <i class="left-menu-icon fas fa-hourglass-start"></i>
    </div>


	<?php
		function display($id)
		{
		// Connect
		$connect = mysqli_connect("localhost", "root", "", "proiect_tw") OR die(mysql_error());;
		// Formulate Query
		$id = 1;
		$query = sprintf("SELECT name,description,image FROM movies WHERE id='%s'",
            mysqli_real_escape_string($connect,$id));
		
		// Perform Query
		$result = mysqli_query($connect,$query);
		
		if ($result) {
			// Use result
			// Attempting to print $result won't allow access to information in the resource
			// One of the mysql result functions must be used
			// See also mysql_result(), mysql_fetch_array(), mysql_fetch_row(), etc.
			while ($row = mysqli_fetch_assoc($result)) {
		?>
	<!--<div style="display:none;" id="movie_info" class="movie-info">-->
		<div id="movie_info" class="movie-info">
		<div style="display:block;">
			<img class="more-info-photo" src="MySQL/PozeFilme/<?php echo $row["image"]; ?>">
			<p class="more-info-title"><?php echo $row["name"]; ?></p>
			<p class="more-info-desc"><?php echo $row["description"]; ?></p>
		</div>
		<button class="more-info-close" onclick="myFunction()">Hide</button>
	</div>
	<!--<div style="display:none;" id="background_info"></div>-->
		<div id="background_info"></div>
		<?php
			}
		}
		// Free the resources associated with the result set
		// This is done automatically at the end of the script
		mysqli_free_result($result);
		}
	?>
	
    <div class="container">
        <div class="content-container">
			<h1 class="movie-list-title">ALL MOVIES</h1>
            <div class="movie-list-container">
								<?php
					$query = "SELECT * FROM movies ORDER BY id ASC";
					$result = mysqli_query($connect, $query);
					if(mysqli_num_rows($result) > 0)
					{
						while(!is_null($row) || $row = mysqli_fetch_array($result))
						{	
					?>
                <div class="movie-list-wrapper">
                    <div class="movie-list">
						<?php
							$contor_filme_per_rand = 0;
							while($contor_filme_per_rand < 6 && !is_null($row))
							{
						?>
                        <div class="movie-list-item">
                            <img class="movie-list-item-img" src="MySQL/PozeFilme/<?php echo $row["image"]; ?>" alt="">
                            <p class="movie-list-item-desc"><?php echo $row["description"]; ?></p>
							<input type="submit" onclick="myFunction();tryFunction();" class="movie-list-item-button" value="More info" />

							<div class="title"><p><?php echo $row["name"]; ?></p></div>
                        </div>
						<?php
								$row = mysqli_fetch_array($result);
								$contor_filme_per_rand++;
								//if(!is_null($row))
								//{
								//	$contor_filme_per_rand = 0;
								//}
							}
						?>
                    </div>
                </div>
						<?php
						}
					}
			?>
            </div>
        </div>
    </div>
	
	<script src="JavaScript/more_info.js"></script>
</body>

</html>