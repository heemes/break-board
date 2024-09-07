<?php ob_start(); ?>
<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection_list.php"); ?>
<?php require_once("../includes/db_allowed.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php include_once("../includes/layouts/header.php"); ?>

<div id="main">
    <div id="page">
		<?php
            
            if (mysqli_connect_errno())
            {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }
            $sql = "select count('1') from breaktracker";
            $result = mysqli_query($connection,$sql);
            $row = mysqli_fetch_array($result);
            echo "There are <b>$row[0]</b> THS agents on break or lunch right now." ;

        ?>
        
        <br /><br />
        <hr length="75%" />
        <br /><br />
        
        <form method="post" action="process_manage.php">
        <label for="agentsallowed">How many agents should be allowed to take lunch or break at this time?</label>

        <br /><br />

        <select name="agentsallowed" id="agentsallowed">
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
          <option value="6">6</option>
        </select>
        
        <br /><br />
        
        <button type="submit" name="action" value="Submit">Change</button>
        
        </form>
        
        <br /><br /><br />

    </div>
</div>

<?php 
	include("../includes/layouts/footer.php");
	ob_end_flush();
?>