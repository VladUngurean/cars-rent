const carsContainer = document.querySelector("#car-list-render");

getProducts();

async function getProducts() {
  const response = await fetch("/public/js/carsList.json");
  const carsArray = await response.json();
  renderCars(carsArray);
  // console.log(carsArray);
}

function renderCars(carsArray) {
  carsArray.forEach(function (item) {
    const productHTML = `<div class="car-list__box">
                            <img src="/public/images/carsList${item.imgSrc}" alt="carImage">
                            <h4 >${item.title}</h4>
                            <div class="car-list__box-details">

                                <div class="car-list__box-details__price">De la <span>${item.price} €</span>/Zi</div>

                                <div class="car-list__box-details-tech">
                                    <div class="car-list__box-details-tech__item"> 
                                        <img src="/public/images/icons/calendarIcon.png" alt="time">
                                        <p> An: ${item.firstRegistration}</p>
                                    </div>

                                    <div class="car-list__box-details-tech__item">                                            
                                        <img src="/public/images/icons/gear.png" alt="transmission">
                                        <div>${item.transmission}</div>
                                    </div>

                                    <div class="car-list__box-details-tech__item"> 
                                        <img src="/public/images/icons/fuel.png" alt="fuelType">
                                        <div> ${item.fuelType}</div>
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
