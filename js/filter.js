document.addEventListener("DOMContentLoaded", function () {
  const carsInfoFromPHP = carData; //GET DATA FROM DATABASE
  console.log(carsInfoFromPHP);

  let carSelectDropDown = document.getElementById("renderCarMakeSelect");

  const carsFromFilter = filteredDataForSelect(carsInfoFromPHP);
  console.log(carsFromFilter);
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

  let activeDropdownStatus = null;
  carsFromFilter.forEach((car) => {
    let makeToString = [`${car.make}`];

    makeToString.forEach((make) => {
      const renderCarForSelect = `
      <li class="">
        <div class="dropdown__content-second__select-options">
          <label class="" for="1">
            <input id="selectMake${make}" class="" type="checkbox" name="" value="">
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
          <div class="">
            <label class="" for="1">
              <input id="select${model}" class="model-checkbox" type="checkbox" id="" name="" value="">
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
        if (activeDropdownStatus && activeDropdownStatus !== renderHereBabe) {
          activeDropdownStatus.classList.remove("show");
        }

        // Toggle the current dropdown
        renderHereBabe.classList.toggle("show");

        // Update the active dropdown
        activeDropdownStatus = renderHereBabe;
      });

      // Event listener for the make checkbox
      let makeCheckbox = document.getElementById(`selectMake${make}`);
      makeCheckbox.addEventListener("change", function () {
        // If the make checkbox is checked, check all model checkboxes
        let modelCheckboxes =
          renderHereBabe.querySelectorAll(".model-checkbox");
        modelCheckboxes.forEach((modelCheckbox) => {
          modelCheckbox.checked = makeCheckbox.checked;
        });
      });

      // Event listener for the model checkboxes
      let modelCheckboxes = renderHereBabe.querySelectorAll(".model-checkbox");
      modelCheckboxes.forEach((modelCheckbox) => {
        modelCheckbox.addEventListener("change", function () {
          // If at least one model checkbox is checked, check the make checkbox
          makeCheckbox.checked = Array.from(modelCheckboxes).some(
            (checkbox) => checkbox.checked
          );
        });
      });
    });
  });
});
// to test
let testCeEMaiJos;

document.addEventListener("DOMContentLoaded", function () {
  // Access the PHP data in JavaScript
  const dataFromPHP = carData;
  //   console.log(dataFromPHP);

  // Process the data and dynamically create HTML elements
  const carsContainer = document.querySelector("#car-list-render");

  dataFromPHP.forEach((car) => {
    const productHTML = `<div class="car-list__box">
                            <img src="${car.carImage}" alt="carImage">
                            <h4 >${car.make} - ${car.model}</h4>
                            <div class="car-list__box-details">

                                <div class="car-list__box-details__price">De la <span>${car.rentDaysPrice46} €</span>/Zi</div>

                                <div class="car-list__box-details-tech">
                                    <div class="car-list__box-details-tech__item">
                                        <img src="/images/icons/calendarIcon.png" alt="time">
                                        <div> An: ${car.registrationYear}</div>
                                    </div>

                                    <div class="car-list__box-details-tech__item">
                                        <img src="/images/icons/gear.png" alt="transmission">
                                        <div>${car.transmissionType}</div>
                                    </div>

                                    <div class="car-list__box-details-tech__item">
                                        <img src="/images/icons/fuel.png" alt="fuelType">
                                        <div> ${car.engineFuel}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="car-list__box-link">
                                <a href="#" >Inchiriaza</a>
                            </div>
					    </div>`;
    carsContainer.insertAdjacentHTML("beforeend", productHTML);
  });
});
