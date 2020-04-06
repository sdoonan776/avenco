const navContent = document.querySelector('.navbar-content');
const navButton = document.querySelector('.navbar-toggler');
let isMenuVisible = false;

if (navButton) {
	navButton.addEventListener('click', () => {
		// isMenuVisible = !isMenuVisible;
		// navContent.style.max-height = isMenuVisible ? '100px' : '0px';
	});
}



