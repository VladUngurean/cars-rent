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


// let checkOpacity = document.getElementById("carMakesForSelect");
// let checkOpacityForAll = document.querySelectorAll(".forObserver");


// const observer = new MutationObserver((mutations) => { 
//     mutations.forEach((mutation) => {
//         const { target } = mutation;

//         if (mutation.attributeName === 'class') {
//             const currentState = mutation.target.classList.contains('show');
//             if (checkOpacityForAll !== currentState) {
//                 checkOpacityForAll = currentState;
//                 if (currentState) {
//                         mutation.target.style.opacity=1
//                 } else{
//                     mutation.target.style.opacity=0
//                 }
//             }
//         }
//     });
// });

// checkOpacityForAll.forEach(e =>{
//     observer.observe(e, {
//         attributes : true,
//         attributeFilter : ['style', 'class']
//     });
// })

// const targetElement = document.querySelector(".forObserver");

// const observer = new MutationObserver((mutations) => { 
//     mutations.forEach((mutation) => {
//         const { target } = mutation;

//         if (mutation.attributeName === 'class') {
//             const currentState = mutation.target.classList.contains('show');
//             if (targetElement !== currentState) {
//                 targetElement = currentState;
//                 if (currentState) {
//                     mutation.target.style.opacity = 1;
//                 } else {
//                     mutation.target.style.opacity = 0;
//                 }
//             }
//         }
//     });
// });

// observer.observe(targetElement, {
//     attributes: true,
//     attributeFilter: ['style', 'class']
// });