const images = ["https://fintechzone.hu/wp-content/uploads/2018/11/forint-revolut.jpg", "https://cloudfront-us-east-2.images.arcpublishing.com/reuters/5RTVU4GTBBKNLLUKPN5XSN2A34.jpg", "https://unionlanding.com/wp-content/uploads/2019/08/Logo-fedex.jpg" , "https://mir-s3-cdn-cf.behance.net/project_modules/1400/47c10646661217.585d6145a895a.jpg" ,"https://cryptonyka.su/wp-content/uploads/2019/04/skrill-koshelek2.jpg" ,"https://yaroshok.ru/wp-content/uploads/2019/01/paypal-fees-for-payments-and-transfers-7.jpg" , "https://psm7.com/wp-content/uploads/2017/01/AMAZON.jpg" ,"https://www.wootheme-plugins.com/wp-content/uploads/2022/05/edd-new-authorize-net-download-graphic2-s.png" ,"https://i.ytimg.com/vi/m6HVKIghZek/maxresdefault.jpg" ,"https://www.chargedretail.co.uk/wp-content/uploads/2023/03/Klarna-2-scaled.jpg"]

const slider = document.getElementById("slider_js")
const left = document.getElementById("left")
const right = document.getElementById("right")

let imagesNR = 0 

slider.style.backgroundImage = `url(${images[imagesNR]})`

right.addEventListener("click" , () => {
imagesNR = imagesNR >= images.length -1 ? 0 : imagesNR + 1 
slider.style.backgroundImage = `url(${images[imagesNR]})`
})

left.addEventListener("click" , () => {
   imagesNR = imagesNR === 0 ? images.length -1 : imagesNR -1
    slider.style.backgroundImage = `url(${images[imagesNR]})`
})