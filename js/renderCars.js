document.addEventListener("DOMContentLoaded", function () {
  // Access the PHP data in JavaScript
  const dataFromPHP = carData;
  console.log(dataFromPHP);

  // Process the data and dynamically create HTML elements
  const carsContainer = document.querySelector("#car-list-render");

  dataFromPHP.forEach((car) => {
    const productHTML = `<div class="car-list__box">
                            <img src="${car.carImage}" alt="carImage">
                            <h4 >${car.makeTitle}</h4>
                            <div class="car-list__box-details">

                                <div class="car-list__box-details__price">De la <span>${car.rentDaysPrice46} €</span>/Zi</div>

                                <div class="car-list__box-details-tech">
                                    <div class="car-list__box-details-tech__item">
                                        <img src="/images/icons/calendarIcon.png" alt="time">
                                        <div> An: ${car.registrationYear}</div>
                                    </div>

                                    <div class="car-list__box-details-tech__item">
                                        <img src="/images/icons/gear.png" alt="transmission">
                                        <div>${car.transmissionType}</div>
                                    </div>

                                    <div class="car-list__box-details-tech__item">
                                        <img src="/images/icons/fuel.png" alt="fuelType">
                                        <div> ${car.engineFuel}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="car-list__box-link">
                                <a href="#" >Inchiriaza</a>
                            </div>
					    </div>`;
    carsContainer.insertAdjacentHTML("beforeend", productHTML);
  });
});

//FOR SELECT DATE AND HOURS STRT

// Set the default value to the current date
var currentDate = new Date().toISOString().split("T")[0];
document.getElementById("datePicker").value = currentDate;

// You can still access the selected date using JavaScript
document.getElementById("datePicker").addEventListener("change", function () {
  var selectedDate = this.value;
  console.log("Selected Date:", selectedDate);
});

// Set the default value to the current time
var currentTime = new Date().toLocaleTimeString([], {
  hour: "2-digit",
  minute: "2-digit",
});
document.getElementById("timePicker").value = currentTime;

// You can still access the selected time using JavaScript
document.getElementById("timePicker").addEventListener("change", function () {
  var selectedTime = this.value;
  console.log("Selected Time:", selectedTime);
});

//test
var currentTime = new Date().toLocaleTimeString([], {
  hour: "0-digit",
  minute: "0-digit",
});
document.getElementById("timePickerReturn").value = currentTime;

// You can still access the selected time using JavaScript
document
  .getElementById("timePickerReturn")
  .addEventListener("change", function () {
    var selectedTime = this.value;
    console.log("Selected Time:", selectedTime);
  });

//FOR SELECT DATE AND HOURS END
