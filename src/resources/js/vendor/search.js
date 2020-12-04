function search() {
    const input = document.getElementById("form_search");
    const icon = document.getElementById("search-icon");
    const nav = document.getElementById("menu");
    const search_input = document.getElementById("search_input");

    nav.style.display = "none";
    input.style.display = "flex";
    icon.style.display = "none";
    search_input.focus();
}

function closeSearch() {
    const input = document.getElementById("form_search");
    const icon = document.getElementById("search-icon");
    const nav = document.getElementById("menu");

    nav.removeAttribute("style");
    input.removeAttribute("style");
    icon.removeAttribute("style");
}
