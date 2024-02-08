document.querySelectorAll("#rentThisCar").forEach(e => {
    e.addEventListener("click", function () {
        console.log(e.closest('.car-list__box'));
        // e.closest('.car-list__box').style.width = "400px"
        

    })
})