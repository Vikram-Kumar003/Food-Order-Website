

<?php 

// start the session 

session_start();





// create constant to store non repeating values 

define('SITEURL', 'http://localhost/food-order/');

define('LOCALHOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD','');
define('DB_NAME', 'food-order');  // yeha se chnage kar skate hai database name username and all 



$conn = mysqli_connect(LOCALHOST, DB_USERNAME,DB_PASSWORD) or die(mysqli_error());  // database connection 
$db_select = mysqli_select_db($conn, 'food-order') or die(mysqli_error());  // selecting database

?>