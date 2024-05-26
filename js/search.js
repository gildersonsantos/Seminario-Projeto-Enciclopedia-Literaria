const form = document.querySelector(".form-search");
const search = document.getElementById("search");

form.addEventListener("submit", event => {
    event.preventDefault();
    const textoPesquisa = search.value;
    window.location.href = `../pages/index.php?search=${textoPesquisa}`;
});