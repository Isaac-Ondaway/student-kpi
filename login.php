<style>
    body {
        background: linear-gradient(135deg, hsla(208, 67%, 81%, 1) 0%, hsla(37, 65%, 85%, 1) 50%, hsla(301, 65%, 83%, 1) 100%);
}
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css_inv1/style.css">
</head>
<body class="d-flex flex-column min-vh-100 justify-content-center align-items-center">
    <header class="text-center">
        <h1>My KPI</h1>
    </header>
    <main class="text-center">
        <form action="login_action.php" method="post">
        <div class="form-floating mb-3">
        <input type="text" class="form-control" id="matricNo" name="matricNo" placeholder="Matric No" required>
        <label for="matricNo">Matric No</label>
    </div>

    <div class="form-floating">
        <input type="password" class="form-control" id="userPwd" name="userPwd" placeholder="Password" required>
        <label for="userPwd">Password</label>
    </div>
<br>
            <input class="btn btn-primary" type="submit" value="Login"><br>
        </form>
        <br>
        <div class="d-flex flex-column align-items-center">
            <p class="mb-0">Don't have an account?</p>
            <a href="register.php" class="btn btn-dark">Register</a>
        </div>
    </main>
    <footer>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
