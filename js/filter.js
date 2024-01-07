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
let d = "fdg";
//working example

// carsFromFilter.map((car) => {
//   // Render the make
//   const renderCarForSelect = `
//     <li class="">
//       <div id="dropdownSecond__select-options" class="dropdown__content-second__select-options">
//         <label class="" for="1">
//           <input class="" type="checkbox" id="" name="" value="">
//           <span>${car.make}
//             <a href="">&gt;</a>
//           </span>
//         </label>
//       </div>
//       <ul id="renderHereBabe"></ul>
//     </li>
//   `;
//   carSelectDropDown.insertAdjacentHTML("beforeend", renderCarForSelect);
//   // let renderHereBabe = document.getElementById("renderHereBabe");
//   // // Render the models
//   // car.models.forEach((model) => {
//   //   const renderCarForSelect2 = `
//   //     <li class="">
//   //       <div>
//   //         <label class="" for="1">
//   //           <input class="" type="checkbox" id="" name="" value="">
//   //           <span>${model}
//   //             <a href="">A2 &gt; </a>
//   //           </span>
//   //         </label>
//   //       </div>
//   //     </li>
//   //   `;
//   //   renderHereBabe.insertAdjacentHTML("beforeend", renderCarForSelect2);
//   // });
// });

let g = "fgfga"; //working example
//test example

// carsFromFilter.map((car) => {
//   // Render the make
//   const renderCarForSelect = `
//     <li class="">
//       <div id="dropdownSecond__select-options" class="dropdown__content-second__select-options">
//         <label class="" for="1">
//           <input class="" type="checkbox" id="" name="" value="">
//           <span id="showModelsSpan">${car.make}
//             <a href="">&gt;</a>
//           </span>
//         </label>
//       </div>
//       <ul id="renderHereBabe"></ul>
//     </li>
//   `;
//   carSelectDropDown.insertAdjacentHTML("beforeend", renderCarForSelect);
//   // Render the models
//   let renderHereBabe = document.getElementById("renderHereBabe");
//   car.models.forEach((model) => {
//     // if(car.make = )
//     const renderCarForSelect2 = `
//       <li class="">
//         <div>
//           <label class="" for="1">
//             <input class="" type="checkbox" id="" name="" value="">
//             <span>${model}
//               <a href="">&gt;</a>
//             </span>
//           </label>
//         </div>
//       </li>
//     `;
//     renderHereBabe.insertAdjacentHTML("beforeend", renderCarForSelect2);
//   });
// });

let h = "fgfga"; //test example

carsFromFilter.forEach((car) => {
  // Filter models based on the current car's make
  // const modelsToRender = car.filter((model) => model.make == car.make);
  // console.log(car);
  let makeToString = [`${car.make}`];
  // console.log(makeToString);
  // Render the make
  makeToString.forEach((make) => {
    console.log(make);
    const renderCarForSelect = `
    <li class="">
      <div id="dropdownSecond__select-options" class="dropdown__content-second__select-options">
        <label class="" for="1">
          <input class="" type="checkbox" id="" name="" value="">
          <span id="showModelsSpan${make}">${make}
            <a href="">&gt;</a>
          </span>
        </label>
      </div>
      <ul id="renderHereBabe${make}" class="ulForCarModels"></ul>
    </li>
  `;
    carSelectDropDown.insertAdjacentHTML("beforeend", renderCarForSelect);
  });

  let renderHereBabe = document.getElementById(`renderHereBabe${car.make}`);
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
});

console.log(carsFromFilter);
console.log(carsFromFilter[0].models);
