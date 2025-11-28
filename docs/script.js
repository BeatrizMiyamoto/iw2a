let slideIndex = 0;
const slides = document.querySelectorAll(".slide");
const dots = document.querySelectorAll(".dot");

function showSlide(n) {
    if (n >= slides.length) slideIndex = 0;
    if (n < 0) slideIndex = slides.length - 1;

    slides.forEach(s => s.style.display = "none");
    dots.forEach(d => d.classList.remove("active"));

    slides[slideIndex].style.display = "block";
    dots[slideIndex].classList.add("active");
}


function nextSlide() {
    slideIndex++;
    showSlide(slideIndex);
}


dots.forEach(dot => {
    dot.addEventListener("click", () => {
        slideIndex = parseInt(dot.getAttribute("data-index"));
        showSlide(slideIndex);
    });
});


showSlide(slideIndex);
setInterval(nextSlide, 2000);
