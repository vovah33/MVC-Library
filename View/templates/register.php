<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="/MVC-Library/Public/styles/auth.css">

</head>
<body>
    <h2>Register</h2>
    <?php if (isset($_GET['error']) && $_GET['error'] === 'exists') echo "<p style='color:red'>User already exists!</p>"; ?>
    <form action="?page=register" method="POST">
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <button type="submit">Register</button>
    </form>
    <p>Already have an account? <a href="?page=login">Login</a></p>
</body>
</html>