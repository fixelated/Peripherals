const searchForm = document.getElementById("searchForm");
const searchInput = document.getElementById("searchInput");
const productCards = document.querySelectorAll(".product-card");
const filterButtons = document.querySelectorAll(".filter-chip");
const categoryCards = document.querySelectorAll(".category-card");
const noResults = document.getElementById("noResults");
const toast = document.getElementById("toast");

let activeCategory = "All";

function filterProducts() {
    const searchText = searchInput.value.toLowerCase().trim();
    let visibleProducts = 0;

    productCards.forEach(function(card) {
        const name = card.dataset.name;
        const category = card.dataset.category;

        let matchesCategory =
            activeCategory === "All" ||
            category === activeCategory;

        // Include related parts when selecting a device category.
        if (activeCategory === "Mobile Phones" &&
            category === "Mobile Parts") {
            matchesCategory = true;
        }

        if (activeCategory === "Laptops" &&
            category === "Laptop Parts") {
            matchesCategory = true;
        }

        if (activeCategory === "Desktop PCs" &&
            category === "PC Components") {
            matchesCategory = true;
        }

        const matchesSearch =
            name.includes(searchText) ||
            category.toLowerCase().includes(searchText);

        if (matchesCategory && matchesSearch) {
            card.hidden = false;
            visibleProducts++;
        } else {
            card.hidden = true;
        }
    });

    noResults.hidden = visibleProducts > 0;
}

function selectCategory(category) {
    activeCategory = category;
    searchInput.value = "";

    filterButtons.forEach(function(button) {
        button.classList.toggle(
            "selected",
            button.dataset.filter === category
        );
    });

    filterProducts();

    document.getElementById("products").scrollIntoView({
        behavior: "smooth"
    });
}

// Filter using the category buttons.
filterButtons.forEach(function(button) {
    button.addEventListener("click", function() {
        selectCategory(button.dataset.filter);
    });
});

// Filter using the category cards.
categoryCards.forEach(function(card) {
    card.addEventListener("click", function() {
        selectCategory(card.dataset.filter);
    });
});

// Search products.
searchForm.addEventListener("submit", function(event) {
    event.preventDefault();

    activeCategory = "All";

    filterButtons.forEach(function(button) {
        button.classList.toggle(
            "selected",
            button.dataset.filter === "All"
        );
    });

    filterProducts();

    document.getElementById("products").scrollIntoView({
        behavior: "smooth"
    });
});

// Update results while typing.
searchInput.addEventListener("input", filterProducts);

// View All Products button.
document.querySelector(".reset-filter").addEventListener(
    "click",
    function() {
        selectCategory("All");
    }
);

// Demo product details message.
document.querySelectorAll(".details-button").forEach(
    function(button) {
        button.addEventListener("click", function() {
            toast.textContent =
                button.dataset.product +
                " — Product details can be added later.";

            toast.classList.add("show");

            setTimeout(function() {
                toast.classList.remove("show");
            }, 2500);
        });
    }
);