// Animasi untuk fade-in saat halaman dimuat
document.addEventListener("DOMContentLoaded", function () {
    const container = document.querySelector(".registration-container");
    container.style.opacity = 0;
    container.style.transform = "translateY(20px)";
    setTimeout(() => {
        container.style.transition = "all 1s ease";
        container.style.opacity = 1;
        container.style.transform = "translateY(0)";
    }, 100);
});

// Animasi hover pada tombol register
const registerButton = document.querySelector(".btn-register");
registerButton.addEventListener("mouseover", function () {
    this.style.transform = "scale(1.05)";
    this.style.boxShadow = "0 4px 15px rgba(0, 0, 0, 0.2)";
});
registerButton.addEventListener("mouseout", function () {
    this.style.transform = "scale(1)";
    this.style.boxShadow = "none";
});

// Animasi input focus
const inputs = document.querySelectorAll(".form-control, .form-select");
inputs.forEach(input => {
    input.addEventListener("focus", function () {
        this.style.backgroundColor = "#f0f8ff";
        this.style.transition = "background-color 0.3s ease";
    });
    input.addEventListener("blur", function () {
        this.style.backgroundColor = "white";
    });
});