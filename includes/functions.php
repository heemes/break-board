<?php

	function mysql_prep($string) {
		global $connection;
		
		$escaped_string = mysqli_real_escape_string($connection, $string);
		return $escaped_string;
	}
	
	function confirm_query($result_set) {
		if (!$result_set) {
			die("Database query failed.");
		}
	}

	function form_errors($errors=array()) {
		$output = "";
		if (!empty($errors)) {
		  $output .= "<div class=\"error\">";
		  $output .= "Please fix the following errors:";
		  $output .= "<ul>";
		  foreach ($errors as $key => $error) {
		    $output .= "<li>";
				$output .= htmlentities($error);
				$output .= "</li>";
		  }
		  $output .= "</ul>";
		  $output .= "</div>";
		}
		return $output;
	}
	
	function find_all_exceptions($public=true) {
		global $connection;
		
		$query  = "SELECT * ";
		$query .= "FROM breakdb ";
		$query .= "ORDER BY id";
		$exception_set = mysqli_query($connection, $query);
		confirm_query($break_set);
		return $break_set;
	}
	
	function find_all_admins() {
		global $connection;
		
		$query  = "SELECT * ";
		$query .= "FROM admins ";
		$query .= "ORDER BY username ASC";
		$admin_set = mysqli_query($connection, $query);
		confirm_query($admin_set);
		return $admin_set;
	}
	
	function find_sup_by_id($sup_id, $public=true) {
		global $connection;
		
		$safe_sup_id = mysqli_real_escape_string($connection, $sup_id);
		
		$query  = "SELECT * ";
		$query .= "FROM sups ";
		$query .= "WHERE id = {$safe_sup_id} ";
		if ($public) {
			$query .= "AND visible = 1 ";
		}
		$query .= "LIMIT 1";
		$sup_set = mysqli_query($connection, $query);
		confirm_query($subject_set);
		if($sup = mysqli_fetch_assoc($sup_set)) {
			return $sup;
		} else {
			return null;
		}
	}

	function find_default_page_for_sup($sup_id) {
		$exception_set = find_exception_for_sup($sup_id);
		if($first_exception = mysqli_fetch_assoc($exception_set)) {
			return $first_exception;
		} else {
			return null;
		}
	}
	
	function find_selected_exception($public=false) {
		global $current_exception;
		
		if (isset($_GET["exception"])) {
			$current_exception = find_exception_by_id($_GET["exception"], $public);
		} else {
			$current_sup = null;
			$current_exception = null;
		}
	}

	// navigation takes 2 arguments
	// - the current sup array or null
	// - the current exception array or null
	function navigation($sup_array, $exception_array) {
		$output = "<ul class=\"sups\">";
		$sup_set = find_all_sups(false);
		while($sup = mysqli_fetch_assoc($sup_set)) {
			$output .= "<li";
			if ($sup_array && $sup["id"] == $sup_array["id"]) {
				$output .= " class=\"selected\"";
			}
			$output .= ">";
			$output .= "<a href=\"manage_content.php?subject=";
			$output .= urlencode($sup["id"]);
			$output .= "\">";
			$output .= htmlentities($sup["menu_name"]);
			$output .= "</a>";
			
			$exception_set = find_exception_for_sup($sup["id"], false);
			$output .= "<ul class=\"pages\">";
			while($exception = mysqli_fetch_assoc($exception_set)) {
				$output .= "<li";
				if ($exception_array && $exception["id"] == $exception_array["id"]) {
					$output .= " class=\"selected\"";
				}
				$output .= ">";
				$output .= "<a href=\"manage_content.php?exception=";
				$output .= urlencode($exception["id"]);
				$output .= "\">";
				$output .= htmlentities($exception["menu_name"]);
				$output .= "</a></li>";
			}
			mysqli_free_result($exception_set);
			$output .= "</ul></li>";
		}
		mysqli_free_result($sup_set);
		$output .= "</ul>";
		return $output;
	}

	function public_navigation($sup_array, $exception_array) {
		$output = "<ul class=\"sups\">";
		$sup_set = find_all_sups();
		while($sup = mysqli_fetch_assoc($sup_set)) {
			$output .= "<li";
			if ($sup_array && $sup["id"] == $sup_array["id"]) {
				$output .= " class=\"selected\"";
			}
			$output .= ">";
			$output .= "<a href=\"index.php?sup=";
			$output .= urlencode($sup["id"]);
			$output .= "\">";
			$output .= htmlentities($sup["menu_name"]);
			$output .= "</a>";
			
			if ($sup_array["id"] == $sup["id"] || 
					$exception_array["sup_id"] == $sup["id"]) {
				$exception_set = find_exception_for_sup($sup["id"]);
				$output .= "<ul class=\"pages\">";
				while($exception = mysqli_fetch_assoc($exception_set)) {
					$output .= "<li";
					if ($exception_array && $exception["id"] == $exception_array["id"]) {
						$output .= " class=\"selected\"";
					}
					$output .= ">";
					$output .= "<a href=\"index.php?exception=";
					$output .= urlencode($exception["id"]);
					$output .= "\">";
					$output .= htmlentities($exception["menu_name"]);
					$output .= "</a></li>";
				}
				$output .= "</ul>";
				mysqli_free_result($page_set);
			}

			$output .= "</li>"; // end of the subject li
		}
		mysqli_free_result($subject_set);
		$output .= "</ul>";
		return $output;
	}

	function password_encrypt($password) {
  	$hash_format = "$2y$10$";   // Tells PHP to use Blowfish with a "cost" of 10
	  $salt_length = 22; 					// Blowfish salts should be 22-characters or more
	  $salt = generate_salt($salt_length);
	  $format_and_salt = $hash_format . $salt;
	  $hash = crypt($password, $format_and_salt);
		return $hash;
	}
	
	function generate_salt($length) {
	  // Not 100% unique, not 100% random, but good enough for a salt
	  // MD5 returns 32 characters
	  $unique_random_string = md5(uniqid(mt_rand(), true));
	  
		// Valid characters for a salt are [a-zA-Z0-9./]
	  $base64_string = base64_encode($unique_random_string);
	  
		// But not '+' which is valid in base64 encoding
	  $modified_base64_string = str_replace('+', '.', $base64_string);
	  
		// Truncate string to the correct length
	  $salt = substr($modified_base64_string, 0, $length);
	  
		return $salt;
	}
	
	function password_check($password, $existing_hash) {
		// existing hash contains format and salt at start
	  $hash = crypt($password, $existing_hash);
	  if ($hash === $existing_hash) {
	    return true;
	  } else {
	    return false;
	  }
	}

	function attempt_login($username, $password) {
		$admin = find_admin_by_username($username);
		if ($admin) {
			// found admin, now check password
			if (password_check($password, $admin["hashed_password"])) {
				// password matches
				return $admin;
			} else {
				// password does not match
				return false;
			}
		} else {
			// admin not found
			return false;
		}
	}

	function logged_in() {
		return isset($_SESSION['admin_id']);
	}
	
	function confirm_logged_in() {
		if (!logged_in()) {
			redirect_to("login.php");
		}
	}

	function redirect_to($new_location) {
	  header("Location: " . $new_location);
	  exit;
	}

?>