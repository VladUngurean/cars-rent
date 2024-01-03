//when click on menu button it toggles 'show' and check if second dropdown is actvie then it close it
function navDropDownMain() {
  document.getElementById("dropdownMain").classList.toggle("show");
  let secondDropdown = document.getElementById("dropdownSecond");
  if (secondDropdown.classList.contains("show")) {
    secondDropdown.classList.remove("show");
  }
}

//when click on nested menu button it toggles 'show'
function navDropDownSecond() {
  document.getElementById("dropdownSecond").classList.toggle("show");
}
// stop event propagation on nested menu button so it does not trigger main one
document
  .getElementById("secondDropdownBtn")
  .addEventListener("click", function (event) {
    event.stopPropagation();
  });

// Close the dropdown if the user clicks outside of it
window.addEventListener("click", function (event) {
  if (!event.target.matches(".dropbtnMain", ".dropbtnSecond")) {
    let dropdowns = document.querySelectorAll("#dropdownMain,#dropdownSecond");
    for (i = 0; i < dropdowns.length; i++) {
      let openDropdown = dropdowns[i];
      if (openDropdown.classList.contains("show")) {
        openDropdown.classList.remove("show");
      }
    }
  }
});
