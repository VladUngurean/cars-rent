const carsInfoFromPHP = carData; //GET DATA FROM DATABASE
console.log(carsInfoFromPHP);

let carSelectDropDown = document.getElementById("renderCarMakeSelect");

const carsFromFilter = filteredDataForSelect(carsInfoFromPHP);

function filteredDataForSelect(inputArray) {
  const uniqueMakes = {};

  // Iterate over each element in the input array
  inputArray.forEach((element) => {
    const { make, model } = element;

    // Check if make already exists in the uniqueMakes object
    if (!uniqueMakes[make]) {
      // If it doesn't exist, create a new entry with an array for models
      uniqueMakes[make] = {
        make,
        models: [],
      };
      // Add the current model to the models array
      uniqueMakes[make].models.push(model);
    } else {
      // If it exists, add the current model to the models array only if it's not already present
      if (!uniqueMakes[make].models.includes(model)) {
        uniqueMakes[make].models.push(model);
      }
    }
  });

  // Convert the object values back to an array
  const resultArray = Object.values(uniqueMakes);

  return resultArray;
}

// Variable to store the currently active element
let activeDropdown = null;
carsFromFilter.forEach((car) => {
  let makeToString = [`${car.make}`];

  makeToString.forEach((make) => {
    const renderCarForSelect = `
      <li class="">
        <div class="dropdown__content-second__select-options">
          <label class="" for="1">
            <input class="" type="checkbox" id="" name="" value="">
            <span id="dropDown${make}Models">${make}
              <a href="">&gt;</a>
            </span>
          </label>
        </div>
        <ul id="renderModels${make}" class="ulForCarModels"></ul>
      </li>
    `;
    carSelectDropDown.insertAdjacentHTML("beforeend", renderCarForSelect);

    let dropDownForCarModel = document.getElementById(
      `dropDown${car.make}Models`
    );
    let renderHereBabe = document.getElementById(`renderModels${car.make}`);

    car.models.forEach((model) => {
      const renderCarForSelect2 = `
        <li class="">
          <div>
            <label class="" for="1">
              <input class="" type="checkbox" id="" name="" value="">
              <span>${model}</span>
            </label>
          </div>
        </li>
      `;
      renderHereBabe.insertAdjacentHTML("beforeend", renderCarForSelect2);
    });

    // Event listener for the make dropdown
    dropDownForCarModel.addEventListener("click", function () {
      // Close the active dropdown if there is one
      if (activeDropdown && activeDropdown !== renderHereBabe) {
        activeDropdown.classList.remove("show");
      }

      // Toggle the current dropdown
      renderHereBabe.classList.toggle("show");

      // Update the active dropdown
      activeDropdown = renderHereBabe;
    });
  });
});
