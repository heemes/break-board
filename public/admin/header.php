<?php 
	if (!isset($layout_context)) {
		$layout_context = "public";
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">

<html>
	<head>
		<title>THS Admin - Break Board<?php if ($layout_context == "admin") { echo "Admin"; } ?></title>
	<?php

	echo '<link href="../../../breakboard/public/stylesheets/public.css" media="all" rel="stylesheet" type="text/css" />';
	
	?>

</head>
<body>
    <div id="header">
	      <h1>THS Admin - Break Board<?php if ($layout_context == "admin") { echo "Admin"; } ?></h1>
    </div>
