document.addEventListener("DOMContentLoaded", function () {
  const forms = document.querySelectorAll("form");

  forms.forEach((form) => {
    form.addEventListener("submit", function (event) {
      let isValid = true;

      form.querySelectorAll("[required]").forEach((input) => {
        if (!input.value.trim()) {
          isValid = false;
          input.style.borderColor = "red";
        } else {
          input.style.borderColor = "#ccc";
        }
      });

      if (!isValid) {
        event.preventDefault();
        alert("Tous les champs sont obligatoires!");
      }
    });
  });

  const links = document.querySelectorAll('a[href^="#"]');
  links.forEach((link) => {
    link.addEventListener("click", function (e) {
      e.preventDefault();

      const targetId = link.getAttribute("href").substring(1);
      const targetElement = document.getElementById(targetId);

      if (targetElement) {
        window.scrollTo({
          top: targetElement.offsetTop - 50,
          behavior: "smooth",
        });
      }
    });
  });

  const productItems = document.querySelectorAll(".product-item");
  productItems.forEach((item, index) => {
    item.style.opacity = 0;
    item.style.transition = `opacity 1s ease-in-out`;
    setTimeout(() => {
      item.style.opacity = 1;
    }, 200 * index);
  });
});
