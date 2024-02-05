const images =  ["https://i.pinimg.com/originals/54/ab/c6/54abc658eb3b61c05f674c9838b3bb79.jpg", "https://aws.wideinfo.org/renwerks.com/wp-content/uploads/2018/09/07204921/Personal-Gadgets-Products-banner-sm-2.jpg", "https://homesenator.com/wp-content/uploads/2021/06/smart-home-slider3.jpg", "https://i.pinimg.com/originals/4b/42/09/4b420945b1c69a8442f4c9a079c0f324.jpg", "https://i.pinimg.com/originals/f8/dd/60/f8dd604f5aab7f22480f330325d68ec7.jpg", "https://get.wallhere.com/photo/smartphone-brand-tablet-icons-hand-finger-screenshot-gadget-computer-wallpaper-touch-screen-577985.jpg"]

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