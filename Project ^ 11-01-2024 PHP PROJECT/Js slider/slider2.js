const images = ["https://static.tildacdn.com/tild3131-6336-4036-a632-383733623233/laptop-repair-servic.jpg", "https://static.tildacdn.com/tild3266-3562-4138-a539-353061313964/212317259136599E-02.jpg" ,"https://alterainvest.ru/upload/iblock/9e6/9e6ae5f69a24b71c29c3cbd3136bb856.jpg", "https://www.funnyart.club/uploads/posts/2022-05/thumbs/1653906088_9-www-funnyart-club-p-kartinki-remont-kompyuterov-krasivo-9.jpg", "https://servicecenter63.ru/uploads/s/w/7/d/w7dnmctohjbq/img/cfoAFMD9.jpg", "https://static.tildacdn.com/tild6533-3762-4963-a135-636430653166/7de89bf8cee813986e10.jpg"]

const slide = document.getElementById("slider1")
const left = document.getElementById("left1")
const right = document.getElementById("right1")

let sliderNR = 0 
slide.style.backgroundImage = `url(${images[sliderNR]})`

right.addEventListener("click" , () => {
    sliderNR = sliderNR >= images.length -1 ? 0: sliderNR + 1 
    slide.style.backgroundImage = `url(${images[sliderNR]})`
})


left.addEventListener("click" , () => {
    sliderNR = sliderNR === 0 ? images.length-1: sliderNR -1 
    slide.style.backgroundImage = `url(${images[sliderNR]})`
})
