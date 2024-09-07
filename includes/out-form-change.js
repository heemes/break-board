	function AffectOutForm() {
		if ($delta >= $totalAllowed) {
			echo '<script>
				var thisForm = document.getElementById("myoutform");
				thisForm.style.display = "form.myoutform.hide";
			}

		;} else {
			echo '<script>			
				function showOutForm() {
					var thisForm = document.getElementById("myoutform");
					thisForm.style.display = "form.myoutform.show";
				}
			</script>'
		;}