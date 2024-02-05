
const images1 = ["https://i.pcmag.com/imagery/articles/02lWvq04510oF8r1LHPzbPj-1..v1691876362.jpg" ,"https://www.clubrenter.com/image/froala/05adb23cf569ba1524311016267.jpg", "https://cdn.inet.se/gfx/ext/313/ux434/3.jpg" ,"https://geekmaze.ru/wp-content/uploads/1/b/a/1baf75fd0d43a7116b4475b576e41590.jpeg", "https://kartinki.pibig.info/uploads/posts/2023-04/1682025443_kartinki-pibig-info-p-kartinki-igrovikh-noutbukov-arti-vkontakte-66.jpg" ,"https://topsov.com/wp-content/uploads/2022/01/main-2.jpg" ,"https://i0.wp.com/www.applestore.pk/wp-content/uploads/2020/03/iPhone-11-Pro-Inner-Banner-1920-X-710-Website.jpg?ssl=1", "https://stocompov.ru/wp-content/uploads/2021/08/gaming_pc.jpg"]


const slider = document.getElementById("slider")
const left1 = document.getElementById("left")
const right1 = document.getElementById("right")

let sliderNR1 = 0 
slider.style.backgroundImage = `url(${images1[sliderNR1]})`

right1.addEventListener("click" , () => {
    sliderNR1 = sliderNR1 >= images1.length -1 ? 0: sliderNR1 + 1 
    slider.style.backgroundImage = `url(${images1[sliderNR1]})`
})


left1.addEventListener("click" , () => {
    sliderNR1 = sliderNR1=== 0 ? images1.length-1: sliderNR1 -1 
    slider.style.backgroundImage = `url(${images1[sliderNR1]})`
})







