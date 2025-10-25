<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST['email'];
  $password = $_POST['password'];

  $sql = "SELECT * FROM users WHERE email='$email'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password'])) {
      session_regenerate_id(true);
      $_SESSION['username'] = $row['username']; // ✅ FIX: gunakan 'username'
      header("Location: home.php");
      exit;
    } else {
      $error = "❌ Password salah!";
    }
  } else {
    $error = "⚠️ Akun tidak ditemukan!";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sign In</title>
  <link rel="icon" type="img/logo onic.jpg" href="img/logo onic.jpg">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }

    body {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      overflow: hidden;
      position: relative;
      color: white;
    }

    .bg-video {
      position: absolute;
      right: 0;
      bottom: 0;
      min-width: 100%;
      min-height: 100%;
      object-fit: cover;
      z-index: -2;
      filter: brightness(0.4);
    }

    .overlay {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0,0,0,0.4);
      z-index: -1;
    }

    .form-container {
      background: rgba(255, 255, 255, 0.1);
      backdrop-filter: blur(12px);
      padding: 60px 40px;
      border-radius: 20px;
      text-align: center;
      width: 350px;
      box-shadow: 0 4px 30px rgba(0,0,0,0.3);
      animation: fadeIn 0.8s ease forwards;
    }

    .form-container h2 {
      font-size: 2rem;
      margin-bottom: 10px;
    }

    .form-container .sub {
      font-size: 0.95rem;
      color: #e0e0e0;
      margin-bottom: 25px;
    }

    input {
      width: 100%;
      padding: 12px;
      margin: 10px 0;
      border: none;
      border-radius: 8px;
      background: rgba(255, 255, 255, 0.2);
      color: white;
      font-size: 1rem;
      outline: none;
    }

    input::placeholder {
      color: #ddd;
    }

    button {
      width: 100%;
      padding: 12px;
      margin-top: 15px;
      border: none;
      border-radius: 8px;
      background: #6366F1;
      color: white;
      font-weight: 600;
      cursor: pointer;
      font-size: 1rem;
      transition: 0.3s;
    }

    button:hover {
      background: #818CF8;
      transform: scale(1.05);
    }

    .switch, .back-home {
      margin-top: 15px;
      font-size: 0.9rem;
    }

    .switch a, .back-home a {
      color: #A5B4FC;
      text-decoration: none;
      font-weight: 600;
    }

    .switch a:hover, .back-home a:hover {
      text-decoration: underline;
    }

    .alert {
      background: rgba(255, 0, 0, 0.3);
      color: white;
      padding: 10px;
      border-radius: 8px;
      margin-bottom: 15px;
      font-size: 0.9rem;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: scale(0.95); }
      to { opacity: 1; transform: scale(1); }
    }
  </style>
</head>
<body>
  <video autoplay muted loop class="bg-video">
    <source src="onic.mp4" type="video/mp4">
  </video>
  <div class="overlay"></div>

  <div class="form-container">
    <h2>Welcome Back</h2>
    <p class="sub">Sign in to continue</p>

    <?php if (!empty($error)): ?>
      <div class="alert"><?php echo $error; ?></div>
    <?php endif; ?>

    <form method="POST">
      <input type="email" name="email" placeholder="Email" required>
      <input type="password" name="password" placeholder="Password" required>
      <button type="submit">Sign In</button>
      <p class="switch">Belum punya akun? <a href="signup.php">Sign Up</a></p>
      <p class="back-home"><a href="index.html">Kembali ke Home</a></p>
    </form>
  </div>
</body>
</html>
