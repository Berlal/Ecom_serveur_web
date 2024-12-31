function filterProducts() {
  const searchQuery = document.getElementById("search").value.toLowerCase();
  const categoryFilter = document
    .getElementById("categoryFilter")
    .value.toLowerCase();

  const productCards = document.querySelectorAll(".product-card");

  productCards.forEach(function (card) {
    const productName = card.getAttribute("data-name");
    const productCategory = card.getAttribute("data-category");

    const matchesSearch = productName.includes(searchQuery);
    const matchesCategory =
      categoryFilter === "" || productCategory.includes(categoryFilter);

    if (matchesSearch && matchesCategory) {
      card.style.display = "block";
    } else {
      card.style.display = "none";
    }
  });
}

document.addEventListener("DOMContentLoaded", function () {
  const productCards = document.querySelectorAll(".product-card");
  productCards.forEach(function (card, index) {
    setTimeout(function () {
      card.style.opacity = "1";
      card.style.transform = "translateY(0)";
    }, 100 * index);
  });
});
