const links = document.querySelectorAll("a.delete");
const modelDelete = document.querySelector("div.modal-delete");

links.forEach(link => {
    link.addEventListener("click", function(event) {
        event.preventDefault();
        const el = event.target;
        const tr = el.closest("tr");
        const td = tr.querySelectorAll("td");

        const [, nome, autor] = td;
        const [strongNome, strongAutor] = modelDelete.querySelectorAll("strong");
        strongNome.innerText = nome.innerText;
        strongAutor.innerText = autor.innerText;

        modelDelete.style.display = "block";
        
        const [btnCancel, btnConfirm] = modelDelete.querySelectorAll("button");
        
        btnCancel.addEventListener("click", () => {
            strongNome.innerText = "";
            strongAutor.innerText = "";
            modelDelete.style.display = "none";
        })

        btnConfirm.addEventListener("click", () => {
            // AQUI TENTE DIRECIONAR PARA O DELETE
        })
    });
});