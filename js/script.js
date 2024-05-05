const btnMenu = document.querySelector("header button.list");
const aside = document.querySelector("aside");

btnMenu.addEventListener("click", () => {
    if (aside.classList.contains("active")) {
        aside.classList.remove("active");
        aside.classList.add("reverse");
    } else {
        aside.classList.add("active");
        aside.classList.remove("reverse");
    }
})

const btnCaretLeft = document.querySelector("header button.caret-left");
btnCaretLeft.addEventListener("click", () => {
    window.history.back();
})