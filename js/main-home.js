const btnView = document.querySelector("main button.view");
btnView.addEventListener("click", () => {
    window.location.href = "../pages/visualiza-livro.php";
})

const btnEdit = document.querySelector("main button.edit");
btnEdit.addEventListener("click", () => {
    window.location.href = "../pages/editar-livro.php";
})

const btnDelete= document.querySelector("main button.delete");
btnDelete.addEventListener("click", () => {
    alert("Deu ruim, falta fazer!");
})

const btnAddNewLibre = document.querySelector("main button.add-new-libre");
btnAddNewLibre.addEventListener("click", () => {
    window.location.href = "../pages/adiciona-livro.php";
})