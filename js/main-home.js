const btnView = document.querySelector("main button.view");
btnView.addEventListener("click", () => {
    window.location.href = "../pages/visualiza-livro.html";
})

const btnAddNewLibre = document.querySelector("main button.add-new-libre");
btnAddNewLibre.addEventListener("click", () => {
    window.location.href = "../pages/adiciona-livro.html";
})
