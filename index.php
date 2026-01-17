<?php
include "koneksi.php";

// proses login
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $result = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    if ($row = mysqli_fetch_assoc($result)) {
        if ($password == $row['password']) {
            $_SESSION['email'] = $row['email'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['role'] = $row['role'];
            header("location: dashboard.php");
            exit;

        } else {
            $error = "password salah.";
        }
    } else {
        $error = "Email tidak ditemukan.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PENJUALAN</title>
</head>
<body>
    <div class="login-card"> 
        <h2>POLGAN MART</h2>
        <?php if (!empty($error)) echo "<div class='error'>$error</div>"; ?>
        <form method="post">
            <div class="from-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Masukan email anda" required>
            </div>
            <div class="from-group">
                <label for="password">password</label>
                <input type="password" id="password" name="password" placeholder="Masukan password" required>
            </div>
            <buttot type="submit" class="btn">Login</button>
            <button type="reset" class="btn-reset">Batal</button>
      </from>
      <div class="footer">
            <p>0 2026 POLGAN MART</P>
      </div>
    </div>
</body>
</html>