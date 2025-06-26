<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="/MVC-Library/Public/styles/auth.css">
</head>
<body>
    <div class="auth-container">
        <h2>Login</h2>

        <?php if (isset($_GET['error'])): ?>
            <div class="error">Invalid credentials!</div>
        <?php endif; ?>

        <?php if (isset($_GET['message']) && $_GET['message'] === 'registered'): ?>
            <div class="success">Registration successful! Please log in.</div>
        <?php endif; ?>

        <form action="?page=login" method="POST">
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" value="Login">
        </form>

        <p>Don't have an account? <a href="?page=register">Register</a></p>
    </div>
</body>
</html>
