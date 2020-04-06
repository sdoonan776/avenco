closeBtn = document.querySelector('.close');
alert = document.querySelectorAll('.alert');

if (closeBtn) {
	if (alert) {	
		closeBtn.addEventListener('click', () => {
			for (let i = 0; i < alert.length; i++) {
				alert[i].style.display = 'none'; 
			}
		});
	}
}