<?php ob_start(); ?>
<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_allowed.php"); ?>

<div id="main">
    <div id="page">
		<?php
            
            if (mysqli_connect_errno())
            {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }
            $sql = "select * from total-allowed";
            $result = mysqli_query($connection,$sql);
            $total_allowed = mysqli_fetch_array($result);
//            echo "$total_allowed[0]" ;

        ?>


<?php 
	ob_end_flush();
?>