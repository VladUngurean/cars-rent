function setHeightOnResize(sourceSelector, targetSelector) {
  const sourceElement = document.getElementById(sourceSelector);
  const targetElement = document.getElementById(targetSelector);
  
  function setHeight() {
      if (window.innerWidth >= 922 && sourceElement && targetElement) {
          const height = sourceElement.offsetHeight;
          targetElement.style.height = height-50 + 'px';
      } else if (targetElement) {
          // Reset the height if window width is below 1200px
          targetElement.style.height = 'auto';
      }
  }
  
  // Set height on page load and window resize
  window.addEventListener('load', setHeight);
  window.addEventListener('resize', setHeight);
}

// Usage:
setHeightOnResize('bannerVideo', 'headerArea');


let checkOpacity = document.getElementById("carMakesForSelect");


const observer = new MutationObserver((mutations) => { 
    mutations.forEach((mutation) => {
        const { target } = mutation;

        if (mutation.attributeName === 'class') {
            const currentState = mutation.target.classList.contains('show');
            if (checkOpacity !== currentState) {
                checkOpacity = currentState;
                // mutation.target.style.display="none"
                if (currentState) {
                    setTimeout(() => {
                        mutation.target.style.opacity=1
                    }, 200);
                        mutation.target.style.display="block"

                } else{
                    mutation.target.style.opacity=0
                    setTimeout(() => {
                        mutation.target.style.display="none"
                      }, 1000);
                }
            }
        }
    });
});

observer.observe(checkOpacity, {
    attributes : true,
    attributeFilter : ['style', 'class']
   });