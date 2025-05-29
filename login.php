<?php
session_start();
$admin_user = "admin";
$admin_pass = "12345";

if (isset($_POST['login'])) {
    if ($_POST['username'] === $admin_user && $_POST['password'] === $admin_pass) {
        $_SESSION['admin'] = true;
        header("Location: index.php");
        exit;
    } else {
        $error = "Username atau password salah!";
    }
}
?>
<h2>Login Admin</h2>
<?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
<form method="POST">
  <input name="username" placeholder="Username" required><br>
  <input type="password" name="password" placeholder="Password" required><br>
  <button name="login">Login</button>
</form>
