const navButton = document.querySelector('.navbar-button');

if (navButton) {
	navButton.addEventListener('click', () => {
	  let navContent = document.querySelector('.navbar-content');
	  navContent.classList.toggle('navbar-transition');
	  if (navContent.style.maxHeight) {
	    navContent.style.maxHeight = 0 + 'px';
	  } else {
	    navContent.style.maxHeight = navContent.scrollHeight + 100 + 'px';
	  }
	});
}

