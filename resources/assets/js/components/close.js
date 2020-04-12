const closeBtn = document.querySelectorAll('.close');

Array.from(closeBtn).forEach(function(element) {

	closeBtn.addEventListener('click', () => {
		console.log('this works');
		let alert = document.querySelectorAll('.alert');
		for (let i = 0; i < alert.length; i++) {
			alert[i].style.display = 'none'; 
		}
	});
});