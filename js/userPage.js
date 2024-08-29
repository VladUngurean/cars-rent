// userData = userData;
// rentedCarData = rentedCarData;
// Create HTML for a single car
// console.log(rentedCarData);
const createCarHTML = (car, getImages) => `
  <div id="${car.carPlate}" class="car-to-rent">
    <div class="rented-car-list__box">
      <div class="car-list__box-image">
        <img loading="lazy" role="presentation" src="/images/carsList/${getImages[0]}" alt="Car Image(gets only images PATHS from data base)">
      </div>
      <div class="car-list__box-make-model" ><h4>${car.make} - ${car.model}</h4></div>
      <div class="car-list__box-details">
      <div class="car-list__box-details-element">
        <p>Full cost</p>
        <p>${car.rentedCarFullCost} €</p>
        <p>Cashback</p>
        <p>${car.rentedCarCashback} €</p>
      </div>
      <div class="car-list__box-details-element">
        <p>Pick-up date</p>
        <p>${car.rentStartDateTime}</p>
        <p>Drop-off date</p>
        <p>${car.rentEndDateTime}</p>
        <p>Pick-up place</p>
        <p>${car.pickupPlace}</p>
      </div>
        <div class="car-list__box-details-tech"> ${createCarDetailsHTML(car)}</div>
      </div>
    </div>
  </div>
  <hr style="margin:10px 0;">
`;

// Create HTML for car details
const createCarDetailsHTML = (car) => `
  <div class="car-list__box-details-tech__item">
    <svg width="20" height="24" viewBox="0 0 20 24" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M6.78571 1.125C6.78571 0.501562 6.30804 0 5.71429 0C5.12054 0 4.64286 0.501562 4.64286 1.125V3H2.85714C1.28125 3 0 4.34531 0 6V6.75V9V21C0 22.6547 1.28125 24 2.85714 24H17.1429C18.7188 24 20 22.6547 20 21V9V6.75V6C20 4.34531 18.7188 3 17.1429 3H15.3571V1.125C15.3571 0.501562 14.8795 0 14.2857 0C13.692 0 13.2143 0.501562 13.2143 1.125V3H6.78571V1.125ZM2.14286 9H17.8571V21C17.8571 21.4125 17.5357 21.75 17.1429 21.75H2.85714C2.46429 21.75 2.14286 21.4125 2.14286 21V9Z" fill="#FEFEFE" fill-opacity="0.6"/>
    </svg>  
    <h6>An: ${car.registrationYear}</h6>
  </div>
  <div class="car-list__box-details-tech__item">
    <svg height="24px" width="20px" fill="#FEFEFE" fill-opacity="0.6" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
    viewBox="0 0 512 512" xml:space="preserve">
      <g>
        <g>
          <path d="M448,387.654V256V124.346c24.858-8.784,42.667-32.474,42.667-60.346c0-35.355-28.645-64-64-64c-35.355,0-64,28.645-64,64
            c0,27.872,17.808,51.562,42.667,60.346v110.321h-128V124.346C302.192,115.562,320,91.872,320,64c0-35.355-28.645-64-64-64
            s-64,28.645-64,64c0,27.872,17.808,51.562,42.667,60.346v110.321h-128V124.346c24.858-8.784,42.667-32.474,42.667-60.346
            c0-35.355-28.645-64-64-64s-64,28.645-64,64c0,27.872,17.808,51.562,42.667,60.346V256c0,11.782,9.551,21.333,21.333,21.333
            h149.333v110.321C209.808,396.438,192,420.128,192,448c0,35.355,28.645,64,64,64s64-28.645,64-64
            c0-27.872-17.808-51.562-42.667-60.346V277.333h128v110.321c-24.858,8.784-42.667,32.474-42.667,60.346c0,35.355,28.645,64,64,64
            c35.355,0,64-28.645,64-64C490.667,420.128,472.858,396.438,448,387.654z M426.667,42.667C438.458,42.667,448,52.209,448,64
            s-9.542,21.333-21.333,21.333S405.333,75.791,405.333,64S414.875,42.667,426.667,42.667z M256,42.667
            c11.791,0,21.333,9.542,21.333,21.333S267.791,85.333,256,85.333c-11.791,0-21.333-9.542-21.333-21.333S244.209,42.667,256,42.667
            z M85.333,42.667c11.791,0,21.333,9.542,21.333,21.333s-9.542,21.333-21.333,21.333S64,75.791,64,64S73.542,42.667,85.333,42.667z
              M256,469.333c-11.791,0-21.333-9.542-21.333-21.333s9.542-21.333,21.333-21.333c11.791,0,21.333,9.542,21.333,21.333
            S267.791,469.333,256,469.333z M426.667,469.333c-11.791,0-21.333-9.542-21.333-21.333s9.542-21.333,21.333-21.333
            S448,436.209,448,448S438.458,469.333,426.667,469.333z"/>
        </g>
      </g>
    </svg>
    <h6>${car.transmissionType}</h6>
  </div>
  <div class="car-list__box-details-tech__item">
    
    <svg width="23px" height="23px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
    <title>gas_station_fill</title>
      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <g id="Transport" transform="translate(-672.000000, -48.000000)">
          <g id="gas_station_fill" transform="translate(672.000000, 48.000000)">
            <path d="M24,0 L24,24 L0,24 L0,0 L24,0 Z M12.5934901,23.257841 L12.5819402,23.2595131 L12.5108777,23.2950439 L12.4918791,23.2987469 L12.4918791,23.2987469 L12.4767152,23.2950439 L12.4056548,23.2595131 C12.3958229,23.2563662 12.3870493,23.2590235 12.3821421,23.2649074 L12.3780323,23.275831 L12.360941,23.7031097 L12.3658947,23.7234994 L12.3769048,23.7357139 L12.4804777,23.8096931 L12.4953491,23.8136134 L12.4953491,23.8136134 L12.5071152,23.8096931 L12.6106902,23.7357139 L12.6232938,23.7196733 L12.6232938,23.7196733 L12.6266527,23.7031097 L12.609561,23.275831 C12.6075724,23.2657013 12.6010112,23.2592993 12.5934901,23.257841 L12.5934901,23.257841 Z M12.8583906,23.1452862 L12.8445485,23.1473072 L12.6598443,23.2396597 L12.6498822,23.2499052 L12.6498822,23.2499052 L12.6471943,23.2611114 L12.6650943,23.6906389 L12.6699349,23.7034178 L12.6699349,23.7034178 L12.678386,23.7104931 L12.8793402,23.8032389 C12.8914285,23.8068999 12.9022333,23.8029875 12.9078286,23.7952264 L12.9118235,23.7811639 L12.8776777,23.1665331 C12.8752882,23.1545897 12.8674102,23.1470016 12.8583906,23.1452862 L12.8583906,23.1452862 Z M12.1430473,23.1473072 C12.1332178,23.1423925 12.1221763,23.1452606 12.1156365,23.1525954 L12.1099173,23.1665331 L12.0757714,23.7811639 C12.0751323,23.7926639 12.0828099,23.8018602 12.0926481,23.8045676 L12.108256,23.8032389 L12.3092106,23.7104931 L12.3186497,23.7024347 L12.3186497,23.7024347 L12.3225043,23.6906389 L12.340401,23.2611114 L12.337245,23.2485176 L12.337245,23.2485176 L12.3277531,23.2396597 L12.1430473,23.1473072 Z" id="MingCute" fill-rule="nonzero">
            </path>
            <path d="M5,3 C3.89543,3 3,3.89543 3,5 L3,19 C2.44772,19 2,19.4477 2,20 C2,20.5523 2.44772,21 3,21 L15,21 C15.5523,21 16,20.5523 16,20 C16,19.4477 15.5523,19 15,19 L15,14 L16,14 L16,16.5 C16,17.8807 17.1193,19 18.5,19 C19.8807,19 21,17.8807 21,16.5 L21,10.4142 C21,9.88378 20.7893,9.37507 20.4142,9 L17.7071,6.29289 C17.3166,5.90237 16.6834,5.90237 16.2929,6.29289 C15.9024,6.68342 15.9024,7.31658 16.2929,7.70711 L17.3939,8.80814 C17.3676,8.84359 17.3424,8.87996 17.3185,8.91722 C17.1313,9.20781 17.0227,9.54194 17.0032,9.88702 C16.9837,10.2321 17.0539,10.5764 17.2071,10.8862 C17.3602,11.196 17.591,11.4609 17.877,11.655 C18.1631,11.849 18.4945,11.9657 18.839,11.9935 C18.8927,11.9978 18.9464,12 19,12 L19,16.5 C19,16.7761 18.7761,17 18.5,17 C18.2239,17 18,16.7761 18,16.5 L18,14 C18,12.8954 17.1046,12 16,12 L15,12 L15,5 C15,3.89543 14.1046,3 13,3 L5,3 Z M13,10 L13,5 L5,5 L5,10 L13,10 Z" fill="#FEFEFE" fill-opacity="0.6">
            </path>
          </g>
        </g>
      </g>
    </svg>
    <h6>${car.engineFuel}</h6>
  </div>
`;


// Get the container to render cars
const rentedCarsContainer = document.querySelector("#rentedCarList");

const renderRentedCars = (car) => {
  let getImages = car.imagePath.split(",");
  const productHTML = createCarHTML(car, getImages);
  rentedCarsContainer.insertAdjacentHTML("beforeend", productHTML);
};

// Function to render all cars
function renderAllRentedCars() {
  // rentedCarsContainer.innerHTML = "";
  rentedCarData.forEach(renderRentedCars);
}

//add vent listener to each car for rent and send its plate number to php
function sendCarPlateToPhp() {
  let rentedCars = document.querySelectorAll(".car-to-rent");
  // Attach a click event listener to the button
  rentedCars.forEach(e => {
      e.onclick = function() {
        console.log("hr");
        document.getElementById("hiddenValue").value = encodeURIComponent(e.id);
        document.getElementById("formToRentCarPage").submit();
      }
  })
}

// after DOM is loaded call sendCarPlateToPhp function
document.addEventListener('DOMContentLoaded', function() {
  sendCarPlateToPhp();
}, false);

// Render all cars initially
renderAllRentedCars();