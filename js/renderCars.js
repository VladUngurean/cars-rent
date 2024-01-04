const carsContainer = document.querySelector("#car-list-render");

getProducts();

async function getProducts() {
  const response = await fetch("/js/carsList.json");
  const carsArray = await response.json();
  renderCars(carsArray);
  // console.log(carsArray);
}

function renderCars(carsArray) {
  carsArray.forEach(function (car) {
    const productHTML = `<div class="car-list__box">
                            <img src="/images/carsList${car.imgSrc}" alt="carImage">
                            <h4 >${car.title}</h4>
                            <div class="car-list__box-details">

                                <div class="car-list__box-details__price">De la <span>${car.price} €</span>/Zi</div>

                                <div class="car-list__box-details-tech">
                                    <div class="car-list__box-details-tech__item">
                                        <img src="/images/icons/calendarIcon.png" alt="time">
                                        <p> An: ${car.firstRegistration}</p>
                                    </div>

                                    <div class="car-list__box-details-tech__item">
                                        <img src="/images/icons/gear.png" alt="transmission">
                                        <div>${car.transmission}</div>
                                    </div>

                                    <div class="car-list__box-details-tech__item">
                                        <img src="/images/icons/fuel.png" alt="fuelType">
                                        <div> ${car.fuelType}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="car-list__box-link">
                              <a href="#" >Inchiriaza</a>
                            </div>
					                </div>`;
    carsContainer.insertAdjacentHTML("beforeend", productHTML);
  });
}
