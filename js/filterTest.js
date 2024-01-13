function createTransmissionTypeSelectHTML() {
  return `
      <li class="">
        <div class="dropdown__content-second__select-options">
          <label class="" for="1">
            <input id="transmissionType" class="transmissionType-checkbox" type="checkbox" name="" value="">
            <span id="selectTransmissionType">Transmisie
              <a href="">&gt;</a>
            </span>
          </label>
        </div>
        <ul id="transmissionTypeList" class="ulForCarModels"></ul>
      </li>
    `;
}

function createTransmissionTypeForSelectHTML(transmissionType) {
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

// Get data from the database
const carsInfoFromPHP = carData;
console.log(carsInfoFromPHP);

// Get UL by id to render carMakes for select option
let transmissionTypeSelectDropDown = document.getElementById(
  "renderCarMakeSelect"
);

// To prevent more than one dropdown opened at the time
let activeDropdownStatus = null;

// Filter cars to show for select options
function filteredDataForSelect(inputArray) {
  const uniqueTransmissionTypes = [];

  inputArray.forEach(({ transmissionType }) => {
    if (!uniqueTransmissionTypes[transmissionType]) {
      uniqueTransmissionTypes[transmissionType] = {
        transmissionType,
        transmissionTypes: new Set(),
      };
    }
    uniqueTransmissionTypes[transmissionType].transmissionTypes.add(
      transmissionType
    );
  });
  // return uniqueTransmissionTypes;
  return Object.values(uniqueTransmissionTypes);
}

// console.log(filteredDataForSelect(carsInfoFromPHP));

// Applies filter on data from the database
const carsFromFilter = filteredDataForSelect(carsInfoFromPHP);
console.log(carsFromFilter);
carsFromFilter.forEach(renderCarForSelect);

// Render on screen cars for select option from filteredDataForSelect function
function renderCarForSelect(car) {
  let test = car.transmissionType;
  console.log(test);
  const renderCarForSelectHTML = createTransmissionTypeSelectHTML();
  transmissionTypeSelectDropDown.insertAdjacentHTML(
    "beforeend",
    renderCarForSelectHTML
  );

  const dropDownForCarModel = document.getElementById(`selectTransmissionType`);
  const forRenderModels = document.getElementById(`transmissionTypeList`);

  console.log(car.transmissionType);
  renderCarModelsForSelect(car, forRenderModels);
  dropDownForCarModel.addEventListener("click", function () {
    handleDropDownClick(forRenderModels);
  });

  let makeCheckbox = document.getElementById(`transmissionType`);
  makeCheckbox.addEventListener("change", function () {
    toggleMakeCheckbox(makeCheckbox, forRenderModels);
  });

  let modelCheckboxes = forRenderModels.querySelectorAll(
    ".transmissionType-checkbox"
  );
  modelCheckboxes.forEach((modelCheckbox) => {
    modelCheckbox.addEventListener("change", function () {
      handleModelCheckboxChange(modelCheckbox, makeCheckbox, modelCheckboxes);
    });
  });
}

function renderCarModelsForSelect(transmissionTypes, container) {
  console.log(transmissionTypes);
  transmissionTypes.forEach((type) => {
    const renderCarForSelect2HTML = createTransmissionTypeForSelectHTML(type);
    container.insertAdjacentHTML("beforeend", renderCarForSelect2HTML);
  });
}

function handleDropDownClick(container) {
  if (activeDropdownStatus && activeDropdownStatus !== container) {
    activeDropdownStatus.classList.remove("show");
  }
  container.classList.toggle("show");
  activeDropdownStatus = container;
}

function toggleMakeCheckbox(makeCheckbox, container) {
  let modelCheckboxes = container.querySelectorAll(
    ".transmissionType-checkbox"
  );
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
