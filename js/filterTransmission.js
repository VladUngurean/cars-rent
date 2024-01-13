function createTransmissionSelectHTML() {
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

function createTransmissionForSelect(transmissionType) {
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
const carsFromPHP = carData;
// console.log(carsFromPHP);

// Get UL by id to render carMakes for select option
let transmissionTypeSelectDropDown = document.getElementById(
  "renderCarTransmissionSelect"
);
const renderTransmissionSelectHTML = createTransmissionSelectHTML();
transmissionTypeSelectDropDown.insertAdjacentHTML(
  "beforeend",
  renderTransmissionSelectHTML
);

// To prevent more than one dropdown opened at the time
// let activeMainDropdownStatus = null;

// Filter to showTransmissions for select options
function filteredTransmissionTypes(data) {
  const uniqueTransmissionTypes = [];

  data.forEach(({ transmissionType }) => {
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

// console.log(filteredTransmissionTypes(carsFromPHP));

// Applies filter on data from the database
const transmissionTypesFromFilter = filteredTransmissionTypes(carsFromPHP);
console.log(transmissionTypesFromFilter);
transmissionTypesFromFilter.forEach(renderTransmissionSelect);

// Render on screen cars for select option from filteredTransmissionTypes function
function renderTransmissionSelect(car) {
  const forRenderTransmission = document.getElementById("transmissionTypeList");

  // console.log(car.transmissionTypes);
  renderTransmissionTypesForSelect(
    car.transmissionTypes,
    forRenderTransmission
  );

  // let transmissionTypeCheckbox = document.getElementById(`transmissionType`);
  // transmissionTypeCheckbox.addEventListener("change", function () {
  //   toggleTransmissionCheckbox(transmissionTypeCheckbox, forRenderTransmission);
  // });

  let transmissionCheckboxes = forRenderTransmission.querySelectorAll(
    ".transmissionType-checkbox"
  );
  transmissionCheckboxes.forEach((transmissionCheckbox) => {
    transmissionCheckbox.addEventListener("change", function () {
      handletransmissionCheckboxChange(
        transmissionCheckbox,
        transmissionCheckboxes
      );
    });
  });
}

const dropDownForTransmission = document.getElementById(
  "selectTransmissionType"
);
const forRenderTransmission = document.getElementById("transmissionTypeList");
dropDownForTransmission.addEventListener("click", function () {
  handleDropDownClick(forRenderTransmission);
  console.log("hh");
});

function renderTransmissionTypesForSelect(transmissionTypes, container) {
  // console.log(transmissionTypes);
  transmissionTypes.forEach((type) => {
    const renderTransmissionSelect2HTML = createTransmissionForSelect(type);
    container.insertAdjacentHTML("beforeend", renderTransmissionSelect2HTML);
  });
}

function handleDropDownClick(container) {
  if (activeMainDropdownStatus && activeMainDropdownStatus !== container) {
    activeMainDropdownStatus.classList.remove("show");
  }
  container.classList.toggle("show");
  activeMainDropdownStatus = container;
}
