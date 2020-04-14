const menuButton = document.querySelector('.menu-button');

menuButton.addEventListener('click', () => {
	let navbarContent = document.querySelector('.nav-collapse');

	navbarContent.classList.toggle("dropdown-style");

	if (navbarContent.style.maxHeight) {
  		navbarContent.style.maxHeight = null;
  	} else {
    	navbarContent.style.maxHeight = navbarContent.scrollHeight + 5 + 'px';
	}
});