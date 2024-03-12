// const carImagesForSwiper = (getImages) =>{
//   for (let i = 0; i < getImages.length; i++) {
//     return `<img src="/images/carsList/${getImages[i]}" alt="carImage">`    
//   }
// }
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

// Get the container to render cars
// const swiperContainer = document.querySelector(".swiper-wrapper");
const carsContainer = document.querySelector("#selected-car-images");

const renderCars = (car) => {
  let getImages = car.carImage.split(",");
  const productHTML = createCarHTML(car, getImages);
  // const carImages = createCarHTML(car);
  carsContainer.insertAdjacentHTML("beforeend", productHTML);
  // swiperContainer.insertAdjacentHTML("beforeend", carImages);
};

// Function to render all cars
function renderAllCars() {
  // carsContainer.innerHTML = "";
  carToRent.forEach(renderCars);
}

// Render all cars initially
renderAllCars();