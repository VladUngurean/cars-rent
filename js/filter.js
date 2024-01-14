// Get data from the database
const carsInfoFromPHP = carData;
console.log(carsInfoFromPHP);
// To prevent more than one dropdown opened at the time
let activeMain = null;
let activeSecond = null;

//HTML for make and model
function HTMLforMakeModelSelect() {
  return `
      <li class="">
        <div class="dropdown__content-second__select-options">
          <label class="" for="1">
            <span id="dropDownMakes"> Marca
              <a href="">&gt;</a>
            </span>
          </label>
        </div>
        <ul id="carMakesForSelect" class="ulForCarMakes"></ul>
      </li>
    `;
}
function HTMLmakeSelectOptions(make) {
  return `
      <li class="">
        <div class="dropdown__content-second__select-options">
          <label class="" for="1">
            <input id="selectMake${make}" class="make-checkbox" type="checkbox" name="" value="">
            <span id="dropDown${make}Models">${make}
              <a href="">&gt;</a>
            </span>
          </label>
        </div>
        <ul id="renderModels${make}" class="ulForCarModels"></ul>
      </li>
    `;
}
function HTMLmodelSelectOptions(model) {
  return `
        <li class="">
          <div class="">
            <label class="" for="1">
              <input id="select${model}" class="model-checkbox" type="checkbox" name="" value="">
              <span>${model}</span>
            </label>
          </div>
        </li>
      `;
}
//HTML for transmission
function HTMLforTransmissionSelect() {
  return `
      <li class="">
        <div class="dropdown__content-second__select-options">
          <label class="" for="1">
            <span id="selectTransmissionType">Transmisie
              <a href="">&gt;</a>
            </span>
          </label>
        </div>
        <ul id="transmissionTypeList" class="ulForTransmissions"></ul>
      </li>
    `;
}
function HTMLtransmissionSelectOptions(transmissionType) {
  return `
        <li class="">
          <div class="">
            <label class="" for="1">
              <input id="select${transmissionType}" class="transmissionType-checkbox" type="checkbox" name="" value="">
              <span>${transmissionType}</span>
            </label>
          </div>
        </li>
      `;
}

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
function applyFiltersForSelectOption(filteredData, renderFunction) {
  filteredData.forEach(renderFunction);
}
// Applies filter on data from the database END

// CHECK ACTIVE STATUS
function selectDropDownOnClick(container, activeStatus) {
  if (activeStatus && activeStatus !== container) {
    activeStatus.classList.remove("show");
  }
  container.classList.toggle("show");
  activeStatus = container;
}
// CHECK ACTIVE STATUS END
//Reusble function END-------------------------------------------------------

// ALL FUNCTION CALLS--------------------------------------------------------------------
//ALL THAT RENDER SOMETHING FOR SELECT
renderSelectOptions("renderCarMakeSelect", HTMLforMakeModelSelect);
renderSelectOptions("renderCarTransmissionSelect", HTMLforTransmissionSelect);
//ALL THAT RENDER SOMETHING FOR SELECT END

const forRenderTransmission = document.getElementById("transmissionTypeList");
const filteredTransmission = filterForSelectOptions(
  carsInfoFromPHP,
  "transmissionType"
);
applyFiltersForSelectOption(filteredTransmission, renderTransmissionSelect);

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

  const dropDownForCarModel = document.getElementById(`dropDown${make}Models`);
  const forRenderModels = document.getElementById(`renderModels${make}`);

  renderCarModelsForSelect(car.models, forRenderModels);

  dropDownForCarModel.addEventListener("click", function () {
    selectDropDownOnClick(forRenderModels, activeSecond);
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
    const renderCarForSelect2HTML = HTMLmodelSelectOptions(model);
    container.insertAdjacentHTML("beforeend", renderCarForSelect2HTML);
  });
}

function renderTransmissionSelect(car) {
  renderTransmissionTypesForSelect(
    car.transmissionTypes,
    forRenderTransmission
  );
}

function renderTransmissionTypesForSelect(transmissionTypes, container) {
  transmissionTypes.forEach((type) => {
    const rendTransmissionSelectHTML = HTMLtransmissionSelectOptions(type);
    container.insertAdjacentHTML("beforeend", rendTransmissionSelectHTML);
  });
}

//ALL FUNCTIONS FOR RENDER SOMETHING FOR SELECT END

//GOLBAL VARIABLES-----------------------------------------------------------------------
const carMakesForSelectDropdown = document.getElementById("carMakesForSelect");
const dropDownMakes = document.getElementById("dropDownMakes");

const transmissionCheckboxes = document.querySelectorAll(
  ".transmissionType-checkbox"
);

const dropDownForTransmission = document.getElementById(
  "selectTransmissionType"
);
// Applies filter on data from the database
const carsFromFilter = filterNestedDataForSelectOptions(carsInfoFromPHP);
carsFromFilter.forEach(renderCarForSelect);
//GOLBAL VARIABLES END-----------------------------------------------

//EVENT LISTENERS -----------------------------------------------
dropDownMakes.addEventListener("click", function () {
  console.log("main");
  selectDropDownOnClick(carMakesForSelectDropdown, activeMain);
});

dropDownForTransmission.addEventListener("click", function () {
  selectDropDownOnClick(forRenderTransmission, activeMain);
  console.log("hh");
});
//EVENT LISTENERS END-------------------------------------------------

//CHECHBOXES--------------------------------------------------------------------
transmissionCheckboxes.forEach((checkbox) => {
  checkbox.addEventListener("change", function () {
    renderFilteredCars();
  });
});

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

// Render cars on the webpage---------------------------------------------------------------------------------
const renderCars = (car) => {
  const productHTML = createCarHTML(car);
  carsContainer.insertAdjacentHTML("beforeend", productHTML);
};

// Create HTML for a single car
const createCarHTML = (car) => `
    <div class="car-list__box">
        <img src="${car.carImage}" alt="carImage">
        <h4>${car.make} - ${car.model}</h4>
        <div class="car-list__box-details">
            <div class="car-list__box-details__price">De la <span>${
              car.rentDaysPrice46
            } €</span>/Zi</div>
            <div class="car-list__box-details-tech">
                ${createCarDetailsHTML(car)}
            </div>
        </div>
        <div class="car-list__box-link">
            <a href="#">Inchiriaza</a>
        </div>
    </div>
  `;

// Create HTML for car details
const createCarDetailsHTML = (car) => `
    <div class="car-list__box-details-tech__item">
        <img src="/images/icons/calendarIcon.png" alt="time">
        <div>An: ${car.registrationYear}</div>
    </div>
    <div class="car-list__box-details-tech__item">
        <img src="/images/icons/gear.png" alt="transmission">
        <div>${car.transmissionType}</div>
    </div>
    <div class="car-list__box-details-tech__item">
        <img src="/images/icons/fuel.png" alt="fuelType">
        <div>${car.engineFuel}</div>
    </div>
  `;

// Get the container to render cars
const carsContainer = document.querySelector("#car-list-render");

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

  if (
    checkedMakes.length === 0 &&
    checkedModels.length === 0 &&
    checkedTransmissions.length === 0
  ) {
    renderAllCars();
  } else {
    carsInfoFromPHP.forEach((car) => {
      if (
        (checkedMakes.length === 0 || checkedMakes.includes(car.make)) &&
        (checkedModels.length === 0 || checkedModels.includes(car.model)) &&
        (checkedTransmissions.length === 0 ||
          checkedTransmissions.includes(car.transmissionType))
      ) {
        renderCars(car);
      }
    });
  }
}
