<?php
	ob_start();
?>
<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection_list.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/validation_functions.php"); ?>
<?php confirm_logged_in(); ?>

<?php find_selected_exception(); ?>

<?php
  // Unlike new_page.php, we don't need a subject_id to be sent
  // We already have it stored in exceptions.sup_id.
  if (!$current_exception) {
    // exception ID was missing or invalid or 
    // exception couldn't be found in database
    redirect_to("manage_content.php");
  }
?>

<?php
if (isset($_POST['submit'])) {
  // Process the form
  
  $id = $current_exception["id"];
  $myemail = mysql_prep($_POST["myemail"]);
  $exceptiondate = mysql_prep($_POST["exceptiondate"]);
  $exceptionstart = mysql_prep($_POST["exceptionstart"]);
  $exceptionend = mysql_prep($_POST["exceptionend"]);
  $exceptioncause = mysql_prep($_POST["exceptioncause"]);

  // validations
  $required_fields = array("myemail", "exceptiondate", "exceptionstart", "exceptionend", "exceptioncause");
  validate_presences($required_fields);
  
  $fields_with_max_lengths = array("exceptioncause" => 50);
  validate_max_lengths($fields_with_max_lengths);
  
  if (empty($errors)) {
    
    // Perform Update

    $query  = "UPDATE exceptions SET ";
    $query .= "myemail = '{$myemail}', ";
    $query .= "exceptiondate = '{$exceptiondate}', ";
    $query .= "exceptionstart = '{$exceptionstart}', ";
    $query .= "exceptionend = '{$exceptionend}', ";
    $query .= "exceptioncause = '{$exceptioncause}' ";
    $query .= "WHERE id = {$id} ";
    $query .= "LIMIT 1";
    $result = mysqli_query($connection, $query);

    if ($result && mysqli_affected_rows($connection) == 1) {
      // Success
      $_SESSION["message"] = "Exception updated.";
      redirect_to("manage_content.php?exception={$id}");
    } else {
      // Failure
      $_SESSION["message"] = "Exception update failed.";
    }
  
  }
} else {
  // This is probably a GET request
  
} // end: if (isset($_POST['submit']))

?>

<?php $layout_context = "admin"; ?>
<?php include_once("../includes/layouts/header.php"); ?>

<div id="main">
  <div id="navigation">
    <?php echo navigation($current_sup, $current_exception); ?>
  </div>
  <div id="page">
    <?php echo message(); ?>
    <?php echo form_errors($errors); ?>
    
    <h2>Edit Exception: <?php echo htmlentities($current_exception["id"]); ?></h2>
    <form action="edit_page.php?id=<?php echo urlencode($current_exception["id"]); ?>" method="post">
      <p>Email:
        <input type="text" name="myemail" value="<?php echo htmlentities($current_exception["myemail"]); ?>" />
      </p>
      <p>Exception Date:
        <select name="exceptiondate">
        <?php
          $page_set = find_exception_for_subject($current_exception["exceptiondate"], false);
          $page_count = mysqli_num_rows($page_set);
          for($count=1; $count <= $page_count; $count++) {
            echo "<option value=\"{$count}\"";
            if ($current_page["position"] == $count) {
              echo " selected";
            }
            echo ">{$count}</option>";
          }
        ?>
        </select>
      </p>
      <p>Visible:
        <input type="radio" name="visible" value="0" <?php if ($current_page["visible"] == 0) { echo "checked"; } ?> /> No
        &nbsp;
        <input type="radio" name="visible" value="1" <?php if ($current_page["visible"] == 1) { echo "checked"; } ?>/> Yes
      </p>
      <p>Content:<br />
        <textarea name="content" rows="20" cols="80"><?php echo htmlentities($current_page["content"]); ?></textarea>
      </p>
      <input type="submit" name="submit" value="Edit Page" />
    </form>
    <br />
    <a href="manage_content.php?page=<?php echo urlencode($current_page["id"]); ?>">Cancel</a>
    &nbsp;
    &nbsp;
    <a href="delete_page.php?page=<?php echo urlencode($current_page["id"]); ?>" onclick="return confirm('Are you sure?');">Delete page</a>
    
  </div>
</div>

<?php 
	include("../includes/layouts/footer.php");
	ob_end_flush();
?>
