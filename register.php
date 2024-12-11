<style>
    body {
        background: linear-gradient(135deg, hsla(208, 67%, 81%, 1) 0%, hsla(37, 65%, 85%, 1) 50%, hsla(301, 65%, 83%, 1) 100%);
}
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            font-family: 'Josefin Sans', sans-serif;
            text-align: center;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 80vh;
        }

        form {
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>User Registration</h1><br>

    <form action="register_action.php" method="post">
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="stuName" name="stuName" placeholder="Name" required>
            <label for="stuName">Name</label>
        </div>

        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="matricNo" name="matricNo" placeholder="Matric No" required>
            <label for="matricNo">Matric No</label>
        </div>

        <div class="form-floating mb-3">
            <input type="email" class="form-control" id="stuEmail" name="stuEmail" placeholder="Student Email" required>
            <label for="stuEmail">Student Email</label>
        </div>

        <div class="form-floating mb-3">
            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
            <label for="password">Password</label>
        </div>
        
        <input class="btn btn-success" type="submit" value="Register">
    </form>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
