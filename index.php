<?php
session_start();
require_once 'config.php';
require_once 'Database.php';

$db = new Database();
$message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['register'])) {
        $username = trim($_POST['username']);
        $password = password_hash(trim($_POST['password']), PASSWORD_DEFAULT);
        $email = trim($_POST['email']);
        
        $sql = "INSERT INTO users (username, password, email) VALUES (?, ?, ?)";
        $stmt = $db->conn->prepare($sql);
        if ($stmt->execute([$username, $password, $email])) {
            $message = '<div class="alert alert-success">Registration successful! Please login.</div>';
        } else {
            $message = '<div class="alert alert-danger">Registration failed.</div>';
        }
    } elseif (isset($_POST['login'])) {
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        $stmt = $db->conn->prepare($sql);
        $stmt->execute([$username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            header('Location: dashboard.php');
            exit;
        } else {
            $message = '<div class="alert alert-danger">Invalid username or password.</div>';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Backup Service - Login/Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Backup Service Application</h1>
        <?php echo $message; ?>
        <div class="row">
            <div class="col-md-6">
                <h3>Register</h3>
                <form method="POST" action="">
                    <div class="mb-3">
                        <label for="reg_username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="reg_username" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="reg_password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="reg_password" name="password" required>
                    </div>
                    <div class="mb-3">
                        <label for="reg_email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="reg_email" name="email" required>
                    </div>
                    <button type="submit" name="register" class="btn btn-primary">Register</button>
                </form>
            </div>
            <div class="col-md-6">
                <h3>Login</h3>
                <form method="POST" action="">
                    <div class="mb-3">
                        <label for="login_username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="login_username" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="login_password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="login_password" name="password" required>
                    </div>
                    <button type="submit" name="login" class="btn btn-primary">Login</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>