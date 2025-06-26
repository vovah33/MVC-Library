<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="/MVC-Library/Public/styles/auth.css">
</head>
<body>
    <div class="auth-container">
        <h2>Register</h2>

        <?php if (isset($_GET['error']) && $_GET['error'] === 'exists'): ?>
            <div class="error">User already exists!</div>
        <?php endif; ?>

        <form action="?page=register" method="POST">
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" value="Register">
        </form>

        <p>Already have an account? <a href="?page=login">Login</a></p>
    </div>
</body>
</html>
