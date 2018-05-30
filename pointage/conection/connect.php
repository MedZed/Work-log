
<?php
 	date_default_timezone_set('Africa/Tunis');
	$con=@mysqli_connect("localhost","root","","pointage_db");
	function check_connection() {
		
		// Check if the connection work
		if (mysqli_connect_errno())
	  	{
	  	echo "Failed to connect to MySQL: " . mysqli_connect_error()."<br><hr>";
	  	} /*else {
				echo 'Connection is good <br><hr>';
	 		}*/
	}

?>
<!-- $mysqli_host = "mysql2.000webhost.com";
$mysqli_database = "a4451455_school1";
$mysqli_user = "a4451455_jazib";
$mysqli_password = "jazib123"; -->