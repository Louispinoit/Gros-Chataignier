document.getElementById("accessibility").onclick = function() {
    darkMod();

};

const body = document.querySelector("body");
const background = document.getElementsByClassName("layer-home");
const h1 = document.querySelectorAll("h1");
const h2 = document.querySelectorAll("h2");
const p = document.querySelector("p");
const a = document.querySelectorAll("a");
const stage = document.getElementsByClassName("stage");
const accessibilityEye = document.getElementById("accessibility");
const input = document.querySelectorAll("input");

//--- darkmod enable ---//
function darkMod() {
    body.classList.add("darkMod");
    background[0].classList.add("darkMod");
    h1.forEach(element => element.classList.add('darkMod'));
    h2.forEach(element => element.classList.add('darkMod'));
    p.classList.add("darkMod");
    a.forEach(element => element.classList.add('darkMod'));
    accessibilityEye.classList.add("darkMod");
    input.forEach(element => element.classList.add('darkMod'));

    for (let i = 0; i < stage.length; i++) {
        console.log(stage[i]);
        stage[i].classList.add('darkMod');
    }


    window.localStorage.setItem('dark_mod', 'storage');
    document.getElementById("accessibility").onclick = function() {
        clearDarkMod();
    };

    console.log(window.localStorage);
}


//--- darkmod disable ---//
function clearDarkMod() {
    if (window.localStorage.getItem('dark_mod')) {
        body.classList.remove("darkMod");
        background[0].classList.remove("darkMod");

        h1.forEach(element => element.classList.remove('darkMod'));
        h2.forEach(element => element.classList.remove('darkMod'));

        p.classList.remove("darkMod");
        a.forEach(element => element.classList.remove('darkMod'));
        accessibilityEye.classList.remove("darkMod");
        input.forEach(element => element.classList.remove('darkMod'));

        for (var i = 0; i < stage.length; i++) {
            console.log(stage[i]);
            stage[i].classList.remove('darkMod');
        }
        window.localStorage.clear();
        document.getElementById("accessibility").onclick = function() {
            darkMod();
        }
    };
}
if (window.localStorage.getItem('dark_mod')) {
    darkMod();
};
