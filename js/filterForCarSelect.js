let carsInfoFromPHP = carData;
console.log(carsInfoFromPHP);
if (carsInfoFromPHP === "") {
let ifNoCarsSelect = document.getElementById("carFilterSelectors");
let ifNoCarsRenderContainer = document.getElementById("carRenderContainer");
ifNoCarsSelect.innerHTML = "";
ifNoCarsRenderContainer.innerHTML = "";
} else {

// To prevent more than one dropdown opened at the time

let activeMain = null;
let activeSecond = null;

//HTML for make and model
function HTMLforMakeModelSelect() {
  return `
        <span id="dropDownMakes"> 
          <p>Marca</p> 
          <img src="/images/aditionalElements/arrow.svg" alt="arrow">
        </span>
      <ul id="carMakesForSelect" class="ul-for-hide-selectoptions forObserver ulForCarMakes"></ul>
  `;
}
function HTMLmakeSelectOptions(make) {
  return `
    <div class="${make} select-option-make">
      <div class="select-option-container">
        <input id="selectMake${make}" class="make-checkbox" type="checkbox" name="" value="">
        <span id="dropDown${make}Models"> 
          <p>${make}</p> 
          <img src="/images/aditionalElements/arrow.svg" alt="arrow"> 
        </span>
      </div>

      <ul id="renderModels${make}" class="ul-for-hide-selectoptions forObserver ulForCarModels" style="margin-top: 0;"></ul>
    </div>
  `;
}
function HTMLmodelSelectOptions(model) {
  return `
    <div class="select-option">
      <div class="select-option-container">
        <input id="select${model}" class="model-checkbox" type="checkbox" name="" value="">
        <label for="select${model}">${model}</label>
      </div>
    </div>
  `;
}
//HTML for transmission
function HTMLforTransmissionSelect() {
  return `
    <span id="selectTransmissionType"> <p>Cutie de viteze</p> <img src="/images/aditionalElements/arrow.svg" alt="arrow"> </span>
    <ul id="transmissionTypeList" class="ul-for-hide-selectoptions forObserver ulForTransmissions"></ul>
  `;
}
function HTMLtransmissionSelectOptions(transmissionType) {
  return `
    <div class="select-option">
      <input id="select${transmissionType}" class="transmissionType-checkbox" type="checkbox" name="" value="">
      <label for="select${transmissionType}">${transmissionType}</label>
    </div>
  `;
}

//HTML for do today-------------------------------------------------------------------------------------

//HTML for fuel type-------------------------------------------------------------------------------------
function HTMLforFuelTypeSelect() {
  return `
    <span id="selectFuelType"> <p>Tip combustibil</p><img src="/images/aditionalElements/arrow.svg" alt="arrow"> </span>
    <ul id="fuelTypeList" class="ul-for-hide-selectoptions forObserver ulForFuelTypes"></ul>
  `;
}
function HTMLFuelTypeSelectOptions(fuelType) {
  return `
    <div class="select-option">
      <input id="select${fuelType}" class="fuelType-checkbox" type="checkbox" name="" value="">
      <label for="select${fuelType}">${fuelType}</label>
    </div>
  `;
}
//HTML for body type-------------------------------------------------------------------------------------
function HTMLforBodyTypeSelect() {
  return `
    <span id="selectBodyType"> <p>Tip caroserie</p> <img src="/images/aditionalElements/arrow.svg" alt="arrow"> </span>
    <ul id="BodyTypeList" class="ul-for-hide-selectoptions forObserver ulForBodyTypes"></ul>
  `;
}
function HTMLBodyTypeSelectOptions(bodyType) {
  return `
      <div class="select-option">
        <input id="select${bodyType}" class="bodyType-checkbox" type="checkbox" name="" value="">
        <label for="select${bodyType}">${bodyType}</label>
      </div>
    `;
}
//HTML for rent status-------------------------------------------------------------------------------------
function HTMLforRentStatusSelect() {
  return `
    <span id="selectRentStatus"> <p>Statut Arenda 24h</p> <img src="/images/aditionalElements/arrow.svg" alt="arrow"> </span>
    <ul id="rentStatusList" class="ul-for-hide-selectoptions forObserver ulForRentStatus"></ul>
  `;
}
function HTMLRentStatusSelectOptions(rentStatus) {
  return `
      <div class="select-option">
        <input id="select${rentStatus}" class="rentStatus-checkbox" type="checkbox" name="" value="">
        <label for="select${rentStatus}">${rentStatus}</label>
      </div>
    `;
}
//HTML for do today end-------------------------------------------------------------------------------------

// Filter make and models to show for select options !!!!NEED TO MAKE REUSABLE
function filterNestedDataForSelectOptions(inputArray) {
  const uniqueMakes = {};

  inputArray.forEach(({ make, model }) => {
    if (!uniqueMakes[make]) {
      uniqueMakes[make] = {
        make,
        models: new Set(),
      };
    }
    uniqueMakes[make].models.add(model);
  });

  return Object.values(uniqueMakes);
}
//Reusble function
//Render select options
function renderSelectOptions(addressToRender, functionToRender) {
  let addressToRenderHTML = document.getElementById(`${addressToRender}`);
  const renderToSelectHTML = functionToRender();
  addressToRenderHTML.insertAdjacentHTML("beforeend", renderToSelectHTML);
}
//Filter for car details, make them usable in this code(REUSABLE FUNC)
function filterForSelectOptions(inputArray, carDetail) {
  const uniqueValues = {};

  inputArray.forEach((car) => {
    if (!uniqueValues[car[carDetail]]) {
      uniqueValues[car[carDetail]] = {
        [carDetail]: car[carDetail],
        [`${carDetail}s`]: new Set(),
      };
    }
    uniqueValues[car[carDetail]][`${carDetail}s`].add(car[carDetail]);
  });

  // Return the result if needed
  return Object.values(uniqueValues);
}

// Applies filter on data from the database
function applyFiltersAndRenderForSelectOption(
  filteredData,
  container,
  infoAboutCar,
  HTMLreturnMainFunction
) {
  filteredData.forEach((car) => {
    renderSelectOptionsForSelect(
      car[infoAboutCar],
      container,
      HTMLreturnMainFunction
    );
  });
}
function HTMLreturnMainFunction(type) {
  return `<option value="${type}">${type}</option>`;
}
// Applies filter on data from the database END

// CHECK ACTIVE STATUS

function toggleShowSelectOptions(container, activeStatus) {
  if (activeStatus === activeMain) {
    if (activeMain === container) {
      container.classList.toggle("show");
    } else {
      // Hide all activeMain elements
      if (activeMain) {
        activeMain.classList.remove("show");
      }
      // Hide all activeSecond elements
      if (activeSecond) {
        activeSecond.classList.remove("show");
      }
      // Show the current container
      container.classList.add("show");
      activeMain = container;
    }
  } else if (activeStatus === activeSecond) {
    if (activeSecond === container) {
      container.classList.toggle("show");
    } else {
      // Hide all activeSecond elements
      if (activeSecond) {
        activeSecond.classList.remove("show");
      }

      // Show the current container
      container.classList.add("show");
      activeSecond = container;
    }
  }
}
// CHECK ACTIVE STATUS END
//Reusble function END-------------------------------------------------------

// ALL FUNCTION CALLS--------------------------------------------------------------------
//ALL THAT RENDER SOMETHING FOR SELECT
renderSelectOptions("renderCarMakeSelect", HTMLforMakeModelSelect);
renderSelectOptions("renderCarTransmissionSelect", HTMLforTransmissionSelect);
renderSelectOptions("renderCarFuelTypeSelect", HTMLforFuelTypeSelect);
renderSelectOptions("renderCarBodyTypeSelect", HTMLforBodyTypeSelect);
renderSelectOptions("renderCarRentStatusSelect", HTMLforRentStatusSelect);
//ALL THAT RENDER SOMETHING FOR SELECT END

//aplly filter for transmission
const forRenderTransmission = document.getElementById("transmissionTypeList");
const filteredTransmission = filterForSelectOptions(
  carsInfoFromPHP,
  "transmissionType"
);
applyFiltersAndRenderForSelectOption(
  filteredTransmission,
  forRenderTransmission,
  "transmissionTypes",
  HTMLtransmissionSelectOptions
);
//aplly filter for fuel type
const forRenderFuelType = document.getElementById("fuelTypeList");
const filteredFuelType = filterForSelectOptions(
  carsInfoFromPHP,
  "engineFuel"
);
applyFiltersAndRenderForSelectOption(
  filteredFuelType,
  forRenderFuelType,
  "engineFuels",
  HTMLFuelTypeSelectOptions
);
//aplly filter for body type
const forRenderBodyType = document.getElementById("BodyTypeList");
const filteredBodyType = filterForSelectOptions(carsInfoFromPHP, "bodyType");
applyFiltersAndRenderForSelectOption(
  filteredBodyType,
  forRenderBodyType,
  "bodyTypes",
  HTMLBodyTypeSelectOptions
);
//aplly filter for body type
const forRenderRentStatus = document.getElementById("rentStatusList");
const filteredRentStatus = filterForSelectOptions(
  carsInfoFromPHP,
  "rentStatus"
);
applyFiltersAndRenderForSelectOption(
  filteredRentStatus,
  forRenderRentStatus,
  "rentStatuss",
  HTMLRentStatusSelectOptions
);
// ALL FUNCTION CALLS END-----------------------------------------------------------------

//ALL FUNCTIONS FOR RENDER SOMETHING FOR SELECT
function renderCarForSelect(car) {
  const carMakesForSelectDropdown =
    document.getElementById("carMakesForSelect");

  const make = car.make;
  const renderCarForSelectHTML = HTMLmakeSelectOptions(make);
  carMakesForSelectDropdown.insertAdjacentHTML(
    "beforeend",
    renderCarForSelectHTML
  );

  const dropDownForCarModel = document.getElementById(
    `dropDown${make}Models`
  );
  const forRenderModels = document.getElementById(`renderModels${make}`);

  renderCarModelsForSelect(car.models, forRenderModels);

  dropDownForCarModel.addEventListener("click", function () {
    console.log("second");
    toggleShowSelectOptions(forRenderModels, activeSecond);
  });

  let makeCheckbox = document.getElementById(`selectMake${make}`);
  makeCheckbox.addEventListener("change", function () {
    toggleMakeCheckbox(makeCheckbox, forRenderModels);
  });

  let modelCheckboxes = forRenderModels.querySelectorAll(".model-checkbox");
  modelCheckboxes.forEach((modelCheckbox) => {
    modelCheckbox.addEventListener("change", function () {
      handleModelCheckboxChange(modelCheckbox, makeCheckbox, modelCheckboxes);
    });
  });
}

function renderCarModelsForSelect(models, container) {
  models.forEach((model) => {
    const renderCarForSelectHTML = HTMLmodelSelectOptions(model);
    container.insertAdjacentHTML("beforeend", renderCarForSelectHTML);
  });
}

function renderSelectOptionsForSelect(
  infoAboutCar,
  container,
  generateHTMLCallback
) {
  // console.log(infoAboutCar);
  infoAboutCar.forEach((type) => {
    const HTMLtoRender = generateHTMLCallback(type);
    container.insertAdjacentHTML("beforeend", HTMLtoRender);
  });
}

//ALL FUNCTIONS FOR RENDER SOMETHING FOR SELECT END

//GOLBAL VARIABLES-----------------------------------------------------------------------

//dropdorns and checboxes for transmission
const carMakesForSelectDropdown =
  document.getElementById("carMakesForSelect");
const dropDownMakes = document.getElementById("dropDownMakes");

//dropdorns and checboxes for transmission
const dropDownForTransmission = document.getElementById(
  "selectTransmissionType"
);
const transmissionCheckboxes = document.querySelectorAll(
  ".transmissionType-checkbox"
);

//dropdorns and checboxes for fuel type
const dropDownForFuelType = document.getElementById("selectFuelType");
const fuelTypeCheckboxes = document.querySelectorAll(".fuelType-checkbox");
//dropdorns and checboxes for fuel type
const dropDownForBodyType = document.getElementById("selectBodyType");
const bodyTypeCheckboxes = document.querySelectorAll(".bodyType-checkbox");
//dropdorns and checboxes for rent status
const dropDownForRentStatus = document.getElementById("selectRentStatus");
const rentStatusCheckboxes = document.querySelectorAll(
  ".rentStatus-checkbox"
);

// Applies filter on data from the database
const carsFromFilter = filterNestedDataForSelectOptions(carsInfoFromPHP);
carsFromFilter.forEach(renderCarForSelect);
//GOLBAL VARIABLES END-----------------------------------------------

//EVENT LISTENERS -----------------------------------------------
// DROPDOWNS -----------------------------------------------

dropDownMakes.addEventListener("click", function () {
  forRenderFuelType;
  console.log("make");
  toggleShowSelectOptions(carMakesForSelectDropdown, activeMain);
});

dropDownForTransmission.addEventListener("click", function () {
  toggleShowSelectOptions(forRenderTransmission, activeMain);
  console.log("transmi");
});
dropDownForFuelType.addEventListener("click", function () {
  toggleShowSelectOptions(forRenderFuelType, activeMain);
  console.log("fuel");
});
dropDownForBodyType.addEventListener("click", function () {
  toggleShowSelectOptions(forRenderBodyType, activeMain);
  console.log("body");
});
dropDownForRentStatus.addEventListener("click", function () {
  toggleShowSelectOptions(forRenderRentStatus, activeMain);
  console.log("body");
});

//CHECHBOXES--------------------------------------------------------------------

transmissionCheckboxes.forEach((checkbox) => {
  checkbox.addEventListener("change", function () {
    renderFilteredCars();
  });
});
fuelTypeCheckboxes.forEach((checkbox) => {
  checkbox.addEventListener("change", function () {
    renderFilteredCars();
  });
});
bodyTypeCheckboxes.forEach((checkbox) => {
  checkbox.addEventListener("change", function () {
    renderFilteredCars();
  });
});
rentStatusCheckboxes.forEach((checkbox) => {
  checkbox.addEventListener("change", function () {
    renderFilteredCars();
  });
});
//EVENT LISTENERS END-------------------------------------------------

function toggleMakeCheckbox(makeCheckbox, container) {
  let modelCheckboxes = container.querySelectorAll(".model-checkbox");
  modelCheckboxes.forEach((modelCheckbox) => {
    modelCheckbox.checked = makeCheckbox.checked;
    console.log(
      `Checkbox All ${makeCheckbox.id} is checked: ${makeCheckbox.checked}`
    );
  });
}

function handleModelCheckboxChange(
  modelCheckbox,
  makeCheckbox,
  allModelCheckboxes
) {
  makeCheckbox.checked = Array.from(allModelCheckboxes).some(
    (checkbox) => checkbox.checked
  );
  console.log(
    `Checkbox ${modelCheckbox.id} is checked: ${modelCheckbox.checked}`
  );
}

//test
// Initialize checkboxes and models
const makeCheckboxes = document.querySelectorAll(".make-checkbox");
const modelCheckboxes = document.querySelectorAll(".model-checkbox");

// Listen for changes in make checkboxes
makeCheckboxes.forEach((makeCheckbox) => {
  makeCheckbox.addEventListener("change", function () {
    renderFilteredCars();
  });
});
// Listen for changes in model checkboxes
modelCheckboxes.forEach((modelCheckbox) => {
  modelCheckbox.addEventListener("change", function () {
    renderFilteredCars();
  });
});
// Render cars on the webpage---------------------------------------------------------------------------------

// Create HTML for a single car
const createCarHTML = (car, getImages) => `
  <div id="${car.plate}" class="car-to-rent" href="carRentPage.php">
    <div class="car-list__box">
      <img src="/images/carsList/${getImages[0]}" alt="carImage">
      <div class="car-list__box-make-model" ><h4>${car.make} - ${car.model}</h4></div>
      <div class="car-list__box-details">
      <div class="car-list__box-details-price">
        <h5>${car.rentDaysPrice46}€/Zi</h5>
      </div>
        <div class="car-list__box-details-tech"> ${createCarDetailsHTML(car)}</div>
      </div>
    </div>
  </div>
`;

// Create HTML for car details
const createCarDetailsHTML = (car) => `
  <div class="car-list__box-details-tech__item">
      <img src="/images/icons/calendar.svg" alt="time">
      <h6>An: ${car.registrationYear}</h6>
  </div>
  <div class="car-list__box-details-tech__item">
      <img src="/images/icons/gearbox.svg" alt="transmission">
      <h6>${car.transmissionType}</h6>
  </div>
  <div class="car-list__box-details-tech__item">
      <img src="/images/icons/gasstation.svg" alt="fuelType">
      <h6>${car.engineFuel}</h6>
  </div>
`;

// Get the container to render cars
const carsContainer = document.querySelector("#car-list-render");

const renderCars = (car) => {
  let getImages = car.carImage.split(",");
  const productHTML = createCarHTML(car, getImages);
  carsContainer.insertAdjacentHTML("beforeend", productHTML);
};

// Render all cars initially
renderAllCars();

// Function to render all cars
function renderAllCars() {
  carsContainer.innerHTML = "";
  carsInfoFromPHP.forEach(renderCars);
}

// Function to render filtered cars based on checked checkboxes

function renderFilteredCars() {
  carsContainer.innerHTML = "";

  const checkedMakes = Array.from(makeCheckboxes)
    .filter((checkbox) => checkbox.checked)
    .map((checkbox) => checkbox.id.replace("selectMake", ""));

  const checkedModels = Array.from(modelCheckboxes)
    .filter((checkbox) => checkbox.checked)
    .map((checkbox) => checkbox.id.replace("select", ""));

  const checkedTransmissions = Array.from(transmissionCheckboxes)
    .filter((checkbox) => checkbox.checked)
    .map((checkbox) => checkbox.id.replace("select", ""));

  const checkedFuelType = Array.from(fuelTypeCheckboxes)
    .filter((checkbox) => checkbox.checked)
    .map((checkbox) => checkbox.id.replace("select", ""));

  const checkedBodyType = Array.from(bodyTypeCheckboxes)
    .filter((checkbox) => checkbox.checked)
    .map((checkbox) => checkbox.id.replace("select", ""));

  const checkedRentStatus = Array.from(rentStatusCheckboxes)
    .filter((checkbox) => checkbox.checked)
    .map((checkbox) => checkbox.id.replace("select", ""));

  if (
    checkedMakes.length === 0 &&
    checkedModels.length === 0 &&
    checkedTransmissions.length === 0 &&
    checkedFuelType.length === 0 &&
    checkedBodyType.length === 0 &&
    checkedRentStatus.length === 0
  ) {
    renderAllCars();
  } else {
    carsInfoFromPHP.forEach((car) => {
      if (
        (checkedMakes.length === 0 || checkedMakes.includes(car.make)) &&
        (checkedModels.length === 0 || checkedModels.includes(car.model)) &&
        (checkedTransmissions.length === 0 ||
          checkedTransmissions.includes(car.transmissionType)) &&
        (checkedFuelType.length === 0 ||
          checkedFuelType.includes(car.engineFuel)) &&
        (checkedBodyType.length === 0 ||
          checkedBodyType.includes(car.bodyType)) &&
        (checkedRentStatus.length === 0 ||
          checkedRentStatus.includes(car.rentStatus))
      ) {
        renderCars(car);
      }
    });
  }
}
}

let globalValue = document.querySelectorAll(".car-to-rent");

// Get the button element

let buttonToClick = document.getElementById("buttonToClick");

// Attach a click event listener to the button
globalValue.forEach(e => {
    e.onclick = function() {
      console.log('gf');
        // Encode the value and set it to hidden input field
        // let getValue = document.getElementById("")
        document.getElementById("hiddenValue").value = encodeURIComponent(e.id);
        // e.id = encodeURIComponent();
        // Submit the form
        document.getElementById("myForm").submit();
    }
})