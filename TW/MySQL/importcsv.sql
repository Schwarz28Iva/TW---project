LOAD DATA INFILE 'G:/xampp/htdocs/TW/MySQL/movies.csv'
INTO TABLE movies
FIELDS TERMINATED BY ',' ENCLOSED BY '"'
LINES TERMINATED BY '\n'
IGNORE 1 ROWS
(id,name,description,image)