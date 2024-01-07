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

carsFromFilter.forEach((car) => {
  // Filter models based on the current car's make

  let makeToString = [`${car.make}`];
  console.log(makeToString);
  // Render the make
  makeToString.forEach((make) => {
    console.log(make);
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
    let testttt = document.getElementById(`dropDown${car.make}Models`);
    let renderHereBabe = document.getElementById(`renderModels${car.make}`);
    // Render the filtered models
    car.models.forEach((model) => {
      console.log(model);
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

    // when click on menu button it toggles 'show' and check if second dropdown is actvie then it close it
    testttt.addEventListener("click", function () {
      renderHereBabe.classList.toggle("show");
      console.log(renderHereBabe);
      // // let secondDropdown = document.getElementById(`${renderHereBabe}`);
      // // console.log(secondDropdown.classList);
      // if (secondDropdown.classList.contains("show")) {
      //   secondDropdown.classList.remove("show");
      // }
    });
  });
});
