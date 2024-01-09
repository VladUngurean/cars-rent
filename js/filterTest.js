function createCarForSelectHTML(make) {
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

function renderCarModelsForSelect(models, container, make) {
  models.forEach((model) => {
    const renderCarForSelect2HTML = createCarModelForSelectHTML(model);
    container.insertAdjacentHTML("beforeend", renderCarForSelect2HTML);
  });
}

function createCarModelForSelectHTML(model) {
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

// Get data from the database
const carsInfoFromPHP = carData;
console.log(carsInfoFromPHP);

// Get UL by id to render carMakes for select option
let carSelectDropDown = document.getElementById("renderCarMakeSelect");

// To prevent more than one dropdown opened at the time
let activeDropdownStatus = null;

// Filter cars to show for select options
function filteredDataForSelect(inputArray) {
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

// Applies filter on data from the database
const carsFromFilter = filteredDataForSelect(carsInfoFromPHP);
carsFromFilter.forEach(renderCarForSelect);

// Render on screen cars for select option from filteredDataForSelect function
function renderCarForSelect(car) {
  const make = car.make;
  const renderCarForSelectHTML = createCarForSelectHTML(make);
  carSelectDropDown.insertAdjacentHTML("beforeend", renderCarForSelectHTML);

  const dropDownForCarModel = document.getElementById(`dropDown${make}Models`);
  const forRenderModels = document.getElementById(`renderModels${make}`);

  renderCarModelsForSelect(car.models, forRenderModels, make);

  dropDownForCarModel.addEventListener("click", function () {
    handleDropDownClick(forRenderModels);
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

function createCarForSelectHTML(make) {
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

function renderCarModelsForSelect(models, container, make) {
  models.forEach((model) => {
    const renderCarForSelect2HTML = createCarModelForSelectHTML(model);
    container.insertAdjacentHTML("beforeend", renderCarForSelect2HTML);
  });
}

function createCarModelForSelectHTML(model) {
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

function handleDropDownClick(container) {
  if (activeDropdownStatus && activeDropdownStatus !== container) {
    activeDropdownStatus.classList.remove("show");
  }
  container.classList.toggle("show");
  activeDropdownStatus = container;
}

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
  console.log(
    `Checkbox All ${makeCheckbox.id} is checked: ${makeCheckbox.checked}`
  );
}
// Access the PHP data in JavaScript
const dataFromPHP = carData;

// Render cars on the webpage
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
  dataFromPHP.forEach(renderCars);
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

  if (checkedMakes.length === 0 && checkedModels.length === 0) {
    renderAllCars();
  } else {
    dataFromPHP.forEach((car) => {
      const makeCheckbox = document.getElementById(`selectMake${car.make}`);
      const modelCheckbox = document.getElementById(`select${car.model}`);

      if (
        (checkedMakes.length === 0 || checkedMakes.includes(car.make)) &&
        (checkedModels.length === 0 || checkedModels.includes(car.model))
      ) {
        renderCars(car);
      }
    });
  }
}
