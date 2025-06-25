<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="/../../Public/styles/auth.css">

</head>
<body>
    <h2>Login</h2>
    <?php if (isset($_GET['error'])) echo "<p style='color:red'>Invalid credentials!</p>"; ?>
    <?php if (isset($_GET['message']) && $_GET['message'] === 'registered') echo "<p style='color:green'>Registration successful! Please log in.</p>"; ?>
    <form action="?page=login" method="POST">
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <button type="submit">Login</button>
    </form>
    <p>Don't have an account? <a href="?page=register">Register</a></p>
</body>
</html>