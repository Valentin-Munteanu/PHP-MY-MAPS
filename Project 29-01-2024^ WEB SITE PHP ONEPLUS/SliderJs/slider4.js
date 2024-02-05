const images =  ["https://gadgetbd.com/wp-content/uploads/2019/05/Screen-protector-banner.jpg", "https://mir-s3-cdn-cf.behance.net/project_modules/max_1200/9ccb3781147327.5cf67f39e4c5c.jpg", "https://miro.medium.com/v2/resize:fit:3200/1*BL_q0JmIuOTlBLgEhV6V1Q.jpeg", "https://phixman.com/images/offers/offer_190507071525.jpg", "https://wp.widewallpapers.ru/2k/mobile/samsung/galaxy-s6/1920x1080/Samsung-Galaxy-S6-1920x1080-004.jpg"]

const slider2 = document.getElementById("slider2")
const left2 = document.getElementById("right2");
const right2 = document.getElementById("left2");

let init = 0



slider2.style.backgroundImage = `url(${images[init]})`

right2.addEventListener("click", () => {
    init = init >= images.length -1 ? 0 : init + 1;
    slider2.style.backgroundImage = `url(${images[init]})`
})

left2.addEventListener("click", () => {
    init = init === 0 ? images.length - 1: init -1 ;

    slider2.style.backgroundImage = `url(${images[init]})`


})