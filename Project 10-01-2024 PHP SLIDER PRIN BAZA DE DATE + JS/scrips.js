// // 12 Apelam in JS TOATE elementele din index.php

// const slider = document.getElementById("slider")
// const left = document.getElementById("left")
// const right = document.getElementById("right")

// let position = 0

// // 12a Creem un let position cu valoare initiala de 0 

// // 13 Creem o functie de eveniment addEventListener in care prin evenimentul de click, arrow funcion vom adauga ca sliderul + style la butonul de left va fi +=700 px sau -= 700px va insemna ca aproximativ vor fi imaginile coordonate cu 700px 

// // 13a left = coordonata pe baza careia noi vom putea schimba pozitia imaginilor

// left.addEventListener("click", () => {
//     position += 700;
//     slider.style.left = `${position}px`;
// });

// right.addEventListener("click", () => {
//     position -= 700;
//     slider.style.left = `${position}px`;
// });





const slider = document.getElementById("slider");
const left = document.getElementById("left");
const right = document.getElementById("right");

let position = 0;
const imageWidth = 700; // Lățimea fiecărei imagini în pixeli
const totalImages = 4; // Numărul total de imagini în slider

left.addEventListener("click", () => {
    position += imageWidth;

    if (position > 0) {
        // Dacă am ajuns la prima imagine, să trecem la ultima
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