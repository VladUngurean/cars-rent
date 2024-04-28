const navLinks = document.querySelectorAll('.nav__link');
const windowPathName = window.location.href;
navLinks.forEach(e =>{
  console.log(e.href);
})

console.log(windowPathName);

navLinks.forEach(navElement =>{
  if (navElement.href == windowPathName) {
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
  } else {
    scrollToTopButton.style.opacity = 0;
    scrollToTopButton.style.zIndex = -10;
    // scrollToTopButton.style.position = 'absolute';
    scrollToTopButton.style.pointerEvents = "none";
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


// Load more button
let loadMoreButton = document.getElementById("loadMoreCars");
let currentItems = 6;
loadMoreButton.onclick = () => {
  let boxes = [...document.querySelectorAll(".car-to-rent")];
  for (let i = currentItems; i < currentItems + 3; i++){
    if (boxes[i] == undefined || currentItems >= boxes.length) {
    loadMoreButton.style.pointerEvents = "none";
    break;
    }
    boxes[i].style.display = "inline";
  }

  currentItems +=3;

}