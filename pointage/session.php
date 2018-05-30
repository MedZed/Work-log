<?php
	// Including the php connection page script + calling the connect function.
	require_once ("conection/connect.php");
	check_connection();
session_start();// Starting Session
// Storing Session
$username = $_SESSION['username'];

// SQL Query To Fetch Complete Information Of User
$ses_sql=mysqli_query($con,"select username from users_tbl where username='$username'");
$row = mysqli_fetch_assoc($ses_sql);
$login_session =$row['username'];
if(!isset($login_session)){
mysqli_close($con); // Closing Connection
header('Location: index.php'); // Redirecting To Home Page
}
?>