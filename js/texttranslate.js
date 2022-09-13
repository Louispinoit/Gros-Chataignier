//split text in array
const text = document.querySelector(".title-loading");
const strText = text.textContent;
const splitText = strText.split("");
text.textContent = "";


//create span with the letter of the text
for (let i = 0; i < splitText.length; i++) {
    text.innerHTML += "<span>" + splitText[i] + "</span>";
}


//init timer
let char = 0;
let timer = setInterval(onTick, 50);


//put class on each span at 50ms interval
function onTick() {
    const span = text.querySelectorAll("span")[char];
    span.classList.add("fade");
    char++
    if (char === splitText.length) {
        complete();
        return;
    }
}


//clear the timer
function complete() {
    clearInterval(timer);
    timer = null;
}
