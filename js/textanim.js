const text = document.querySelector(".animate-text").children;
let textLen = text.length;
let index = 0;
const textInTimer = 3000,
    textOutTimer = 2800;

function animateText() {
    for (let i = 0; i < textLen; i++) {
        text[i].classList.remove("text-in", "text-out");
    }
    text[index].classList.add("text-in");
    setTimeout(function() {
        text[index].classList.add("text-out");
    }, textOutTimer)

    setTimeout(function() {
        if (index == textLen - 1) {
            index = 0;
        }
        else {
            index++;
        }
        animateText()
    }, textInTimer);
}

window.onload = animateText;
