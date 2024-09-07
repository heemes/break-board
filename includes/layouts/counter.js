function counter() {
	var list = document.getElementById('list-items');
	var countout = list.match(/out/g) || [].length;
	var countin = list.match(/in/g) || [].length;
	if (($countout - $countin) > 2) { 
		myoutform.style.display = 'hidden';
		console.log('3');
	} else { 
		myoutform.style.display = 'block';
		console.log('2');
	}
}