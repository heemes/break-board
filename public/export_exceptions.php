<?php
	ob_start();
?>
<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection_list.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php confirm_logged_in(); ?>

<?php
global $result;
//ENTER THE RELEVANT INFO BELOW
$mysqlDatabaseName ='kashay-exception-list';
$mysqlUserName ='kashay-user';
$mysqlPassword ='Fr3d3r1ck';
$mysqlHostName ='localhost';
$mysqlExportPath ='exceptionlistarchive.sql';

//DO NOT EDIT BELOW THIS LINE
//Export the database and output the status to the page
$command='mysqldump --opt -h' .$mysqlHostName .' -u' .$mysqlUserName .' -p' .$mysqlPassword .' ' .$mysqlDatabaseName .' > ~/' .$mysqlExportPath;
exec($command,$output=array(),$worked);
switch($worked){
case 0:
echo 'Database <b>' .$mysqlDatabaseName .'</b> successfully exported to <b>~/' .$mysqlExportPath .'</b>';
    $_SESSION["message"] = "Exceptions exported.";
    redirect_to("manage_content.php");
break;
case 1:
echo 'There was a warning during the export of <b>' .$mysqlDatabaseName .'</b> to <b>~/' .$mysqlExportPath .'</b>';
    $_SESSION["message"] = "Exception exports failed.";
    redirect_to("manage_content.php");
break;
case 2:
echo 'There was an error during export. Please check your values:<br/><br/><table><tr><td>MySQL Database Name:</td><td><b>' .$mysqlDatabaseName .'</b></td></tr><tr><td>MySQL User Name:</td><td><b>' .$mysqlUserName .'</b></td></tr><tr><td>MySQL Password:</td><td><b>NOTSHOWN</b></td></tr><tr><td>MySQL Host Name:</td><td><b>' .$mysqlHostName .'</b></td></tr></table>';
    $_SESSION["message"] = "Exception exports failed.";
    redirect_to("manage_content.php");
break;
  
}
?>
<?php 
	ob_end_flush();
?>