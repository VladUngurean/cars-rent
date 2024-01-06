const carsInfoFromPHP = carData; //GET DATA FROM DATABASE
console.log(carsInfoFromPHP);
let carSelectDropDown = document.getElementById("selectmake");

// const makeList = carsInfoFromPHP.map((car) => car.make);
// const modelList = carsInfoFromPHP.map((car) => car.model);
// const transmissionList = carsInfoFromPHP.map((car) => car.transmissionType);

// function makeUnique(arr) {
//   return [...new Set(arr)];
// }

// const carsInfoFromPHP = [
//   { make: "Toyota", model: "Camry", transmissionType: "Automatic" },
//   { make: "Honda", model: "Civic", transmissionType: "Manual" },
//   // Add more cars as needed
// ];
// function createJsonArray(inputArray) {
//   // Initialize an empty array to store the JSON objects
//   const jsonArray = [];

//   // Iterate over each element in the input array
//   inputArray.forEach((element) => {
//     // Destructure the element to extract required values
//     const { make, transmissionType, registrationYear, model, bodyType } =
//       element;

//     // Create a JSON object with the specified keys and values
//     const jsonObject = {
//       make,
//       details: {
//         transmissionType,
//         registrationYear,
//         model,
//         bodyType,
//       },
//     };

//     // Push the JSON object to the result array
//     jsonArray.push(jsonObject);
//   });

//   return jsonArray;
// }

// function accumulateDetailsByCarMake(inputArray) {
//   const uniqueMakes = {};

//   // Iterate over each element in the input array
//   inputArray.forEach((element) => {
//     const { make, transmissionType, registrationYear, model, bodyType } =
//       element;

//     // Check if make already exists in the uniqueMakes object
//     if (!uniqueMakes[make]) {
//       // If it doesn't exist, create a new entry
//       uniqueMakes[make] = {
//         make,
//         details: {
//           transmissionTypes: [transmissionType],
//           registrationYears: [registrationYear],
//           models: [model],
//           bodyTypes: [bodyType],
//         },
//       };
//     } else {
//       // If it exists, push details to the existing entry
//       uniqueMakes[make].details.transmissionTypes.push(transmissionType);
//       uniqueMakes[make].details.registrationYears.push(registrationYear);
//       uniqueMakes[make].details.models.push(model);
//       uniqueMakes[make].details.bodyTypes.push(bodyType);
//     }
//   });

//   // Convert the values of uniqueMakes object to an array
//   const jsonArray = Object.values(uniqueMakes);

//   return jsonArray;
// }
function accumulateUniqueDetailsByCarMake(inputArray) {
  const uniqueMakes = {};

  // Iterate over each element in the input array
  inputArray.forEach((element) => {
    const { make, transmissionType, registrationYear, model, bodyType } =
      element;

    // Check if make already exists in the uniqueMakes object
    if (!uniqueMakes[make]) {
      // If it doesn't exist, create a new entry
      uniqueMakes[make] = {
        make,
        details: {
          transmissionTypes: new Set([transmissionType]),
          registrationYears: new Set([registrationYear]),
          models: new Set([model]),
          bodyTypes: new Set([bodyType]),
        },
      };
    } else {
      // If it exists, add details to the existing entry
      uniqueMakes[make].details.transmissionTypes.add(transmissionType);
      uniqueMakes[make].details.registrationYears.add(registrationYear);
      uniqueMakes[make].details.models.add(model);
      uniqueMakes[make].details.bodyTypes.add(bodyType);
    }
  });

  // Convert the values of uniqueMakes object to an array
  const jsonArray = Object.values(uniqueMakes);

  return jsonArray;
}

const result = accumulateUniqueDetailsByCarMake(carsInfoFromPHP);
console.log(result);

// const result = accumulateDetailsByCarMake(carsInfoFromPHP);
// console.log(result);

// const result = createJsonArray(carsInfoFromPHP);
// const result2 = createUniqueJsonArray(carsInfoFromPHP);
// console.log(result);
// console.log(result2);
