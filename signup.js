const darkModeToggle = document.getElementById("dark-mode-toggle");
const body = document.body;

darkModeToggle.addEventListener("click", () => {
  body.classList.toggle("dark-mode");
});

document.addEventListener("DOMContentLoaded", function () {
  // Get the button by its ID
  var signupButton = document.getElementById("signupBtn");

  // Add a click event listener to the button
  signupButton.addEventListener("click", function () {
    // Redirect to side.html
    window.location.href = "side.html";
  });
});
