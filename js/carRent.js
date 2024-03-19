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
const createCarHTML = (car, getImages) => `
  <div id="${car.plate}" class="car-to-rent">
    <div class="car-list__box">
      <img src="/images/carsList/${getImages[0]}" alt="carImage">
      <div class="car-list__box-make-model" ><h4>${car.make} - ${car.model}</h4></div>
      <div class="car-list__box-details">
        <div class="car-list__box-details-price">
          <h5>${car.rentDaysPrice46}€/Zi</h5>
        </div>
        <div class="car-list__box-details-tech"> ${createCarDetailsHTML(car)}</div>
      </div>
    </div>
  </div>
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

const containerForSelectedCarTechDetails = document.getElementById("selected-car-description")

const renderCars = (car) => {
  let getImages = car.carImage.split(",");
  const createCarDetailsToHTML = createCarDetailsHTML(car);

  containerForSelectedCarTechDetails.insertAdjacentHTML("beforeend", createCarDetailsToHTML);

  createSwiper(getImages);
};

// Function to render all cars
function renderAllCars() {
  selecterCarToRent.forEach(renderCars);
}

// Render all cars initially
renderAllCars();
