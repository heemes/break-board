<script>
	var list = document.getElementById("list-items");
	var countout = (list.match(/out/g) || []).length;
	var countin = (list.match(/in/g) || []).length;
	if (($countout - $countin) > 2) { 
		myoutform.style.display = "none";
		console.log("greater than 2");
	} else { 
		myoutform.style.display = "";
		console.log("2 or less");
	}
</script>
