var cards = document.querySelectorAll(".product-box");
[...cards].forEach((card) => {
    card.addEventListener("mouseover", function () {
        card.classList.add("is-hover");
    });
    card.addEventListener("mouseleave", function () {
        card.classList.remove("is-hover");
    });
});
const items = document.querySelectorAll(".navbar-nav .nav-item .nav-link");
items.forEach((item) => {
    item.addEventListener("click", () => {
        document.querySelector(".nav-link.active").classList.remove("active");
        item.classList.add("active");
    });
});
const popoverTriggerList = document.querySelectorAll(
    '[data-bs-toggle="popover"]'
);
const popoverList = [...popoverTriggerList].map(
    (popoverTriggerEl) => new bootstrap.Popover(popoverTriggerEl)
);
