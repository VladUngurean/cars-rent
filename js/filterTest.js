function createTransmissionSelectHTML() {
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
const carsInfoFromPHP = carData;
// console.log(carsInfoFromPHP);

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
// let activeDropdownStatus = null;

// Filter cars to show for select options
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

// console.log(filteredTransmissionTypes(carsInfoFromPHP));

// Applies filter on data from the database
const transmissionTypesFromFilter = filteredTransmissionTypes(carsInfoFromPHP);
console.log(transmissionTypesFromFilter);
transmissionTypesFromFilter.forEach(renderTransmissionSelect);

// Render on screen cars for select option from filteredTransmissionTypes function
function renderTransmissionSelect(car) {
  const forRenderTransmission = document.getElementById("transmissionTypeList");

  console.log(car.transmissionTypes);
  renderTransmissionTypesForSelect(
    car.transmissionTypes,
    forRenderTransmission
  );

  let transmissionTypeCheckbox = document.getElementById(`transmissionType`);
  transmissionTypeCheckbox.addEventListener("change", function () {
    toggleTransmissionCheckbox(transmissionTypeCheckbox, forRenderTransmission);
  });

  let transmissionCheckboxes = forRenderTransmission.querySelectorAll(
    ".transmissionType-checkbox"
  );
  transmissionCheckboxes.forEach((transmissionCheckbox) => {
    transmissionCheckbox.addEventListener("change", function () {
      handletransmissionCheckboxChange(
        transmissionCheckbox,
        transmissionTypeCheckbox,
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
  console.log(transmissionTypes);
  transmissionTypes.forEach((type) => {
    const renderTransmissionSelect2HTML = createTransmissionForSelect(type);
    container.insertAdjacentHTML("beforeend", renderTransmissionSelect2HTML);
  });
}

// function handleDropDownClick(container) {
//   if (activeDropdownStatus && activeDropdownStatus !== container) {
//     activeDropdownStatus.classList.remove("show");
//   }
//   container.classList.toggle("show");
//   activeDropdownStatus = container;
// }

function toggleTransmissionCheckbox(TransmissionCheckbox, container) {
  let transmissionCheckboxes = container.querySelectorAll(
    ".transmissionType-checkbox"
  );
  transmissionCheckboxes.forEach((transmissionCheckbox) => {
    transmissionCheckbox.checked = TransmissionCheckbox.checked;
    console.log(
      `Checkbox All ${TransmissionCheckbox.id} is checked: ${TransmissionCheckbox.checked}`
    );
  });
}

function handletransmissionCheckboxChange(
  transmissionCheckbox,
  transmissionTypeCheckbox,
  alltransmissionCheckboxes
) {
  transmissionTypeCheckbox.checked = Array.from(alltransmissionCheckboxes).some(
    (checkbox) => checkbox.checked
  );
  console.log(
    `Checkbox ${transmissionCheckbox.id} is checked: ${transmissionCheckbox.checked}`
  );
}
