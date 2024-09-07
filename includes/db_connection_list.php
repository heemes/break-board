<?php
	define("DB_SERVER", "localhost");
	define("DB_USER", "breakerbreaker");
	define("DB_PASS", "As3lt1n3R0cks");
	define("DB_NAME", "breakdb");

  // Adding something, anything
  // 1. Create a database connection
  $agentconnection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
  // Test if connection succeeded
  if(mysqli_connect_errno()) {
    die("Database connection failed: " . 
         mysqli_connect_error() . 
         " (" . mysqli_connect_errno() . ")"
    );
  }
?>
