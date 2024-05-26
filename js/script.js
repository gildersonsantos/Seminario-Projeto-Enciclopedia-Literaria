const btnMenu = document.querySelector("header button.list");
const btnClose = document.querySelector("aside button.close");
const aside = document.querySelector("aside");

btnMenu.addEventListener("click", () => {
    aside.classList.add("active");
    aside.classList.remove("reverse");
    document.body.classList.add("bg-blur")
})

btnClose.addEventListener("click", () => {
    aside.classList.remove("active");
    aside.classList.add("reverse");
    document.body.classList.remove("bg-blur");
})

const btnCaretLeft = document.querySelector("header button.caret-left");
btnCaretLeft.addEventListener("click", () => {
    window.history.back();
})

window.addEventListener('scroll', () => {
    if (document.body.classList.contains("bg-blur")) {
        window.scrollTo(0, 0);
    }
});

// const searchInput = document.querySelector('.form-search #search');
// const searchForm = document.querySelector('.form-search');

// searchInput.addEventListener("blur", () => {
//     if (!searchInput.value) {
//         searchForm.submit(); // Submete o formulário
//     }
// });