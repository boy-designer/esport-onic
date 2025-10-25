<?php
session_start();
if (!isset($_SESSION['username'])) {
  header("Location: signin.php");
  exit;
}
$username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome To Onic</title>
  <style>
    * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

    html, body {
  height: 100%;
  width: 100%;
  overflow: hidden; /* agar tidak ada scroll bar */
  font-family: 'Poppins', sans-serif;
}
    body {
      color: white;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      overflow: hidden;
      position: relative;
      font-family: 'Poppins', sans-serif;
    }

    .home-container {
      text-align: center;
      background: rgba(255, 255, 255, 0.1);
      backdrop-filter: blur(12px);
      padding: 60px 50px;
      border-radius: 20px;
      box-shadow: 0 4px 30px rgba(0,0,0,0.3);
      animation: fadeIn 1s ease forwards;
    }

    h1 {
      font-size: 2rem;
      margin-bottom: 10px;
    }

    p {
      opacity: 0.9;
      margin-bottom: 30px;
    }

    .btn {
      background: #4f46e5;
      color: white;
      padding: 12px 40px;
      border-radius: 30px;
      border: none;
      cursor: pointer;
      font-weight: 600;
      font-size: 1rem;
      text-decoration: none;
      transition: 0.3s;
      margin: 0 10px;
      display: inline-block;
    }

    .btn:hover {
      transform: scale(1.08);
      background: #6366f1;
    }

    .btn-alt {
      background: #22c55e;
    }

    .btn-alt:hover {
      background: #16a34a;
    }

   /* === VIDEO BACKGROUND === */
.animated-bg {
  position: fixed; /* biar nempel di layar */
  top: 0;
  left: 0;
  width: 100%;
  height: 100vh;
  overflow: hidden;
  display: flex;
  justify-content: center;
  align-items: center;
  z-index: -1; /* biar di belakang konten utama */
}

/* Video isi seluruh layar */
.animated-bg video {
  position: absolute;
  top: 50%;
  left: 50%;
  min-width: 100%;
  min-height: 100%;
  width: auto;
  height: auto;
  object-fit: cover;
  transform: translate(-50%, -50%);
  z-index: -2;
}

/* Overlay efek kuning lembut */
.animated-bg .overlay {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: linear-gradient(180deg, rgba(255, 230, 0, 0.25), rgba(0, 0, 0, 0.7));
  animation: glowPulse 8s ease-in-out infinite alternate;
  z-index: -1;
}

/* Animasi nyala halus */
@keyframes glowPulse {
  0% { opacity: 0.4; }
  50% { opacity: 0.7; }
  100% { opacity: 0.4; }
}

/* Teks di tengah layar */
.animated-bg .content {
  position: relative;
  text-align: center;
  color: #fff;
  z-index: 2;
  animation: fadeIn 2s ease-in-out;
}

.animated-bg .content h1 {
  font-size: 4em;
  color: #ffeb00;
  text-shadow: 0 0 25px rgba(255, 255, 100, 0.8);
  margin-bottom: 15px;
}

.animated-bg .content p {
  font-size: 1.4em;
  color: #fff;
  letter-spacing: 1px;
}

/* Efek muncul lembut */
@keyframes fadeIn {
  from { opacity: 0; transform: translateY(20px); }
  to { opacity: 1; transform: translateY(0); }
}
  </style>

  <link rel="icon" type="img/logo onic.jpg" href="img/logo onic.jpg">
</head>
<body>
  <div class="animated-bg">
  <video autoplay loop muted playsinline>
    <source src="onic.mp4
    " type="video/mp4">
  </video>
  <div class="overlay"></div>

  <div class="home-container">
    <h1>Login Successful!</h1>
    <p>Welcome back, <strong><?php echo htmlspecialchars($username); ?></strong>.</p>

    <div class="buttons">
      <a href="logout.php" class="btn">Logout</a>
      <a href="nextpage.html" class="btn btn-alt">Next</a>
    </div>
  </div>
</body>
</html>
