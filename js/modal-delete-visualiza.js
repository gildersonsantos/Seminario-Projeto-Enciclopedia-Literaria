const btnDelete = document.querySelector("a.delete");
const modelDelete = document.querySelector("div.modal-delete");

btnDelete.addEventListener("click", function(event) {
    event.preventDefault();
    const el = event.target;

    modelDelete.style.display = "block";
    
    const [btnCancel, btnConfirm] = modelDelete.querySelectorAll("button");
    
    btnCancel.addEventListener("click", () => {
        modelDelete.style.display = "none";
    })

    btnConfirm.addEventListener("click", () => {
        // AQUI TENTE DIRECIONAR PARA O DELETE
    })
});