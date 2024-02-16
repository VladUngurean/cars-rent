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
