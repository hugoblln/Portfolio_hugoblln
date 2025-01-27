const circles = document.querySelectorAll(".technos-presentation-row-circle");


circles.forEach((circle) => {
  if (!circle.dataset.originalContent) {
    circle.dataset.originalContent = circle.innerHTML;
  }
});

circles.forEach((circle) => {

  circle.addEventListener("mouseover", () => {
    circle.classList.add("circle-hover");
    circle.innerHTML = circle.dataset.hoverContent;
  });

  circle.addEventListener("mouseout", () => {
    circle.classList.remove("circle-hover");
    circle.innerHTML = circle.dataset.originalContent;
  });
});
