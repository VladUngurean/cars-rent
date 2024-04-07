const selectedCarToRent = carToRent;
console.log(selectedCarToRent);
// Get the container to render cars
const swiperContainer = document.querySelector(".swiper-wrapper");
const carsContainer = document.querySelector("#selected-car-images");

const carImagesForSwiper = (car) =>{
  let getImages = car.carImage.split(",");
  for (let i = 0; i < getImages.length; i++) {
    return `<img loading="lazy" role="presentation" src="/images/carsList/${getImages[i]}" alt="carImage">`    
  }
}
// Create HTML for a single car
const createPriceTableHTML = (car) => `
  <tr>
    <td>${car.rentDaysPrice1_2} $</td>
    <td>${car.rentDaysPrice3_7} $</td>
    <td>${car.rentDaysPrice8_20} $</td>
    <td>${car.rentDaysPrice21_45} $</td>
    <td>${car.rentDaysPrice46} $</td>
  </tr>
`;

const createCarDetailsHTML = (car) => `
  <div class="selected-car-make-model">
    <h1>${car.make} - ${car.model}</h1>
  </div>

  <div class="selected-car-characteristics">
    <div class="selected-car-characteristics-item">
      <svg width="24px" height="20" viewBox="0 0 20 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M6.78571 1.125C6.78571 0.501562 6.30804 0 5.71429 0C5.12054 0 4.64286 0.501562 4.64286 1.125V3H2.85714C1.28125 3 0 4.34531 0 6V6.75V9V21C0 22.6547 1.28125 24 2.85714 24H17.1429C18.7188 24 20 22.6547 20 21V9V6.75V6C20 4.34531 18.7188 3 17.1429 3H15.3571V1.125C15.3571 0.501562 14.8795 0 14.2857 0C13.692 0 13.2143 0.501562 13.2143 1.125V3H6.78571V1.125ZM2.14286 9H17.8571V21C17.8571 21.4125 17.5357 21.75 17.1429 21.75H2.85714C2.46429 21.75 2.14286 21.4125 2.14286 21V9Z" fill="#FEFEFE" fill-opacity="0.6"/>
      </svg>    
      <h6>An: ${car.registrationYear}</h6>
    </div>
    
    <div class="selected-car-characteristics-item">
      <svg width="24px" height="20" fill="#FEFEFE" fill-opacity="0.6" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
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
      <h6>Cutia: ${car.transmissionType}</h6>
    </div>

    <div class="selected-car-characteristics-item">
      <svg width="24px" height="20px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
      <title>gas_station_fill</title>
        <g id="页面-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
          <g id="Transport" transform="translate(-672.000000, -48.000000)">
            <g id="gas_station_fill" transform="translate(672.000000, 48.000000)">
              <path d="M24,0 L24,24 L0,24 L0,0 L24,0 Z M12.5934901,23.257841 L12.5819402,23.2595131 L12.5108777,23.2950439 L12.4918791,23.2987469 L12.4918791,23.2987469 L12.4767152,23.2950439 L12.4056548,23.2595131 C12.3958229,23.2563662 12.3870493,23.2590235 12.3821421,23.2649074 L12.3780323,23.275831 L12.360941,23.7031097 L12.3658947,23.7234994 L12.3769048,23.7357139 L12.4804777,23.8096931 L12.4953491,23.8136134 L12.4953491,23.8136134 L12.5071152,23.8096931 L12.6106902,23.7357139 L12.6232938,23.7196733 L12.6232938,23.7196733 L12.6266527,23.7031097 L12.609561,23.275831 C12.6075724,23.2657013 12.6010112,23.2592993 12.5934901,23.257841 L12.5934901,23.257841 Z M12.8583906,23.1452862 L12.8445485,23.1473072 L12.6598443,23.2396597 L12.6498822,23.2499052 L12.6498822,23.2499052 L12.6471943,23.2611114 L12.6650943,23.6906389 L12.6699349,23.7034178 L12.6699349,23.7034178 L12.678386,23.7104931 L12.8793402,23.8032389 C12.8914285,23.8068999 12.9022333,23.8029875 12.9078286,23.7952264 L12.9118235,23.7811639 L12.8776777,23.1665331 C12.8752882,23.1545897 12.8674102,23.1470016 12.8583906,23.1452862 L12.8583906,23.1452862 Z M12.1430473,23.1473072 C12.1332178,23.1423925 12.1221763,23.1452606 12.1156365,23.1525954 L12.1099173,23.1665331 L12.0757714,23.7811639 C12.0751323,23.7926639 12.0828099,23.8018602 12.0926481,23.8045676 L12.108256,23.8032389 L12.3092106,23.7104931 L12.3186497,23.7024347 L12.3186497,23.7024347 L12.3225043,23.6906389 L12.340401,23.2611114 L12.337245,23.2485176 L12.337245,23.2485176 L12.3277531,23.2396597 L12.1430473,23.1473072 Z" id="MingCute" fill-rule="nonzero">
              </path>
              <path d="M5,3 C3.89543,3 3,3.89543 3,5 L3,19 C2.44772,19 2,19.4477 2,20 C2,20.5523 2.44772,21 3,21 L15,21 C15.5523,21 16,20.5523 16,20 C16,19.4477 15.5523,19 15,19 L15,14 L16,14 L16,16.5 C16,17.8807 17.1193,19 18.5,19 C19.8807,19 21,17.8807 21,16.5 L21,10.4142 C21,9.88378 20.7893,9.37507 20.4142,9 L17.7071,6.29289 C17.3166,5.90237 16.6834,5.90237 16.2929,6.29289 C15.9024,6.68342 15.9024,7.31658 16.2929,7.70711 L17.3939,8.80814 C17.3676,8.84359 17.3424,8.87996 17.3185,8.91722 C17.1313,9.20781 17.0227,9.54194 17.0032,9.88702 C16.9837,10.2321 17.0539,10.5764 17.2071,10.8862 C17.3602,11.196 17.591,11.4609 17.877,11.655 C18.1631,11.849 18.4945,11.9657 18.839,11.9935 C18.8927,11.9978 18.9464,12 19,12 L19,16.5 C19,16.7761 18.7761,17 18.5,17 C18.2239,17 18,16.7761 18,16.5 L18,14 C18,12.8954 17.1046,12 16,12 L15,12 L15,5 C15,3.89543 14.1046,3 13,3 L5,3 Z M13,10 L13,5 L5,5 L5,10 L13,10 Z" id="形状" fill="#FEFEFE" fill-opacity="0.6">
              </path>
            </g>
          </g>
        </g>
      </svg>
      <h6>Motor: ${car.engineFuel}</h6>
    </div>

    <div class="selected-car-characteristics-item">
      <svg width="24px" height="20px" fill="#FEFEFE" fill-opacity="0.6" height="800px" width="800px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
      viewBox="0 0 612 612" xml:space="preserve">
        <g>
          <g>
            <path d="M175.205,239.62c0.127-1.965-0.533-3.902-1.833-5.381l-58.84-66.941c-1.3-1.479-3.135-2.381-5.102-2.508
              c-1.975-0.126-3.902,0.533-5.381,1.833c-27.037,23.766-49.479,51.794-66.706,83.305c-0.944,1.729-1.165,3.762-0.611,5.651
              c0.554,1.89,1.836,3.483,3.565,4.427l78.205,42.748c1.131,0.619,2.352,0.912,3.557,0.912c2.627,0,5.174-1.398,6.523-3.866
              c11.386-20.828,26.229-39.359,44.114-55.08C174.178,243.422,175.08,241.587,175.205,239.62z"/>
            <path d="M201.462,214.829c1.334,2.515,3.907,3.948,6.568,3.948c1.174,0,2.365-0.279,3.473-0.867
              c20.962-11.117,43.512-18.371,67.025-21.561c4.064-0.551,6.913-4.293,6.362-8.358l-11.979-88.316
              c-0.551-4.064-4.304-6.909-8.358-6.362c-35.708,4.843-69.949,15.857-101.772,32.736c-3.623,1.922-5.002,6.416-3.082,10.041
              L201.462,214.829z"/>
            <path d="M105.785,334.345l-86.017-23.338c-1.901-0.514-3.929-0.255-5.638,0.725s-2.958,2.598-3.475,4.499
              C3.586,342.295,0,369.309,0,396.523c0,4.657,0.111,9.329,0.342,14.284c0.185,3.981,3.468,7.083,7.414,7.083
              c0.116,0,0.234-0.002,0.35-0.008l89.031-4.113c1.967-0.09,3.82-0.96,5.145-2.415c1.327-1.455,2.022-3.38,1.93-5.347
              c-0.155-3.341-0.23-6.444-0.23-9.484c0-18.02,2.365-35.873,7.029-53.066C112.082,339.499,109.743,335.42,105.785,334.345z"/>
            <path d="M438.731,120.745c-32.411-15.625-67.04-25.308-102.925-28.786c-1.972-0.198-3.918,0.408-5.439,1.659
              c-1.521,1.252-2.481,3.056-2.671,5.018l-8.593,88.712c-0.396,4.082,2.594,7.713,6.677,8.108
              c23.652,2.291,46.463,8.669,67.8,18.954c1.015,0.49,2.118,0.738,3.225,0.738c0.826,0,1.654-0.139,2.45-0.416
              c1.859-0.649,3.385-2.012,4.24-3.786l38.7-80.287C443.978,126.965,442.427,122.525,438.731,120.745z"/>
            <path d="M569.642,245.337c0.48-1.911,0.184-3.932-0.828-5.624c-18.432-30.835-41.933-57.983-69.848-80.686
              c-1.529-1.242-3.48-1.824-5.447-1.627c-1.959,0.203-3.758,1.174-5,2.702l-56.237,69.144c-1.242,1.529-1.828,3.488-1.625,5.447
              c0.201,1.959,1.173,3.758,2.702,5.002c18.47,15.019,34.015,32.975,46.205,53.369c1.392,2.326,3.855,3.618,6.383,3.618
              c1.297,0,2.61-0.34,3.803-1.054l76.501-45.728C567.94,248.889,569.16,247.248,569.642,245.337z"/>
            <path d="M598.044,304.939c-1.228-3.915-5.397-6.096-9.308-4.867l-85.048,26.648c-3.915,1.226-6.093,5.393-4.867,9.306
              c6.104,19.486,9.199,39.839,9.199,60.494c0,3.041-0.076,6.144-0.23,9.484c-0.092,1.967,0.602,3.892,1.93,5.347
              c1.327,1.456,3.178,2.325,5.145,2.415l89.031,4.113c0.118,0.005,0.234,0.008,0.35,0.008c3.944,0,7.228-3.103,7.414-7.083
              c0.229-4.955,0.342-9.627,0.342-14.284C612,365.306,607.306,334.494,598.044,304.939z"/>
            <path d="M305.737,380.755c-1.281,0-2.555,0.042-3.824,0.11l-120.65-71.185c-2.953-1.745-6.702-1.308-9.176,1.065
              c-2.476,2.371-3.07,6.099-1.456,9.121l65.815,123.355c-0.242,2.376-0.371,4.775-0.371,7.195c0,18.608,7.246,36.101,20.403,49.258
              c13.158,13.158,30.652,20.404,49.26,20.404c18.608,0,36.101-7.248,49.258-20.404c13.158-13.157,20.403-30.65,20.403-49.258
              c0-18.608-7.246-36.101-20.403-49.258C341.839,388.001,324.344,380.755,305.737,380.755z"/>
          </g>
        </g>
      </svg>
      <h6>Capacitate cilindrică: ${car.engineCapacity}</h6>
    </div>

    <div class="selected-car-characteristics-item">
      <svg width="24px" height="20px" fill="#FEFEFE" fill-opacity="0.6" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="800px" height="800px" viewBox="0 0 98.967 98.967" xml:space="preserve" transform="matrix(-1, 0, 0, 1, 0, 0)">
        <g id="SVGRepo_bgCarrier" stroke-width="0"/>        
        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>
        <g id="SVGRepo_iconCarrier"> <g> <g> <path d="M17.275,52.156c-4.124,0-7.468,3.343-7.468,7.468c0,0.318,0.026,0.631,0.066,0.938c0.463,3.681,3.596,6.528,7.401,6.528 c3.908,0,7.112-3.004,7.437-6.83c0.017-0.209,0.031-0.422,0.031-0.637C24.743,55.499,21.4,52.156,17.275,52.156z M13.537,56.81 l1.522,1.523c-0.118,0.203-0.211,0.422-0.271,0.656h-2.146C12.752,58.177,13.063,57.435,13.537,56.81z M12.632,60.282h2.163 c0.061,0.23,0.151,0.448,0.271,0.648l-1.526,1.525C13.067,61.835,12.749,61.093,12.632,60.282z M16.629,64.263 c-0.809-0.113-1.544-0.43-2.166-0.899l1.518-1.519c0.2,0.117,0.419,0.203,0.648,0.263V64.263z M16.629,57.14 c-0.235,0.062-0.455,0.154-0.66,0.275l-1.521-1.521c0.625-0.475,1.367-0.789,2.181-0.902V57.14z M17.922,54.99 c0.814,0.113,1.557,0.429,2.181,0.903l-1.52,1.521c-0.204-0.121-0.426-0.213-0.66-0.275L17.922,54.99L17.922,54.99z M17.922,64.261v-2.152c0.23-0.061,0.447-0.146,0.647-0.264l1.519,1.519C19.466,63.833,18.73,64.148,17.922,64.261z M21.014,62.462l-1.531-1.533c0.12-0.201,0.217-0.416,0.278-0.646h2.146C21.793,61.091,21.488,61.839,21.014,62.462z M19.764,58.989c-0.061-0.234-0.153-0.453-0.271-0.656l1.524-1.523c0.471,0.625,0.782,1.367,0.894,2.18H19.764z"/> <path d="M79.284,52.156c-4.124,0-7.468,3.343-7.468,7.468c0,0.318,0.026,0.631,0.066,0.938c0.463,3.681,3.596,6.528,7.4,6.528 c3.908,0,7.112-3.004,7.438-6.83c0.017-0.209,0.031-0.422,0.031-0.637C86.753,55.499,83.409,52.156,79.284,52.156z M75.546,56.81 l1.521,1.523c-0.118,0.203-0.211,0.422-0.271,0.656H74.65C74.761,58.177,75.072,57.435,75.546,56.81z M74.642,60.282h2.163 c0.061,0.23,0.151,0.448,0.271,0.648l-1.525,1.525C75.076,61.835,74.757,61.093,74.642,60.282z M78.638,64.263 c-0.809-0.113-1.544-0.43-2.166-0.899l1.518-1.519c0.2,0.117,0.419,0.203,0.648,0.263V64.263z M78.638,57.14 c-0.235,0.062-0.455,0.154-0.66,0.275l-1.521-1.521c0.625-0.475,1.366-0.789,2.181-0.902V57.14z M79.932,54.99 c0.814,0.113,1.557,0.429,2.181,0.903l-1.521,1.521c-0.204-0.121-0.426-0.215-0.66-0.275V54.99z M79.932,64.261v-2.152 c0.23-0.061,0.447-0.146,0.647-0.264l1.519,1.519C81.476,63.833,80.739,64.148,79.932,64.261z M83.023,62.462l-1.531-1.531 c0.12-0.202,0.218-0.416,0.278-0.647h2.146C83.802,61.091,83.498,61.839,83.023,62.462z M81.773,58.989 c-0.061-0.234-0.152-0.453-0.271-0.656l1.523-1.523c0.472,0.625,0.782,1.367,0.895,2.18H81.773z"/> <path d="M97.216,48.29v-5.526c0-0.889-0.646-1.642-1.524-1.779c-2.107-0.33-5.842-0.953-7.52-1.47 c-2.406-0.742-11.702-4.678-14.921-5.417c-3.22-0.739-17.738-4.685-31.643,0.135c-2.353,0.815-12.938,5.875-19.162,8.506 c-1.833,0.04-19.976,3.822-20.942,6.414c-0.966,2.593-1.269,3.851-1.447,4.509c-0.178,0.658,0,3.807,1.348,6 c1.374,0.777,4.019,1.299,7.077,1.649c-0.035-0.187-0.073-0.371-0.097-0.56c-0.053-0.404-0.078-0.773-0.078-1.125 c0-4.945,4.022-8.969,8.968-8.969s8.968,4.023,8.968,8.969c0,0.254-0.017,0.506-0.036,0.754c-0.047,0.555-0.147,1.094-0.292,1.613 c0.007,0,0.024,0,0.024,0l44.516-0.896c-0.02-0.115-0.046-0.229-0.061-0.346c-0.053-0.402-0.078-0.772-0.078-1.125 c0-4.945,4.022-8.968,8.968-8.968c4.946,0,8.969,4.022,8.969,8.968c0,0.019-0.002,0.035-0.003,0.053l0.19-0.016l7.611-1.433 c0,0,2.915-1.552,2.915-5.822C98.967,49.56,97.216,48.29,97.216,48.29z M53.057,43.051L36.432,43.56 c0.306-2.491-1.169-3.05-1.169-3.05c6.609-5.999,19.929-6.202,19.929-6.202L53.057,43.051z M71.715,42.29l-15.15,0.509l1.373-8.49 c7.83-0.102,12.303,1.626,12.303,1.626l2.237,3.61L71.715,42.29z M80.256,42.238h-4.221l-4.22-5.795 c3.166,1.26,5.7,2.502,7.209,3.287C79.94,40.206,80.44,41.223,80.256,42.238z"/> </g> </g> </g>
      </svg>
      <h6>Tip Caroserie: ${car.bodyType}</h6>
    </div>

    <div class="selected-car-characteristics-item">
    <svg fill="#FEFEFE" fill-opacity="0.6" width="24px" height="20px" viewBox="0 0 24 24" id="car-door-left-1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" class="icon line"><path id="primary" d="M12.29,3.29,20,11v4.13a1,1,0,0,1-.86,1l-2.06.3A6.11,6.11,0,0,0,12,21H5a1,1,0,0,1-1-1V4A1,1,0,0,1,5,3h6.59A1,1,0,0,1,12.29,3.29ZM20,11H4m4,4h2" style="fill: none; stroke: #FEFEFE; stroke-opacity:0.7; stroke-linecap: round; stroke-linejoin: round; stroke-width: 1.5;"></path></svg>
      <h6>Număr uși: ${car.dorsNumber}</h6>
    </div>
    
    <div class="selected-car-characteristics-item">
      <svg fill="#FEFEFE" fill-opacity="0.6" height="20px" width="24px" version="1.1" id="_x31_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
        viewBox="0 0 128 128" xml:space="preserve">
        <g>
          <ellipse transform="matrix(0.2588 -0.9659 0.9659 0.2588 -9.6134 69.5531)" cx="40.5" cy="41" rx="8.9" ry="8.9"/>
          <path d="M60.9,59.6c-1.5-0.4-3,0.4-3.5,2l-7.5,27.7c-1.2,4.9-5.5,8.5-10.4,8.9c-0.4,0-1,0-1,0H27.7c-1.6,0-2.8,1.2-2.8,2.8
            c0.1,1.7,1.3,2.9,2.9,2.9h10.8c0,0,0.8,0,1.5-0.1c7.4-0.6,13.5-5.8,15.4-13.1l7.4-27.7C63.3,61.6,62.4,60.1,60.9,59.6z"/>
          <path d="M38.9,93.7c3.4-0.2,6.1-2.6,6.9-5.8l7.7-28.5c0.7-2.7-0.9-5.5-3.6-6.1c-0.2,0-1.1-0.1-1.1-0.1c-7.2-0.7-14.1,3.8-16,11.1
            c0,0.1-0.3,1.2-0.4,1.7c-1.5,5.7-2.3,11.3-2.7,16.9H14.8c-1.3,0-2.8,0.6-3.9,1.7c-1.1,1-0.7,4.5-0.7,5.9v25.7
            c0,3.1,1.5,3.6,4.6,3.6s5.6-2.5,5.6-5.6V93.7h17.8H38.9z"/>
          <ellipse transform="matrix(0.2588 -0.9659 0.9659 0.2588 30.2257 121.4718)" cx="94.3" cy="41" rx="8.9" ry="8.9"/>
          <path d="M114.6,59.6c-1.5-0.4-3,0.4-3.5,2l-7.5,27.7c-1.2,4.9-5.5,8.5-10.4,8.9c-0.4,0-1,0-1,0H81.4c-1.6,0-2.8,1.2-2.8,2.8
            c0.1,1.7,1.3,2.9,2.9,2.9h10.8c0,0,0.8,0,1.5-0.1c7.4-0.6,13.5-5.8,15.4-13.1l7.4-27.7C117.1,61.6,116.2,60.1,114.6,59.6z"/>
          <path d="M92.6,93.7c3.4-0.2,6.1-2.6,6.9-5.8l7.7-28.5c0.7-2.7-0.9-5.5-3.6-6.1c-0.2,0-1.1-0.1-1.1-0.1c-7.2-0.7-14.1,3.8-16,11.1
            c0,0.1-0.3,1.2-0.4,1.7c-1.5,5.7-2.3,11.3-2.7,16.9H68.6c-1.3,0-2.8,0.6-3.9,1.7c-1.1,1-1.7,2.5-1.7,3.9v25.7
            c0,3.1,2.5,5.6,5.6,5.6s5.6-2.5,5.6-5.6V93.7h17.8H92.6z"/>
        </g>
      </svg>
      <h6>Număr pasageri: ${car.passengersNumber}</h6>
    </div>
  </div>

  <div class="selected-car-description">
    <p>${car.descriptionRo}</p>
  </div>
`;
//swiper start
const createCarImageHTML = (imagePath) => `<img loading="lazy" role="presentation" src="/images/carsList/${imagePath}" alt="carImage">`;

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
  selectedCarToRent.forEach(combineHTMLNeededForSelectedCar);
}
renderSelectedCarInfo();


//calculate Days Difference between two datetimes
function calculateDaysDifference(startDate, endDate) {
  const startDateTime = new Date(startDate);
  const endDateTime = new Date(endDate);

  const timeDifference = endDateTime - startDateTime;
  const daysDifference = timeDifference / (1000 * 60 * 60 * 24);
  const roundedDays = Math.round(daysDifference * 4) / 4;
  return roundedDays;
}



let fullPrice;
let pricePerDay;
let cashback;

const carPricePerDayInput = document.getElementById("carPricePerDay");
const carPricePerDayLabel = document.querySelector(".car-price-per-day");

const carRentDaysInput = document.getElementById("carRentDays");
const carRentDaysLabel = document.querySelector(".car-rent-days");

const carFinalPriceInput = document.getElementById("carFinalPrice");
const carFinalPriceLabel = document.querySelector(".car-final-price");

const carCashbackInput = document.getElementById("carCashback");

// add change listener for datetime input that call calc function
function changeListenerForDates(dateInput) {
  dateInput.addEventListener("change", function () {
    const rentPickupDateValue = document.getElementById("rentPickupDate").value;
    const rentReturnDateValue = document.getElementById("rentReturnDate").value;
    const result = calculateDaysDifference(rentPickupDateValue, rentReturnDateValue);

    carRentDaysInput.value = result;
    carRentDaysLabel.innerHTML = "x " + result;

    console.log(selectedCarToRent[0].rentDaysPrice1_2);
    switch (result) {
      case result<3:        
        fullPrice = selectedCarToRent[0].rentDaysPrice1_2 * result;
        pricePerDay = fullPrice / result;
        cashback = fullPrice * 0.05;
        break;

        case result<8:
        fullPrice = selectedCarToRent[0].rentDaysPrice3_7 * result;
        pricePerDay = fullPrice / result;
        cashback = fullPrice * 0.05;
        break;

        case result<21:
        fullPrice = selectedCarToRent[0].rentDaysPrice8_20 * result;
        pricePerDay = fullPrice / result;
        cashback = fullPrice * 0.05;
        break;

        case result<46:
        fullPrice = selectedCarToRent[0].rentDaysPrice21_45 * result;
        pricePerDay = fullPrice / result;
        cashback = fullPrice * 0.05;
        break;
        
        default:
        fullPrice = selectedCarToRent[0].rentDaysPrice46 * result;
        pricePerDay = fullPrice / result;
        cashback = fullPrice * 0.05;
        break;
    } // switch end

    carPricePerDayInput.value = pricePerDay;
    carPricePerDayLabel.innerHTML = pricePerDay + " $";

    carFinalPriceInput.value = fullPrice;
    carFinalPriceLabel.innerHTML = fullPrice + " $";
    
    carCashbackInput.value = cashback;
    // console.log(result);
  })
}
const rentPickupDate = document.getElementById("rentPickupDate");
changeListenerForDates(rentPickupDate);
const rentReturnDate = document.getElementById("rentReturnDate");
changeListenerForDates(rentReturnDate);