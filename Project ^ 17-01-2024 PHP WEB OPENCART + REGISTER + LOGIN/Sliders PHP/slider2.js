


const slider = document.getElementById("sliders2");
const leftButton = document.getElementById("left1");
const rightButton = document.getElementById("right1");



let currentPosition = 0;
const imageWidth = 700;
const totalImages = 4;

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






