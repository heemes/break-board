<?php
	ob_start();
?>
<?php require_once("../../includes/session.php"); ?>
<?php require_once("../../includes/db_connection_list.php"); ?>
<?php require_once("../../includes/functions.php"); ?>

<?php
global $result;
//ENTER THE RELEVANT INFO BELOW
$mysqlDatabaseName ='breakdb';
$mysqlUserName ='breakerbreaker';
$mysqlPassword ='As3lt1n3R0cks';
$mysqlHostName ='localhost';
$mysqlExportPath ='public_html/breakboard/public/admin/breakarchive.sql';

//DO NOT EDIT BELOW THIS LINE
//Export the database and output the status to the page
$command='mysqldump --opt -h' .$mysqlHostName .' -u' .$mysqlUserName .' -p' .$mysqlPassword .' ' .$mysqlDatabaseName .' > ~/' .$mysqlExportPath;
exec($command,$output=array(),$worked);
switch($worked){
case 0:
echo 'Database <b>' .$mysqlDatabaseName .'</b> successfully exported to <b>~/' .$mysqlExportPath .'</b>';
    $_SESSION["message"] = "Break List Exported.";
    redirect_to("index.php");
break;
case 1:
echo 'There was a warning during the export of <b>' .$mysqlDatabaseName .'</b> to <b>~/' .$mysqlExportPath .'</b>';
    $_SESSION["message"] = "Break List Export Failed.";
    redirect_to("index.php");
break;
case 2:
echo 'There was an error during export. Please check your values:<br/><br/><table><tr><td>MySQL Database Name:</td><td><b>' .$mysqlDatabaseName .'</b></td></tr><tr><td>MySQL User Name:</td><td><b>' .$mysqlUserName .'</b></td></tr><tr><td>MySQL Password:</td><td><b>NOTSHOWN</b></td></tr><tr><td>MySQL Host Name:</td><td><b>' .$mysqlHostName .'</b></td></tr></table>';
    $_SESSION["message"] = "Break List Export Failed.";
    redirect_to("index.php");
break;
  
}
?>
<?php 
	ob_end_flush();
?>