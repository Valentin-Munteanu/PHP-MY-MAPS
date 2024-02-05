
const images = ["https://top-fon.com/uploads/posts/2023-01/1674605182_top-fon-com-p-umnii-dom-fon-dlya-prezentatsii-21.jpg", "https://lovis.com/wp-content/uploads/2020/05/Continuous-Improvement-2400x1100-1.jpg?is-pending-load=1", "https://www.freelancinggig.com/blog/wp-content/uploads/2020/02/future-proof-sys-admin.png", "https://knowledgepoint.com/wp-content/uploads/2021/07/AdobeStock_184811519-scaled.jpeg", "https://blog.hexagongeosystems.com/wp-content/uploads/2017/04/shutterstock_226573174.jpg", "https://i.pinimg.com/originals/79/82/25/7982250dca5d1675a7f772410bbb4f9a.jpg" ,"https://top-fon.com/uploads/posts/2023-02/1675271786_top-fon-com-p-kompyuternii-fon-dlya-prezentatsii-123.jpg", "https://i.pinimg.com/originals/11/e2/59/11e259f55450b1ee248d1ca66b083b7c.jpg" ,"https://spctek.com/wp-content/uploads/2022/01/1536130722664.jpg"]


const slider = document.getElementById("slider_js")
const left = document.getElementById("left") 
const right = document.getElementById("right")

let init = 0

slider.style.backgroundImage = `url(${images[init]})`

right.addEventListener("click", () => {
    init = init >= images.length -1 ? 0: init +1
    slider.style.backgroundImage = `url(${images[init]})`
})

left.addEventListener("click", () => {
    init = init === 0 ? images.length-1: init -1
    slider.style.backgroundImage = `url(${images[init]})`
}) 