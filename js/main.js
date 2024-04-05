const navLinks = document.querySelectorAll('.nav__link');
const windowPathName = window.location.pathname;

navLinks.forEach(navElement =>{
  if (navElement.href.includes(windowPathName)) {
    navElement.classList.add("nav__link-active");
  }
})



function togglePassrwordVisability(inputId, passwordShowIcon, passwordHideIcon) {
    let passInput = document.getElementById(`${inputId}`);
    let passShowIcon = document.getElementById(`${passwordShowIcon}`);
    let passHideIcon = document.getElementById(`${passwordHideIcon}`);
    if (passInput.type === "password") {
        passHideIcon.style.display = "flex"
        passShowIcon.style.display = "none"
        passInput.type = "text";
    } else {
        passHideIcon.style.display = "none"
        passShowIcon.style.display = "flex"
        passInput.type = "password";
    }
  } 


// Get the button element
let scrollToTopButton = document.querySelector('.scroll-to-top');
let scrollToTop = document.querySelector('.forScrollToTop');

// Function to show or hide the button based on scroll position
function toggleScrollToTopButton(entries) {
  const [entry] = entries;
  if (entry.isIntersecting) {
    scrollToTopButton.style.opacity = 1;
    scrollToTopButton.style.zIndex = 10;
    scrollToTopButton.style.position = 'fixed';
    
    scrollToTopButton.style.pointerEvents = "all";
    console.log('hi');
  } else {
    scrollToTopButton.style.opacity = 0;
    scrollToTopButton.style.zIndex = -10;
    // scrollToTopButton.style.position = 'absolute';
    scrollToTopButton.style.pointerEvents = "none";
    console.log('bie');
  }
}

// Create an IntersectionObserver
const observer = new IntersectionObserver(toggleScrollToTopButton, {
  threshold: 0,
});

// Observe the target element
if (scrollToTop) {
  observer.observe(scrollToTop);
}
