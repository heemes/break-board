<?php

	session_start();
	
	function agentsOff() {
	    if (isset($_SESSION["row"], $_SESSION["totalAllowed"])) {
	        if ($row = $totalAllowed) {
	              document.getElementById('myform').style.display == "none"; 
	        }
	    }
	}
	
	function message() {
		if (isset($_SESSION["message"])) {
			$output = "<div class=\"message\">";
			$output .= htmlentities($_SESSION["message"]);
			$output .= "</div>";
			
			// clear message after use
			$_SESSION["message"] = null;
			
			return $output;
		}
	}

	function errors() {
		if (isset($_SESSION["errors"])) {
			$errors = $_SESSION["errors"];
			
			// clear message after use
			$_SESSION["errors"] = null;
			
			return $errors;
		}
	}
	
?>