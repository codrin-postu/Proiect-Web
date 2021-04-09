// Opens/Closes the navigation bar

const showNavbar = (toggleId, navId, bodyId, headerId) => {
  const toggle = document.getElementById(toggleId),
    nav = document.getElementById(navId),
    bodyPadding = document.getElementById(bodyId),
    headerPadding = document.getElementById(headerId);

  if (toggle && nav && bodyPadding && headerPadding) {
    toggle.addEventListener("click", () => {
      nav.classList.toggle("show");
      bodyPadding.classList.toggle("body-padding");
      headerPadding.classList.toggle("header-padding");
    });
  }
};

showNavbar("header-toggle", "navbar", "body-padding", "header");

// Emphasis on active link in the nav bar

const linkColor = document.querySelectorAll(".nav-link");

function colorLink() {
  if (linkColor) {
    linkColor.forEach((l) => l.classList.remove("active"));
    this.classList.add("active");
  }
}

linkColor.forEach((l) => l.addEventListener("click", colorLink));

// Navbar collapsible

var coll = document.getElementsByClassName("class-select");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function () {
    var parent = this.parentElement;
    var child = this.firstElementChild;

    parent.classList.toggle("open");
    var content = this.nextElementSibling;

    if (child.classList.contains("fa-chevron-right")) {
      child.classList.remove("fa-chevron-right");
      child.classList.add("fa-chevron-down");
    } else {
      child.classList.remove("fa-chevron-down");
      child.classList.add("fa-chevron-right");
    }

    if (content.style.display === "block") {
      content.style.display = "none";
    } else {
      content.style.display = "block";
    }
  });
}
