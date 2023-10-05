console.log('script starto')

// document.getElementById('aled').firstElementChild.className = 'carousel-item active';
// document.getElementById('aled1').firstElementChild.className = 'carousel-item active';
// document.getElementById('aled2').firstElementChild.className = 'carousel-item active';
// document.getElementById('aled3').firstElementChild.className = 'carousel-item active';

let carousel_kon = document.querySelectorAll(".carousel-inner");
carousel_kon.forEach(element => {
    element.firstElementChild.classList.add("active");
})
