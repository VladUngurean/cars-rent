const selecterCarToRent = carToRent;
// Get the container to render cars
const swiperContainer = document.querySelector(".swiper-wrapper");
const carsContainer = document.querySelector("#selected-car-images");

const carImagesForSwiper = (car) =>{
  let getImages = car.carImage.split(",");
  for (let i = 0; i < getImages.length; i++) {
    return `<img src="/images/carsList/${getImages[i]}" alt="carImage">`    
  }
}
// Create HTML for a single car
const createPriceTableHTML = (car) => `
  <tr>
    <td>${car.rentDaysPrice1_2}</td>
    <td>${car.rentDaysPrice3_7}</td>
    <td>${car.rentDaysPrice8_20}</td>
    <td>${car.rentDaysPrice21_45}</td>
    <td>${car.rentDaysPrice46}</td>
  </tr>
`;

const createCarDetailsHTML = (car) => `
  <div class="selected-car-make-model">
    <h1>${car.make} - ${car.model}</h1>
  </div>

  <div class="selected-car-characteristics">
    <div class="selected-car-characteristics-item">
      <img src="/images/icons/calendar.svg" alt="time">
      <h6>An: ${car.registrationYear}</h6>
    </div>
    <div class="selected-car-characteristics-item">
      <img src="/images/icons/gearbox.svg" alt="time">
      <h6>Cutia: ${car.transmissionType}</h6>
    </div>
    <div class="selected-car-characteristics-item">
      <img src="/images/icons/gasstation.svg" alt="time">
      <h6>Motor: ${car.engineFuel}</h6>
    </div>
    <div class="selected-car-characteristics-item">
      <img src="/images/icons/speed-meter.svg" alt="time">
      <h6>Capacitate cilindrică: ${car.engineCapacity}</h6>
    </div>
    <div class="selected-car-characteristics-item">
      <img src="/images/icons/sedan-car.svg" alt="time">
      <h6>Tip Caroserie: ${car.bodyType}</h6>
    </div>
    <div class="selected-car-characteristics-item">
      <img src="/images/icons/car-door.svg" alt="time">
      <h6>Număr uși: ${car.dorsNumber}</h6>
    </div>
    <div class="selected-car-characteristics-item">
      <img src="/images/icons/passenger.svg" alt="time">
      <h6>Număr pasageri: ${car.passengersNumber}</h6>
    </div>
  </div>

  <div class="selected-car-description">
    <p>${car.descriptionRo}</p>
  </div>
`;
//swiper start
const createCarImageHTML = (imagePath) => `<img src="/images/carsList/${imagePath}" alt="carImage">`;

const createSwiperComponents = (parent) => {
  const createDivWithClasses = (classNames) => {
    const createDiv = document.createElement('div');
    createDiv.classList.add(...classNames);
    return createDiv;
  };

  parent.appendChild(createDivWithClasses(['swiper-wrapper']));
  parent.appendChild(createDivWithClasses(['swiper-pagination']));
  parent.appendChild(createDivWithClasses(['swiper-button', 'swiper-button-prev']));
  parent.appendChild(createDivWithClasses(['swiper-button', 'swiper-button-next']));
};

function createSwiper(imagesFromDB) {
  const parent = document.querySelector(".swiper");
  createSwiperComponents(parent);
  
  const swiperWrapperDiv = parent.querySelector('.swiper-wrapper');
  imagesFromDB.forEach(image => {
    swiperWrapperDiv.insertAdjacentHTML("beforeend", `<div class="swiper-slide">${createCarImageHTML(image)}</div>`);
  });
}
//swiper end

//get container element and place in, data from DB
function insertHtmlToPage(idOfContainer, funcWithHtml) {
  document.getElementById(idOfContainer).insertAdjacentHTML("beforeend", funcWithHtml);
}

//
const combineHTMLNeededForSelectedCar = (car) => {
  //split string of car images paths from DB
  let getImages = car.carImage.split(",");

  //insert car  html to container from page
  insertHtmlToPage("selected-car-description", createCarDetailsHTML(car))
  insertHtmlToPage("carRentPriceTable", createPriceTableHTML(car))

  //place in swiper element its custom options and images from DB
  createSwiper(getImages);
};

// render selected car info
function renderSelectedCarInfo() {
  selecterCarToRent.forEach(combineHTMLNeededForSelectedCar);
}
renderSelectedCarInfo();
