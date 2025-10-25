// === HAMBURGER MENU ===
const hamburger = document.getElementById("hamburger");
const navLinks = document.querySelector(".nav-links");

hamburger.addEventListener("click", () => {
  navLinks.classList.toggle("active");
  hamburger.classList.toggle("open");
});

// === NAVBAR SCROLL EFFECT ===
window.addEventListener("scroll", () => {
  const nav = document.querySelector("nav");
  if (window.scrollY > 50) {
    nav.classList.add("scrolled");
  } else {
    nav.classList.remove("scrolled");
  }
});

// === TAMPILKAN TEKS ===
function showText(id) {
  const text = document.getElementById(id);
  const container = text.parentElement;
  const showBtn = container.querySelector(".show-btn");
  const hideBtn = container.querySelector(".hide-btn");

  text.classList.add("show");
  text.style.display = "block";
  setTimeout(() => {
    text.style.opacity = "1";
    text.style.transform = "translateY(0)";
  }, 50);

  showBtn.style.display = "none";
  hideBtn.style.display = "inline-block";
}

// === TUTUP TEKS ===
function hideText(id) {
  const text = document.getElementById(id);
  const container = text.parentElement;
  const showBtn = container.querySelector(".show-btn");
  const hideBtn = container.querySelector(".hide-btn");

  text.style.opacity = "0";
  text.style.transform = "translateY(20px)";
  setTimeout(() => {
    text.style.display = "none";
    text.classList.remove("show");
  }, 400);

  showBtn.style.display = "inline-block";
  hideBtn.style.display = "none";
}

// === LOGOUT ALERT ===
document.getElementById("logoutBtn").addEventListener("click", function () {
  // Ganti 'login.html' dengan halaman tujuanmu
  window.location.href = "index.html";
});

document.querySelectorAll(".toggle-btn").forEach((button) => {
  button.addEventListener("click", () => {
    const card = button.parentElement;
    const text = card.querySelector(".hidden-text");

    text.classList.toggle("show");

    // Ubah teks tombol dengan efek kecil
    button.textContent = text.classList.contains("show") ?
      "Tutup" :
      "Tampilkan Teks";

    // Animasi kecil pada tombol
    button.style.transform = "scale(0.95)";
    setTimeout(() => (button.style.transform = "scale(1)"), 150);
  });
});