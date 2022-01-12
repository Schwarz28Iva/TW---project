function myFunction() {
  var x = document.getElementById("movie_info");
  var y = document.getElementById("background_info");
  if (x.style.display === "none") {
    x.style.display = "flex";
	y.style.display = "flex";
	
  } else {
    x.style.display = "none";
	y.style.display = "none";
  }
}
