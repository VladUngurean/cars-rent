//HTML for make and model
function HTMLforMakeModelSelect() {
  return `
      <li class="">
        <span id="dropDownMakes"> Marca
          <a href="">&gt;</a>
        </span>
        <ul id="carMakesForSelect" class="ulForHideSelectOption ulForCarMakes">
          <li class="">
            <div class="dropdown__content-second__select-options">
              <input id="newMakeRadio" class="make-checkbox" type="radio" name="make" value="">
              <label for="newMakeRadio">+Add New Make&Model</label>
            </div>
              
            <ul id="renderNewModels" class="ulForHideSelectOptions ulForCarModels">
              <li class="">
                <div class="">
                  <input type="radio" checked>
                  <input id="newMakeInput" type="text" name="new_make" placeholder="+Add new Make" value=""/>
                  <br>
                  <input id="newModelForNewMakeRadio" class="newCarModelRadio" type="radio" name="model">
                  <input id="newModelForNewMakeInput" class="newCarModelInput model-checkbox" type="text" name="new_model" placeholder="+Add new Model"/>
                </div>
              </li>
            </ul>

          </li>
        </ul>
      </li>
    `;
}

function HTMLmakeSelectOptions(make) {
  return `
      <li class="">
        <div class="dropdown__content-second__select-options">
          <input id="selectMake${make}" class="make-checkbox" type="radio" name="make" value="${make}" required>
          <label for="selectMake${make}" id="dropDown${make}Models" class="allMakesForDropdowns" >${make}&gt;</label>
        </div>
        <ul id="renderModels${make}" class="ulForHideSelectOptions ulForCarModels">
          <li class="">
            <div class="">
              <input id="new${make}ModelRadio" class="newCarModelRadio" type="radio" name="model">
              <input id="new${make}Model" class="newCarModelInput" type="text" name="new_model" placeholder="+Add new ${make} Model"/> 
            </div>
          </li>
        </ul>
      </li>
    `;
}

function HTMLmodelSelectOptions(model) {
  return `
        <li class="">
          <div class="">
            <input id="select${model}" class="model-checkbox" type="radio" name="model" value="${model}">
            <label for="select${model}" >${model}</label>
          </div>
        </li>
      `;
}
//HTML for transmission
function HTMLforTransmissionSelect() {
  return `
      <li class="">
        <div class="dropdown__content-second__select-options">
            <span id="selectTransmissionType">Cutie de viteze
              <a href="">&gt;</a>
            </span>
        </div>
        <ul id="transmissionTypeList" class="ulForHideSelectOption ulForTransmissions"></ul>
      </li>
    `;
}
function HTMLtransmissionSelectOptions(transmissionType) {
  return `
        <li class="">
          <div class="">

              <input id="select${transmissionType}" class="transmissionType-checkbox" type="radio" name="transmission_type" value="${transmissionType}" required>
              <label for="select${transmissionType}">${transmissionType}</label>

          </div>
        </li>
      `;
}
//HTML for fuel type-------------------------------------------------------------------------------------
function HTMLforFuelTypeSelect() {
  return `
      <li class="">
        <div class="dropdown__content-second__select-options">
            <span id="selectFuelType">Tip combustibil
              <a href="">&gt;</a>
            </span>
        </div>
        <ul id="fuelTypeList" class="ulForHideSelectOption ulForFuelTypes"></ul>
      </li>
    `;
}
function HTMLFuelTypeSelectOptions(fuelType) {
  return `
        <li class="">
          <div class="">

              <input id="select${fuelType}" class="fuelType-checkbox" type="radio" name="fuel_type" value="${fuelType}" required>
              <label for="select${fuelType}">${fuelType}</label>

          </div>
        </li>
      `;
}
//HTML for body type-------------------------------------------------------------------------------------
function HTMLforBodyTypeSelect() {
  return `
      <li class="">
        <div class="dropdown__content-second__select-options">
            <span id="selectBodyType">Tip caroserie
              <a href="">&gt;</a>
            </span>
        </div>
        <ul id="bodyTypeList" class="ulForHideSelectOption ulForBodyTypes"></ul>
      </li>
    `;
}
function HTMLBodyTypeSelectOptions(bodyType) {
  return `
        <li class="">
          <div class="">

              <input id="select${bodyType}" class="bodyType-checkbox" type="radio" name="body_type" value="${bodyType}" required>
              <label for="select${bodyType}">${bodyType}</label>

          </div>
        </li>
      `;
}

//HTML for do today end-------------------------------------------------------------------------------------
//HTML for TABLE start-------------------------------------------------------------------------------------
function HTMLforTable(carInfo) {
  return `
  <input id="tableDeleteCarButton" class="button" name="deleteExistingCar" type="submit" value="${carInfo.plate}" style="display: none;"/>
  <label for="tableDeleteCarButton">Delete</label>
  <tr>
      <td>${carInfo.plate}</td>
      <td>${carInfo.make}</td>
      <td>${carInfo.model}</td>
      <td>${carInfo.registrationYear}</td>
      <td>${carInfo.transmissionType}</td>
      <td>${carInfo.engineFuel}</td>
      <td>${carInfo.engineCapacity}</td>
      <td>${carInfo.bodyType}</td>
      <td>${carInfo.dorsNumber}</td>
      <td>${carInfo.passengersNumber}</td>
      <td>${carInfo.rentDaysPrice1_2}</td>
      <td>${carInfo.rentDaysPrice3_7}</td>
      <td>${carInfo.rentDaysPrice8_20}</td>
      <td>${carInfo.rentDaysPrice21_45}</td>
      <td>${carInfo.rentDaysPrice46}</td>
      <td>${carInfo.rentStatus}</td>
      <td>${carInfo.carImage}</td>
      <td>${carInfo.descriptionEn}</td>
      <td>${carInfo.descriptionRo}</td>
    </tr>
  `;
}

//HTML for TABLE end-------------------------------------------------------------------------------------

//Reusble function
//Render select options
function renderSelectOptions(addressToRender, functionToRender) {
  let addressToRenderHTML = document.getElementById(`${addressToRender}`);
  const renderToSelectHTML = functionToRender();
  addressToRenderHTML.insertAdjacentHTML("beforeend", renderToSelectHTML);
}

// ALL FUNCTION CALLS--------------------------------------------------------------------
//ALL THAT RENDER SOMETHING FOR SELECT
renderSelectOptions("makeModelToDb", HTMLforMakeModelSelect);
renderSelectOptions("transmissionTypeToDb", HTMLforTransmissionSelect);
renderSelectOptions("engineFuelToDb", HTMLforFuelTypeSelect);
renderSelectOptions("bodyTypeToDb", HTMLforBodyTypeSelect);
//ALL THAT RENDER SOMETHING FOR SELECT END

const allCarMakesModelsFromDb = makesModelsFromDb;
if (allCarMakesModelsFromDb === '') {
} else{
const forRenderMake = document.getElementById("carMakesForSelect");
renderSelectOptionsForSelect(allCarMakesModelsFromDb,forRenderMake,"make",HTMLmakeSelectOptions);
  // Show all car makes options
  allCarMakesModelsFromDb.forEach(renderCarForSelect);
}

//aplly filter for transmission
const allTransmissionTypesFromDb = transmissionsFromDb;
if (allTransmissionTypesFromDb === '') {
} else{
const forRenderTransmission = document.getElementById("transmissionTypeList");
renderSelectOptionsForSelect(allTransmissionTypesFromDb,forRenderTransmission,"transmissionType",HTMLtransmissionSelectOptions);
}

// //aplly filter for fuel type
const allEngineFuelsFromDb = engineFuelsFromDb;
if (allEngineFuelsFromDb === '') {
} else {
  const forRenderFuelType = document.getElementById("fuelTypeList");
  renderSelectOptionsForSelect(allEngineFuelsFromDb,forRenderFuelType,"engineFuel",HTMLFuelTypeSelectOptions);
}

// //aplly filter for body type
const allBodyTypesFromDb = bodyTypesFromDb;
if (allBodyTypesFromDb === '') {
} else {
  const forRenderBodyType = document.getElementById("bodyTypeList");
  renderSelectOptionsForSelect(allBodyTypesFromDb,forRenderBodyType,"bodyType",HTMLBodyTypeSelectOptions);
}
// RENDER TABLE START =====================================================================================
// Get data from the database
let carsInfoForTable = carData;
const forRenderTableRows = document.getElementById("carInfoTable");
if (carsInfoForTable === "") {
  forRenderTableRows.insertAdjacentHTML("beforeend", "No cars in Data Base");
  console.log("No cars available");
} else {
  renderTableRows(carsInfoForTable, forRenderTableRows, HTMLforTable);
}
// RENDER TABLE END =====================================================================================
// ALL FUNCTION CALLS END-----------------------------------------------------------------

//ALL FUNCTIONS FOR RENDER SOMETHING FOR SELECT
function renderCarForSelect(car) {
  const make = car.make;
  const model = car.model.split(",");

  const forRenderModels = document.getElementById(`renderModels${make}`);
  renderCarModelsForSelect(model, forRenderModels);

  let makeCheckbox = document.getElementById(`selectMake${make}`);

  let newMakeModelInput = document.getElementById(`new${make}Model`);
  let newMakeModelRadio = document.getElementById(`new${make}ModelRadio`)

newMakeModelRadio.addEventListener("change", function(){
  newMakeModelInput.setAttribute("required", "");
})
  let modelSelecetOptions = forRenderModels.querySelector(`#select${model}`)
modelSelecetOptions.addEventListener("change",function (){
  if (modelSelecetOptions.checked === true) {
    newMakeModelInput.removeAttribute("required");
  }
})

makeCheckbox.addEventListener("change", function () {
  toggleMakeCheckbox(makeCheckbox, forRenderModels);
  newMakeModelInput.setAttribute("required", "");
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
  carCharacteristic,
  functionThatReturnHTML
) {
  infoAboutCar.forEach((type) => {
    const HTMLtoRender = functionThatReturnHTML(type[carCharacteristic]);
    container.insertAdjacentHTML("beforeend", HTMLtoRender);
  });
}
function renderTableRows(infoAboutCar, container, functionThatReturnHTML) {
  infoAboutCar.forEach((type) => {
    const HTMLtoRender = functionThatReturnHTML(type);
    container.insertAdjacentHTML("beforeend", HTMLtoRender);
  });
}

function toggleMakeCheckbox(makeCheckbox, container) {
  let newModelCheckboxes = container.querySelectorAll(".newCarModelRadio");
  let modelInputs = document.querySelectorAll(".newCarModelInput");
  let newMakeInput = document.getElementById("newMakeInput");
  
  let allTogglableElements = document.querySelectorAll(".ulForHideSelectOptions")

  if (makeCheckbox.checked = true) {
    newModelCheckboxes[0].checked = true;
  }
    if (container.classList.contains("show")) {
    } else{
    allTogglableElements.forEach(e => e.classList.remove("show"))
    newMakeInput.value="";
    modelInputs.forEach(e => e.value="");
    container.classList.toggle("show");
  }
  modelInputs.forEach(e => e.removeAttribute("required"));
  newMakeInput.removeAttribute("required");
  newModelForNewMakeInput.removeAttribute("required");
}

const  newMakeRadio = document.getElementById("newMakeRadio");
const  renderNewModels = document.getElementById("renderNewModels");
const  newModelForNewMakeInput = document.getElementById("newModelForNewMakeInput");
const  newModelForNewMakeRadio = document.getElementById("newModelForNewMakeRadio");

let allTogglableElements = document.querySelectorAll(".ulForHideSelectOptions");
let newMakeInput = document.getElementById("newMakeInput");
let modelInputs = document.querySelectorAll(".newCarModelInput");
newMakeRadio.addEventListener("change", function () {

  if (newMakeRadio.checked = true) {
    newModelForNewMakeRadio.checked = true;
  }
    if (renderNewModels.classList.contains("show")) {
    } else{
    allTogglableElements.forEach(e => e.classList.remove("show"))
    newMakeInput.value="";
    modelInputs.forEach(e => e.value="");
    renderNewModels.classList.toggle("show");
  }
});
// 2 event listeer for add and remove required
newMakeRadio.addEventListener("change", function(){
  let newCarModelInput = document.querySelectorAll(".newCarModelInput");
    if (newMakeRadio.checked === true) {

      newMakeInput.setAttribute("required", "");
      newModelForNewMakeInput.setAttribute("required", "");

      newCarModelInput.forEach(e => e.removeAttribute("required"));
    }
  })





// // push value from input to radio start
const sendCarToDb = document.getElementById("sendCarToDataBase");
// //add new model to existing make
sendCarToDb.addEventListener("click", function () {
  let radioInputsValue = document.querySelectorAll(".newCarModelInput");
  let radioInputValue;
  let radioInputs = document.querySelectorAll(".newCarModelRadio");

  for (let i = 0; i < radioInputsValue.length; i++) {
    if (radioInputsValue[i].value !== undefined && radioInputsValue[i].value !== "") {
      radioInputValue = radioInputsValue[i].value;
      break;
    }
  }
  radioInputs.forEach((e) => {
    if (e.checked) {
      e.value = radioInputValue;
    }
  });
});
// add new make and new model
sendCarToDb.addEventListener("click", function () {
  let newMakeInput = document.getElementById("newMakeInput");
  let radioInputValue;
  let newMakeRadioInputs = document.getElementById("newMakeRadio");

  if (newMakeInput.value !== undefined && newMakeInput.value !== "") {
    radioInputValue = newMakeInput.value;
  }
  if (newMakeRadioInputs.checked) {
    newMakeRadioInputs.value = radioInputValue;
  }
});
// push value from input to radio end

// // allow manager tab and activate label with space and enter button ================================================================================
function handleLabelKeyPress(event) {
  if (event.key === ' ' || event.key === 'Enter') {
      event.preventDefault();
      document.getElementById('fileInput').click();
  }
}

// // allow manager tab and activate label with space and enter button ================================================================================

//show selected images

function displaySelectedImages(input) {
  let container = document.getElementById("selectedImagesContainer");
  container.innerHTML = ""; // Clear previous images
  let files = input.files;
  console.log(files);
    // Process the selected files (you can customize this part)
    for (let i = 0; i < files.length; i++) {
      let image = document.createElement("img");
      image.src = URL.createObjectURL(files[i]);
      image.style.minWidth = "100px";
      image.style.maxWidth = "100px";
      image.style.minHeight = "100px"; 
      image.style.maxHeight = "100px"; 
      container.appendChild(image);
  }
}

function checkIfImagesSelected() {
  var fileInput = document.getElementById('fileInput');
  var selectedFiles = fileInput.files;
  // Display an alert if the number of files is below the minimum or above the maximum
  if (selectedFiles.length < 6) {
    alert(
      "Please select al least " + 6 + " and no more than " + 10 + " images."
    );
    return false; // Prevent form submission
  } else if (selectedFiles.length > 10) {
    alert(
      "Please select al least " + 6 + " and no more than " + 10 + " images."
    );
    return false; // Prevent form submission
  } 

  // Continue with form submission if the condition is met
  return true;
}