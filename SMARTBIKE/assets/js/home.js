document.addEventListener("DOMContentLoaded", function () {
  const heroContent = document.querySelector(".hero-content");
  heroContent.style.opacity = "0";
  setTimeout(function () {
    heroContent.style.transition = "opacity 1s ease";
    heroContent.style.opacity = "1";
  }, 500);
});

const productCards = document.querySelectorAll(".product-card");

productCards.forEach((card) => {
  card.addEventListener("mouseenter", () => {
    card.style.transform = "scale(1.05)";
    card.style.transition = "transform 0.3s ease";
  });

  card.addEventListener("mouseleave", () => {
    card.style.transform = "scale(1)";
  });
});

const links = document.querySelectorAll('a[href^="#"]');

links.forEach((link) => {
  link.addEventListener("click", function (e) {
    e.preventDefault();
    const targetId = link.getAttribute("href").substring(1);
    const targetElement = document.getElementById(targetId);
    window.scrollTo({
      top: targetElement.offsetTop - 70,
      behavior: "smooth",
    });
  });
});
