// Declarațiile de variabile:

// images: Un array care conține URL-urile imaginilor pe care le va afișa slider-ul.
// slider, left, right: Acestea sunt referințele către elementele HTML corespunzătoare slider-ului și butoanelor stânga și dreapta.
const images = ["https://oasis.opstatics.com/content/dam/oasis/page/2023/6-0highlight-product-card/rcc/Store_NA-PC.jpg", "https://www.oneplus.com/content/dam/oasis/page/2023/home-pow/1736X900.jpg.thumb.webp", "https://www.oneplus.com/content/dam/oasis/page/2023/10-year-anniversary/1211/CarnivalGames2023HaveFunWin-PC.jpg.thumb.webp", "https://www.oneplus.com/content/dam/oasis/page/2023/10-year-anniversary/1215/pc11.jpg.thumb.webp", "https://www.oneplus.com/content/dam/oasis/page/2023/10-year-anniversary/1217/img.jpg.thumb.webp", "https://www.oneplus.com/content/dam/oasis/page/2023/new-home/ap/oos14-pc.jpg.thumb.webp", "https://www.oneplus.com/content/dam/oasis/page/2024/home/photograph-pc.jpg.thumb.webp"]
const slider = document.getElementById("slider")
const left = document.getElementById("left")

const right = document.getElementById("right")
// 2 Inițializarea variabilei initial:

// Variabila initial stochează indexul imaginii curente care este afișată în slider. În acest caz, începe de la 0, adică prima imagine din array.


let initial = 0

// 3 Setarea imaginii inițiale:

// Se setează imaginea de fundal a elementului slider folosind slider.style.backgroundImage, iar URL-ul imaginii inițiale este preluat din array-ul images folosind indexul initial.


slider.style.backgroundImage = `url(${images[initial]})`

// 4 Evenimentul de clic pentru butonul "right":

// Atunci când utilizatorul face clic pe butonul "right", se activează acest eveniment.
// Se verifică dacă initial este egal sau mai mare decât lungimea array-ului images minus 1. Dacă da, atunci initial este resetat la 0, altfel este incrementat cu 1.
// Se actualizează imaginea de fundal a elementului slider cu URL-ul imaginii corespunzătoare noului initial.

right.addEventListener("click", () => {
    initial = initial >= images.length - 1 ? 0 : initial + 1;
    slider.style.backgroundImage = `url(${images[initial]})`
})


// Evenimentul de clic pentru butonul "left":

// Atunci când utilizatorul face clic pe butonul "left", se activează acest eveniment.
// Se verifică dacă initial este 0. Dacă da, atunci initial este setat la lungimea array-ului images minus 1, altfel este decrementat cu 1.
// Se actualizează imaginea de fundal a elementului slider cu URL-ul imaginii corespunzătoare noului initial.
left.addEventListener("click", () => {
    initial = initial === 0 ? images.length - 1 : initial - 1;

slider.style.backgroundImage = `url(${images[initial]})`

})