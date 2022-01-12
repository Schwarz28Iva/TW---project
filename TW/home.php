<?php
session_start();
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
                    <li class="menu-list-item active">Home</li>
                    <li class="menu-list-item"><a href="movies.php" style="color: white;">All Movies</a></li>
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
	
	<div style="display:none;" id="movie_info" class="movie-info">
		<div style="display:block;">
		<img class="more-info-photo" src="Poze/1.jpeg">
		<p class="more-info-title">Her</p>
		<p class="more-info-desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. At
                                hic fugit similique accusantium.</p>
		</div>
		<button class="more-info-close" onclick="myFunction()">Hide</button>
	</div>
	<div style="display:none;" id="background_info"></div>

    <div class="container">
        <div class="content-container">
            <div class="featured-content"
                style="background: linear-gradient(to bottom, rgba(0,0,0,0), #151515), url('Poze/home.jpg'); background-repeat: no-repeat; background-size: cover;">
                <p class="featured-desc">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iusto illo dolor
                    deserunt nam assumenda ipsa eligendi dolore, ipsum id fugiat quo enim impedit, laboriosam omnis
                    minima voluptatibus incidunt. Accusamus, provident.</p>
            </div>
            <div class="movie-list-container">
                <h1 class="movie-list-title">NEW RELEASES</h1>
                <div class="movie-list-wrapper">
                    <div class="movie-list">
                        <div class="movie-list-item">
                            <img class="movie-list-item-img" src="Poze/1.jpeg" alt="">
                            <p class="movie-list-item-desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. At
                                hic fugit similique accusantium.</p>

                            <button onclick="myFunction()" class="movie-list-item-button">More info</button>
							<div class="title"><p>Her</p></div>
                        </div>
                        <div class="movie-list-item">
                            <img class="movie-list-item-img" src="Poze/2.jpeg" alt="">
                            <p class="movie-list-item-desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. At
                                hic fugit similique accusantium.</p>
                            <button class="movie-list-item-button">More info</button>
							<div class="title"><p>Star Wars</p></div>
                        </div>
                        <div class="movie-list-item">
                            <img class="movie-list-item-img" src="Poze/3.jpg" alt="">
                            <p class="movie-list-item-desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. At
                                hic fugit similique accusantium.</p>
                            <button class="movie-list-item-button">More info</button>
							<div class="title"><p>Storm</p></div>
                        </div>
                        <div class="movie-list-item">
                            <img class="movie-list-item-img" src="Poze/4.jpg" alt="">
                            <p class="movie-list-item-desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. At
                                hic fugit similique accusantium.</p>
                            <button class="movie-list-item-button">More info</button>
							<div class="title"><p>1917</p></div>
                        </div>
                        <div class="movie-list-item">
                            <img class="movie-list-item-img" src="Poze/5.jpg" alt="">
                            <p class="movie-list-item-desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. At
                                hic fugit similique accusantium.</p>
                            <button class="movie-list-item-button">More info</button>
							<div class="title"><p>Avengers</p></div>
                        </div>
                        <div class="movie-list-item">
                            <img class="movie-list-item-img" src="Poze/6.jpg" alt="">
                            <p class="movie-list-item-desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. At
                                hic fugit similique accusantium.</p>
                            <button class="movie-list-item-button">More info</button>
							<div class="title"><p>Rampage</p></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="movie-list-container">
                <h1 class="movie-list-title">POPULAR</h1>
                <div class="movie-list-wrapper">
                    <div class="movie-list">
                        <div class="movie-list-item">
                            <img class="movie-list-item-img" src="Poze/8.jpg" alt="">
                            <p class="movie-list-item-desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. At
                                hic fugit similique accusantium.</p>
                            <button class="movie-list-item-button">More info</button>
							<div class="title"><p>Movie title</p></div>
                        </div>
                        <div class="movie-list-item">
                            <img class="movie-list-item-img" src="Poze/9.jpg" alt="">
                            <p class="movie-list-item-desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. At
                                hic fugit similique accusantium.</p>
                            <button class="movie-list-item-button">More info</button>
							<div class="title"><p>Movie title</p></div>
                        </div>
                        <div class="movie-list-item">
                            <img class="movie-list-item-img" src="Poze/10.jpg" alt="">
                            <p class="movie-list-item-desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. At
                                hic fugit similique accusantium.</p>
                            <button class="movie-list-item-button">More info</button>
							<div class="title"><p>Movie title</p></div>
                        </div>
                        <div class="movie-list-item">
                            <img class="movie-list-item-img" src="Poze/11.jpg" alt="">
                            <p class="movie-list-item-desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. At
                                hic fugit similique accusantium.</p>
                            <button class="movie-list-item-button">More info</button>
							<div class="title"><p>Movie title</p></div>
                        </div>
                        <div class="movie-list-item">
                            <img class="movie-list-item-img" src="Poze/12.jpg" alt="">
                            <p class="movie-list-item-desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. At
                                hic fugit similique accusantium.</p>
                            <button class="movie-list-item-button">More info</button>
							<div class="title"><p>Movie title</p></div>
                        </div>
                                                <div class="movie-list-item">
                            <img class="movie-list-item-img" src="Poze/7.jpg" alt="">
                            <p class="movie-list-item-desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. At
                                hic fugit similique accusantium.</p>
                            <button class="movie-list-item-button">More info</button>
							<div class="title"><p>Movie title</p></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="movie-list-container">
                <div class="movie-list-wrapper">
                    <div class="movie-list">
                        <div class="movie-list-item">
                            <img class="movie-list-item-img" src="Poze/1.jpeg" alt="">
                            <p class="movie-list-item-desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. At
                                hic fugit similique accusantium.</p>
                            <button class="movie-list-item-button">More info</button>
							<div class="title"><p>Movie title</p></div>
                        </div>
                        <div class="movie-list-item">
                            <img class="movie-list-item-img" src="Poze/2.jpeg" alt="">
                            <p class="movie-list-item-desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. At
                                hic fugit similique accusantium.</p>
                            <button class="movie-list-item-button">More info</button>
							<div class="title"><p>Movie title</p></div>
                        </div>
                        <div class="movie-list-item">
                            <img class="movie-list-item-img" src="Poze/15.jpg" alt="">
                            <p class="movie-list-item-desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. At
                                hic fugit similique accusantium.</p>
                            <button class="movie-list-item-button">More info</button>
							<div class="title"><p>Movie title</p></div>
                        </div>
                        <div class="movie-list-item">
                            <img class="movie-list-item-img" src="Poze/3.jpg" alt="">
                            <p class="movie-list-item-desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. At
                                hic fugit similique accusantium.</p>
                            <button class="movie-list-item-button">More info</button>
							<div class="title"><p>Movie title</p></div>
                        </div>
                        <div class="movie-list-item">
                            <img class="movie-list-item-img" src="Poze/4.jpg" alt="">
                            <p class="movie-list-item-desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. At
                                hic fugit similique accusantium.</p>
                            <button class="movie-list-item-button">More info</button>
							<div class="title"><p>Movie title</p></div>
                        </div>
                        <div class="movie-list-item">
                            <img class="movie-list-item-img" src="Poze/5.jpg" alt="">
                            <p class="movie-list-item-desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. At
                                hic fugit similique accusantium.</p>
                            <button class="movie-list-item-button">More info</button>
							<div class="title"><p>Movie title</p></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	
	
	<script src="JavaScript/more_info.js"></script>
</body>

</html>