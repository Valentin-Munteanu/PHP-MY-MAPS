const slider = document.getElementById("sliders");
const leftButton = document.getElementById("left");
const rightButton = document.getElementById("right");



let currentPosition = 0;
const imageWidth = 1200;
const totalImages = 8;

leftButton.addEventListener("click", () => {
    currentPosition += imageWidth;


    if (currentPosition > 0) {
        currentPosition = -((totalImages - 1) * imageWidth);
    }

    slider.style.left = `${currentPosition}px`;
});


rightButton.addEventListener("click", () => {
    currentPosition -= imageWidth;

    if (currentPosition < -((totalImages - 1) * imageWidth)) {
        currentPosition = 0;
    }

    slider.style.left = `${currentPosition}px`;
});






