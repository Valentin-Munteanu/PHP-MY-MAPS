const images =  ["https://on-smart.ru/upload/iblock/569/5692e2b1fd6b48355fad5e90b1cac8f8.jpg", "https://gadgettablet.com/wp-content/uploads/2020/02/Banner-Iphone.png", "https://darwindiose.files.wordpress.com/2014/10/mobilephone.jpg", "https://gas-kvas.com/uploads/posts/2023-02/1675463071_gas-kvas-com-p-fonovie-risunki-sotovogo-telefona-7.jpg", "https://wp.widewallpapers.ru/2k/mobile/samsung/galaxy-s6/1920x1080/Samsung-Galaxy-S6-1920x1080-004.jpg"]

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