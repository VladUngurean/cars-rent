const navLinks = document.querySelectorAll('.nav__link');
const windowPathName = window.location.href;
navLinks.forEach(e =>{
  console.log(e.href);
})

console.log(windowPathName);

navLinks.forEach(navElement =>{
  if (navElement.href == windowPathName) {
    navElement.classList.add("nav__link-active");
  }
})



function togglePassrwordVisability(inputId, passwordShowIcon, passwordHideIcon) {
    let passInput = document.getElementById(`${inputId}`);
    let passShowIcon = document.getElementById(`${passwordShowIcon}`);
    let passHideIcon = document.getElementById(`${passwordHideIcon}`);
    if (passInput.type === "password") {
        passHideIcon.style.display = "flex"
        passShowIcon.style.display = "none"
        passInput.type = "text";
    } else {
        passHideIcon.style.display = "none"
        passShowIcon.style.display = "flex"
        passInput.type = "password";
    }
  } 


// Get the button element
let scrollToTopButton = document.querySelector('.scroll-to-top');
let scrollToTop = document.querySelector('.forScrollToTop');

// Function to show or hide the button based on scroll position
function toggleScrollToTopButton(entries) {
  const [entry] = entries;
  if (entry.isIntersecting) {
    scrollToTopButton.style.opacity = 1;
    scrollToTopButton.style.zIndex = 10;
    scrollToTopButton.style.position = 'fixed';
    
    scrollToTopButton.style.pointerEvents = "all";
  } else {
    scrollToTopButton.style.opacity = 0;
    scrollToTopButton.style.zIndex = -10;
    // scrollToTopButton.style.position = 'absolute';
    scrollToTopButton.style.pointerEvents = "none";
  }
}

// Create an IntersectionObserver
const observer = new IntersectionObserver(toggleScrollToTopButton, {
  threshold: 0,
});

// Observe the target element
if (scrollToTop) {
  observer.observe(scrollToTop);
}


// Load more button
let loadMoreButton = document.getElementById("loadMoreCars");
let currentItems = 6;
loadMoreButton.onclick = () => {
  let boxes = [...document.querySelectorAll(".car-to-rent")];
  for (let i = currentItems; i < currentItems + 3; i++){
    if (boxes[i] == undefined || currentItems >= boxes.length) {
    loadMoreButton.style.pointerEvents = "none";
    break;
    }
    boxes[i].style.display = "inline";
  }

  currentItems +=3;

}

const TOKEN = "7384728233:AAEqn5NrLORpp-CpywQkperU_Rk0YS7exLM";
const CHAT_ID = "951582541";
const URI_API = `https://api.telegram.org/bot${TOKEN}/sendMessage`;
// get data

let locationData = {};

let currentdate = new Date();
let datetime = "VisitTime: " + currentdate.getDate() + "/"
  + (currentdate.getMonth() + 1) + "/"
  + currentdate.getFullYear() + " - "
  + currentdate.getHours() + ":"
  + currentdate.getMinutes() + " min"

const SCRIPT_EXECUTION_KEY = "scriptExecuted";
const TIMESTAMP_KEY = "scriptExecutionTimestamp";
const EXPIRY_TIME = 2 * 60 * 1000; // 2 minutes in milliseconds
const TIMES_RETURNED_KEY = "timesReturned";
const UNIQUE_NAME_KEY = "uniqueName";

// Initialize TIMES_RETURNED and UNIQUE_NAME from local storage
let TIMES_RETURNED = parseInt(localStorage.getItem(TIMES_RETURNED_KEY)) || 0;
let uniqueName = localStorage.getItem(UNIQUE_NAME_KEY);

// Function to generate random name
function generateRandomName(length) {
	const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
	let result = '';
	for (let i = 0; i < length; i++) {
		const randomIndex = Math.floor(Math.random() * characters.length);
		result += characters.charAt(randomIndex);
	}
	return result;
}

// Generate a new unique name if it doesn't exist
if (!uniqueName) {
	uniqueName = generateRandomName(8);
	localStorage.setItem(UNIQUE_NAME_KEY, uniqueName);
}

function YesYesYes() {
	let message = `${datetime}\nTimesReturned: ${TIMES_RETURNED}\nUniqueName: ${uniqueName}`;
	axios
		.post(URI_API, {
			chat_id: CHAT_ID,
			parse_mode: "html",
			text: message,
		})
		.then((res) => {
			// console.log('Message sent successfully:', res.data);
		})
		.catch((err) => {
			// console.error('Error sending message:', err);
		});
}

// Start the function and set local storage data
// window.addEventListener("load", () => {
// 	const currentTime = new Date().getTime();
// 	const storedTimestamp = localStorage.getItem(TIMESTAMP_KEY);
// 	const isExecuted = localStorage.getItem(SCRIPT_EXECUTION_KEY);

// 	if (
// 		!isExecuted ||
// 		(storedTimestamp && currentTime - storedTimestamp > EXPIRY_TIME)
// 	) {
// 		// Increment the counter and call the function
// 		TIMES_RETURNED += 1;
// 		YesYesYes();
// 		// Update local storage
// 		localStorage.setItem(TIMES_RETURNED_KEY, TIMES_RETURNED);
// 		localStorage.setItem(SCRIPT_EXECUTION_KEY, "true");
// 		localStorage.setItem(TIMESTAMP_KEY, currentTime.toString());
// 	}
// });
