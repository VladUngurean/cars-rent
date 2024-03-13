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
  <div id="${car.plate}" class="car-to-rent" href="carRentPage.php">
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
// Create HTML for car details
const createCarDetailsHTML = (car) => `
  <div class="car-list__box-details-tech__item">
      <img src="/images/icons/calendar.svg" alt="time">
      <h6>An: ${car.registrationYear}</h6>
  </div>
  <div class="car-list__box-details-tech__item">
      <img src="/images/icons/gearbox.svg" alt="transmission">
      <h6>${car.transmissionType}</h6>
  </div>
  <div class="car-list__box-details-tech__item">
      <img src="/images/icons/gasstation.svg" alt="fuelType">
      <h6>${car.engineFuel}</h6>
  </div>
`;


const renderCars = (car) => {
  let getImages = car.carImage.split(",");
  const productHTML = createCarHTML(car, getImages);
  // const carImages = carImagesForSwiper(car);
  carsContainer.insertAdjacentHTML("beforeend", productHTML);
  // swiperContainer.insertAdjacentHTML("beforeend", carImages);


  const parent = document.querySelector(".swiper");

  // Create swiper wrapper div
  const swiperWrapperDiv = document.createElement('div');
  swiperWrapperDiv.classList.add('swiper-wrapper');
  // Create swiper wrapper div
  const swiperPaginationDiv = document.createElement('div');
  swiperPaginationDiv.classList.add('swiper-pagination');
  // Create swiper wrapper div
  const swiperButtonPrevDiv = document.createElement('div');
  swiperButtonPrevDiv.classList.add('swiper-button-prev');
  // Create swiper wrapper div
  const swiperButtonNextDiv = document.createElement('div');
  swiperButtonNextDiv.classList.add('swiper-button-next');

  // Append wrapper div to swiper div
  parent.appendChild(swiperWrapperDiv);
  parent.appendChild(swiperPaginationDiv);
  parent.appendChild(swiperButtonPrevDiv);
  parent.appendChild(swiperButtonNextDiv);

  getImages.forEach(e => {
    swiperWrapperDiv.insertAdjacentHTML("beforeend", `<div class="swiper-slide"><img src="/images/carsList/${e}" alt="carImage"></div>` );
  })
};

// Function to render all cars
function renderAllCars() {
  // carsContainer.innerHTML = "";
  selecterCarToRent.forEach(renderCars);
}

// Render all cars initially
renderAllCars();
