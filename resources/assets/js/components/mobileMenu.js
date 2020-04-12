const menuButton = document.querySelector('.menu-button');

// menuButton.addEventListener('click', () => {
// 	let navContent = document.querySelector('.navbar-content');
// 	navContent.classList('visible').toggle;
// });

menuButton.addEventListener('click', () => {
  let navbarContent = document.querySelector('.navbar-content');
  navbarContent.classList.toggle('visible');
  if (navbarContent.style.maxHeight) {
    navbarContent.style.maxHeight = null;
  } else {
    navbarContent.style.maxHeight = navbarContent.scrollHeight + 100 + 'px';
  }
});