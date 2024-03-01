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
    var scrollToTopButton = document.querySelector('.scroll-to-top');

    // Function to show or hide the button based on scroll position
    function toggleScrollToTopButton() {
      if (window.scrollY > 600) {
        // scrollToTopButton.style.display = 'block';
        scrollToTopButton.style.opacity = 1;
        scrollToTopButton.style.zIndex = 10;
        scrollToTopButton.style.pointerEvents = "all";
        
      } else {
        // scrollToTopButton.style.display = 'none';
        scrollToTopButton.style.opacity = 0;
        scrollToTopButton.style.zIndex = -10;
        scrollToTopButton.style.pointerEvents = "none";

      }
    }
  
    // Add event listener for scroll event
    window.addEventListener('scroll', toggleScrollToTopButton);