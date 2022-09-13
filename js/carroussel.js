//select button left and right by data attribute
const buttons = document.querySelectorAll("[data-carousel-button]")



buttons.forEach(button => {


    button.addEventListener("click", () => {

        const offset = button.dataset.carouselButton === "next" ? 1 : -1;

        const slides = button.closest("[data-carousel]").querySelector("[data-slides]")
        const activeSlide = slides.querySelector("[data-active]")

        //convert slides in array then get the index of the active slide and add the offset (loop)
        let newIndex = [...slides.children].indexOf(activeSlide) + offset


        if (newIndex < 0) newIndex = slides.children.length - 1

        //if we pass the last slide, return to the index 0
        if (newIndex >= slides.children.length) newIndex = 0


        //add the data on the new slide
        slides.children[newIndex].dataset.active = true

        //delete the data on the slide who it was active before
        delete activeSlide.dataset.active
    })
})
