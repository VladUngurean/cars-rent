/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function dropDownMain() {
  document.getElementById("myDropdown").classList.toggle("show");
}

function dropDownSec() {
  document.getElementById("mySecondDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it

document
  .getElementById("secondDropdownBtn")
  .addEventListener("click", function (event) {
    event.stopPropagation();
    console.log("event");
  });

window.addEventListener("click", function (event) {
  if (!event.target.matches(".dropbtn", ".dropbtnSecond")) {
    let dropdowns = document.querySelectorAll(
      ".dropdown-content,.dropdown-content-rent"
    );
    console.log(dropdowns.length);
    for (i = 0; i < dropdowns.length; i++) {
      let openDropdown = dropdowns[i];
      console.log(openDropdown);
      if (openDropdown.classList.contains("show")) {
        openDropdown.classList.remove("show");
      }
    }
  }
});
