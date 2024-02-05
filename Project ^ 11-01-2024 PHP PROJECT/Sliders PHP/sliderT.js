const slider = document.getElementById("sliderT");
const left = document.getElementById("left-cat");
const right = document.getElementById("right-cat");

let position = 0;
const imageWidth = 700; 
const totalImages = 8; 

left.addEventListener("click", () => {
    position += imageWidth;

    if (position > 0) {
        position = -((totalImages - 1) * imageWidth);
    }

    slider.style.left = `${position}px`;
});

right.addEventListener("click", () => {
    position -= imageWidth;

    if (position < -((totalImages - 1) * imageWidth)) {
        // Dacă am ajuns la ultima imagine, să trecem la prima
        position = 0;
    }

    slider.style.left = `${position}px`;
});