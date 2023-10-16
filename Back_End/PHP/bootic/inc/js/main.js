console.log('script starto')

// document.getElementById('aled').firstElementChild.className = 'carousel-item active';
// document.getElementById('aled1').firstElementChild.className = 'carousel-item active';
// document.getElementById('aled2').firstElementChild.className = 'carousel-item active';
// document.getElementById('aled3').firstElementChild.className = 'carousel-item active';

let carousel_kon = document.querySelectorAll(".carousel-inner");
carousel_kon.forEach(element => {
    element.firstElementChild.classList.add("active");
})

let deleteBouton = document.querySelectorAll("#deleteBouton");

deleteBouton.forEach(function (button) {
    button.addEventListener("click", function (event) {
        event.preventDefault(); // Empêche le comportement par défaut du lien

        var confirmation = confirm("Êtes-vous sûr de vouloir supprimer cette ligne ?");

        if (confirmation) {
            // Redirigez l'utilisateur vers le lien spécifié
            window.location.href = button.getAttribute("href");
        }
    });
});
