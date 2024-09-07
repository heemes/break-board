<?php
	define("manager_db_host", "localhost");
	define("manager_user", "adminallowed");
	define("manager_pw", "As3lt1n3R0cks");
	define("manager_db", "adminallowed");

  // Adding something, anything
  // 1. Create a database connection
  $connection = mysqli_connect(manager_db_host, manager_user, manager_pw, manager_db);
  // Test if connection succeeded
  if(mysqli_connect_errno()) {
    die("Database connection failed: " . 
         mysqli_connect_error() . 
         " (" . mysqli_connect_errno() . ")"
    );
  }
?>
