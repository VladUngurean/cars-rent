// Get data from the database
const allCarMakesModelsFromDb = makesModelsFromDb;
console.log(allCarMakesModelsFromDb);

const allTransmissionTypesFromDb = transmissionsFromDb;
console.log(allTransmissionTypesFromDb);

const allEngineFuelsFromDb = engineFuelsFromDb;
console.log(allEngineFuelsFromDb);

const allBodyTypesFromDb = bodyTypesFromDb;
console.log(allBodyTypesFromDb);

const allDoorsNumberFromDb = doorsNumberFromDb;
console.log(allDoorsNumberFromDb);

const allPassengersNumberFromDb = passengersNumberFromDb;
console.log(allPassengersNumberFromDb);

// Get data from the database
// const carsInfoFromPHP = carData;
// console.log(carsInfoFromPHP);
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
        <ul id="carMakesForSelect" class="ulForHideSelectOption ulForCarMakes"></ul>
      </li>
    `;
}
function HTMLmakeSelectOptions(make) {
  return `
      <li class="">
        <div class="dropdown__content-second__select-options">
          <label class="" for="1">
            <input id="selectMake${make}" class="make-checkbox" type="radio" name="make" value="${make}">
            <span id="dropDown${make}Models">${make}
              <a href="">&gt;</a>
            </span>
          </label>
        </div>
        <ul id="renderModels${make}" class="ulForHideSelectOptions ulForCarModels"></ul>
      </li>
    `;
}
function HTMLmodelSelectOptions(model) {
  return `
        <li class="">
          <div class="">
            <label class="" for="1">
              <input id="select${model}" class="model-checkbox" type="radio" name="model" value="${model}">
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
            <span id="selectTransmissionType">Cutie de viteze
              <a href="">&gt;</a>
            </span>
          </label>
        </div>
        <ul id="transmissionTypeList" class="ulForHideSelectOption ulForTransmissions"></ul>
      </li>
    `;
}
function HTMLtransmissionSelectOptions(transmissionType) {
  return `
        <li class="">
          <div class="">
            <label class="" for="1">
              <input id="select${transmissionType}" class="transmissionType-checkbox" type="radio" name="transmission_type" value="${transmissionType}">
              <span>${transmissionType}</span>
            </label>
          </div>
        </li>
      `;
}
//HTML for fuel type-------------------------------------------------------------------------------------
function HTMLforFuelTypeSelect() {
  return `
      <li class="">
        <div class="dropdown__content-second__select-options">
          <label class="" for="1">
            <span id="selectFuelType">Tip combustibil
              <a href="">&gt;</a>
            </span>
          </label>
        </div>
        <ul id="fuelTypeList" class="ulForHideSelectOption ulForFuelTypes"></ul>
      </li>
    `;
}
function HTMLFuelTypeSelectOptions(fuelType) {
  return `
        <li class="">
          <div class="">
            <label class="" for="1">
              <input id="select${fuelType}" class="fuelType-checkbox" type="radio" name="fuel_type" value="${fuelType}">
              <span>${fuelType}</span>
            </label>
          </div>
        </li>
      `;
}
//HTML for body type-------------------------------------------------------------------------------------
function HTMLforBodyTypeSelect() {
  return `
      <li class="">
        <div class="dropdown__content-second__select-options">
          <label class="" for="1">
            <span id="selectBodyType">Tip caroserie
              <a href="">&gt;</a>
            </span>
          </label>
        </div>
        <ul id="bodyTypeList" class="ulForHideSelectOption ulForBodyTypes"></ul>
      </li>
    `;
}
function HTMLBodyTypeSelectOptions(bodyType) {
  return `
        <li class="">
          <div class="">
            <label class="" for="1">
              <input id="select${bodyType}" class="bodyType-checkbox" type="radio" name="body_type" value="${bodyType}">
              <span>${bodyType}</span>
            </label>
          </div>
        </li>
      `;
}
//HTML for doors number-------------------------------------------------------------------------------------
function HTMLforDoorsNumberSelect() {
  return `
      <li class="">
        <div class="dropdown__content-second__select-options">
          <label class="" for="1">
            <span id="selectDoorsNumber">Numarul de Usi
              <a href="">&gt;</a>
            </span>
          </label>
        </div>
        <ul id="doorsNumberList" class="ulForHideSelectOption ulForDoorsNumbers"></ul>
      </li>
    `;
}
function HTMLDoorsNumberSelectOptions(doorsNumber) {
  return `
        <li class="">
          <div class="">
            <label class="" for="1">
              <input id="select${doorsNumber}" class="doorsNumber-checkbox" type="radio" name="doors_number" value="${doorsNumber}">
              <span>${doorsNumber}</span>
            </label>
          </div>
        </li>
      `;
}
//HTML for pasangersNumber-------------------------------------------------------------------------------------
function HTMLforPasangersNumberSelect() {
  return `
      <li class="">
        <div class="dropdown__content-second__select-options">
          <label class="" for="1">
            <span id="selectpasangersNumber">Numarul de Pasageri
              <a href="">&gt;</a>
            </span>
          </label>
        </div>
        <ul id="pasangersNumberList" class="ulForHideSelectOption ulForpasangersNumbers"></ul>
      </li>
    `;
}
function HTMLpasangersNumberSelectOptions(pasangersNumber) {
  return `
        <li class="">
          <div class="">
            <label class="" for="1">
              <input id="select${pasangersNumber}" class="pasangersNumber-checkbox" type="radio" name="pasangers_number" value="${pasangersNumber}">
              <span>${pasangersNumber}</span>
            </label>
          </div>
        </li>
      `;
}
//HTML for do today end-------------------------------------------------------------------------------------

// Filter make and models to show for select options !!!!NEED TO MAKE REUSABLE
// function filterNestedDataForSelectOptions(inputArray) {
//   const uniqueMakes = {};

//   inputArray.forEach(({ make, model }) => {
//     if (!uniqueMakes[make]) {
//       uniqueMakes[make] = {
//         make,
//         models: new Set(),
//       };
//     }
//     uniqueMakes[make].models.add(model);
//   });

//   return Object.values(uniqueMakes);
// }
//Reusble function
//Render select options
function renderSelectOptions(addressToRender, functionToRender) {
  let addressToRenderHTML = document.getElementById(`${addressToRender}`);
  const renderToSelectHTML = functionToRender();
  addressToRenderHTML.insertAdjacentHTML("beforeend", renderToSelectHTML);
}

// //Filter for car details, make them usable in this code(REUSABLE FUNC)
// function filterForSelectOptions(inputArray, carDetail) {
//   const uniqueValues = {};

//   inputArray.forEach((car) => {
//     if (!uniqueValues[car[carDetail]]) {
//       uniqueValues[car[carDetail]] = {
//         [carDetail]: car[carDetail],
//         [`${carDetail}s`]: new Set(),
//       };
//     }
//     uniqueValues[car[carDetail]][`${carDetail}s`].add(car[carDetail]);
//   });

//   // Return the result if needed
//   return Object.values(uniqueValues);
// }

// // Applies filter on data from the database
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
renderSelectOptions("makeModelToDb", HTMLforMakeModelSelect);
renderSelectOptions("transmissionTypeToDb", HTMLforTransmissionSelect);
renderSelectOptions("engineFuelToDb", HTMLforFuelTypeSelect);
renderSelectOptions("bodyTypeToDb", HTMLforBodyTypeSelect);
renderSelectOptions("carDoorsNumberToDb", HTMLforDoorsNumberSelect);
renderSelectOptions("pasangersNumberToDb", HTMLforPasangersNumberSelect);
//ALL THAT RENDER SOMETHING FOR SELECT END

//aplly filter for make model
const forRenderMake = document.getElementById("carMakesForSelect");
renderSelectOptionsForSelect(
  allCarMakesModelsFromDb,
  forRenderMake,
  "make",
  HTMLmakeSelectOptions
);
// const forRenderModel = document.getElementById("carMakesForSelect");
// renderSelectOptionsForSelect(
//   allCarMakesModelsFromDb,
//   forRenderModel,
//   "model",
//   HTMLmakeSelectOptions
// );
//aplly filter for transmission
const forRenderTransmission = document.getElementById("transmissionTypeList");
renderSelectOptionsForSelect(
  allTransmissionTypesFromDb,
  forRenderTransmission,
  "transmissionType",
  HTMLtransmissionSelectOptions
);
// //aplly filter for fuel type
const forRenderFuelType = document.getElementById("fuelTypeList");
renderSelectOptionsForSelect(
  allEngineFuelsFromDb,
  forRenderFuelType,
  "engineFuel",
  HTMLFuelTypeSelectOptions
);
// //aplly filter for body type
const forRenderBodyType = document.getElementById("bodyTypeList");
renderSelectOptionsForSelect(
  allBodyTypesFromDb,
  forRenderBodyType,
  "bodyType",
  HTMLBodyTypeSelectOptions
);

// //aplly filter for doors number
const forRenderDoorsNumberToDb = document.getElementById("doorsNumberList");
renderSelectOptionsForSelect(
  allDoorsNumberFromDb,
  forRenderDoorsNumberToDb,
  "doorsNumber",
  HTMLDoorsNumberSelectOptions
);
// //aplly filter for pasangersNumberList
const forRenderPassangerNumberToDb = document.getElementById(
  "pasangersNumberList"
);
renderSelectOptionsForSelect(
  allPassengersNumberFromDb,
  forRenderPassangerNumberToDb,
  "passengersNumber",
  HTMLpasangersNumberSelectOptions
);

// ALL FUNCTION CALLS END-----------------------------------------------------------------

//ALL FUNCTIONS FOR RENDER SOMETHING FOR SELECT
function renderCarForSelect(car) {
  // const carMakesForSelectDropdown =
  //   document.getElementById("carMakesForSelect");

  const make = car.make;
  const model = car.model.split(",");
  console.log(make);
  console.log(model);
  // const renderCarForSelectHTML = HTMLmakeSelectOptions(make);
  // carMakesForSelectDropdown.insertAdjacentHTML(
  //   "beforeend",
  //   renderCarForSelectHTML
  // );

  const dropDownForCarModel = document.getElementById(`dropDown${make}Models`);
  const forRenderModels = document.getElementById(`renderModels${make}`);

  renderCarModelsForSelect(model, forRenderModels);

  dropDownForCarModel.addEventListener("click", function () {
    console.log("second");
    toggleShowSelectOptions(forRenderModels, activeMain);
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
  console.log(models);
  models.forEach((model) => {
    const renderCarForSelectHTML = HTMLmodelSelectOptions(model);
    container.insertAdjacentHTML("beforeend", renderCarForSelectHTML);
  });
}

function renderSelectOptionsForSelect(
  infoAboutCar,
  container,
  carCharacteristic,
  functionThatReturnHTML
) {
  // console.log(infoAboutCar);
  infoAboutCar.forEach((type) => {
    const HTMLtoRender = functionThatReturnHTML(type[carCharacteristic]);
    container.insertAdjacentHTML("beforeend", HTMLtoRender);
  });
}

//ALL FUNCTIONS FOR RENDER SOMETHING FOR SELECT END

//GOLBAL VARIABLES-----------------------------------------------------------------------

//dropdorns and checboxes for transmission
const carMakesForSelectDropdown = document.getElementById("carMakesForSelect");
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

// Applies filter on data from the database
// const carsFromFilter = filterNestedDataForSelectOptions(carsInfoFromPHP);
allCarMakesModelsFromDb.forEach(renderCarForSelect);

//GOLBAL VARIABLES END-----------------------------------------------

//EVENT LISTENERS -----------------------------------------------
// DROPDOWNS -----------------------------------------------

// dropDownMakes.addEventListener("click", function () {
//   // forRenderFuelType;
//   console.log("make");
//   toggleShowSelectOptions(carMakesForSelectDropdown, activeMain);
// });

// dropDownForTransmission.addEventListener("click", function () {
//   toggleShowSelectOptions(forRenderTransmission, activeMain);
//   console.log("transmi");
// });
// dropDownForFuelType.addEventListener("click", function () {
//   toggleShowSelectOptions(forRenderFuelType, activeMain);
//   console.log("fuel");
// });
// dropDownForBodyType.addEventListener("click", function () {
//   toggleShowSelectOptions(forRenderBodyType, activeMain);
//   console.log("body");
// });
// dropDownForBodyType.addEventListener("click", function () {
//   toggleShowSelectOptions(forRenderDoorsNumberToDb, activeMain);
//   console.log("doors");
// });
// dropDownForBodyType.addEventListener("click", function () {
//   toggleShowSelectOptions(forRenderPassangerNumberToDb, activeMain);
//   console.log("passangers");
// });

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
  // const firstModelCheckbox = allModelCheckboxes[0];
  // console.log(firstModelCheckbox);
  // makeCheckbox.checked = Array.from(allModelCheckboxes).some(
  //   (checkbox) => checkbox.checked
  // );
  const firstModelCheckbox = allModelCheckboxes[0]; // Assuming the first checkbox is at index 0

  makeCheckbox.checked = firstModelCheckbox.checked;

  console.log(
    `Checkbox ${modelCheckbox.id} is checked: ${modelCheckbox.checked}`
  );
}

//test
// Initialize checkboxes and models
const makeCheckboxes = document.querySelectorAll(".make-checkbox");
const modelCheckboxes = document.querySelectorAll(".model-checkbox");

// Listen for changes in make checkboxes
// makeCheckboxes.forEach((makeCheckbox) => {
//   makeCheckbox.addEventListener("change", function () {
//     renderFilteredCars();
//   });
// });
// // Listen for changes in model checkboxes
// modelCheckboxes.forEach((modelCheckbox) => {
//   modelCheckbox.addEventListener("change", function () {
//     renderFilteredCars();
//   });
// });
