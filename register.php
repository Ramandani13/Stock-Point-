<?php 
 
include 'koneksi.php';
 
error_reporting(0);
 
session_start();
 
if (isset($_SESSION['username'])) {
    header("Location: index.php");
}
 
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);
 
    if ($password == $cpassword) {
        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($conn, $sql);
        if (!$result->num_rows > 0) {
            // $sql = "INSERT INTO users (username, email, password)
            //         VALUES ('$username', '$email', '$password')";
            // $result = mysqli_query($conn, $sql);
            echo "<script>alert('Hubungi © 2022 Ramandani Gilang S [19968] YIMM-WJF.')</script>";
            if ($result) {
                // echo "<script>alert('Selamat, registrasi berhasil!')</script>";
                // $username = "";
                // $email = "";
                // $_POST['password'] = "";
                // $_POST['cpassword'] = "";
                echo "<script>alert('Hubungi © 2022 Ramandani Gilang S [19968] YIMM-WJF.')</script>";
            } else {
                // echo "<script>alert('Woops! Terjadi kesalahan.')</script>";
                echo "<script>alert('Hubungi © 2022 Ramandani Gilang S [19968] YIMM-WJF.')</script>";
            }
        } else {
            // echo "<script>alert('Woops! Email Sudah Terdaftar.')</script>";
            echo "<script>alert('Hubungi © 2022 Ramandani Gilang S [19968] YIMM-WJF.')</script>";
        }
         
    } else {
        // echo "<script>alert('Password Tidak Sesuai')</script>";
        echo "<script>alert('Hubungi © 2022 Ramandani Gilang S [19968] YIMM-WJF.')</script>";
    }
}
 
?>
 
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 
    <link rel="stylesheet" type="text/css" href="style.css">
 
    <title>Niagahoster Register</title>
</head>
<body>
    <div class="container">
        <form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Register</p>
            <div class="input-group">
                <input type="text" placeholder="Username" name="username" value="<?php echo $username; ?>" required>
            </div>
            <div class="input-group">
                <input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Confirm Password" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
            </div>
            <div class="input-group">
                <button name="submit" class="btn">Register</button>
            </div>
            <p class="login-register-text">Anda sudah punya akun? <a href="index.php">Login </a></p>
        </form>
    </div>
</body>
</html>