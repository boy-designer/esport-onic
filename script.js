const canvas = document.getElementById("bgCanvas");
const ctx = canvas.getContext("2d");
canvas.width = window.innerWidth;
canvas.height = window.innerHeight;

let particlesArray = [];
const colors = ["#3B82F6", "#6366F1", "#22C55E", "#9333EA", "#EAB308"];

window.addEventListener("resize", () => {
  canvas.width = window.innerWidth;
  canvas.height = window.innerHeight;
  init();
});

class Particle {
  constructor(x, y, size, color, speedX, speedY) {
    this.x = x;
    this.y = y;
    this.size = size;
    this.color = color;
    this.speedX = speedX;
    this.speedY = speedY;
  }

  update() {
    this.x += this.speedX;
    this.y += this.speedY;
    if (this.x < 0 || this.x > canvas.width) this.speedX *= -1;
    if (this.y < 0 || this.y > canvas.height) this.speedY *= -1;
  }

  draw() {
    ctx.beginPath();
    ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
    ctx.fillStyle = this.color;
    ctx.fill();
  }
}

function init() {
  particlesArray = [];
  for (let i = 0; i < 60; i++) {
    const size = Math.random() * 4 + 2;
    const x = Math.random() * canvas.width;
    const y = Math.random() * canvas.height;
    const color = colors[Math.floor(Math.random() * colors.length)];
    const speedX = (Math.random() - 0.5) * 1.5;
    const speedY = (Math.random() - 0.5) * 1.5;
    particlesArray.push(new Particle(x, y, size, color, speedX, speedY));
  }
}

function animate() {
  const gradient = ctx.createLinearGradient(0, 0, canvas.width, canvas.height);
  gradient.addColorStop(0, "#0f172a");
  gradient.addColorStop(1, "#1e293b");
  ctx.fillStyle = gradient;
  ctx.fillRect(0, 0, canvas.width, canvas.height);

  for (let p of particlesArray) {
    p.update();
    p.draw();
  }
  requestAnimationFrame(animate);
}

init();
animate();

// === Popup logic ===
document.getElementById("nextBtn").addEventListener("click", () => {
  fetch("session_check.php")
    .then(res => res.json())
    .then(data => {
      if (data.logged_in) {
        window.location.href = "home.php";
      } else {
        document.getElementById("popup").classList.remove("hidden");
      }
    });
});

document.getElementById("closePopup").addEventListener("click", () => {
  document.getElementById("popup").classList.add("hidden");
});