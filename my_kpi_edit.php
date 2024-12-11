<style>
    body {
        background: linear-gradient(135deg, hsla(208, 67%, 81%, 1) 0%, hsla(37, 65%, 85%, 1) 50%, hsla(301, 65%, 83%, 1) 100%);
}
table {
        margin-left: auto;
        margin-right: auto;
    }
     h1{
        text-align: center;
    }
</style>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="css_inv1/style.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Titillium+Web">
  <title>KPI Form</title>
</head>
<body class="d-flex flex-column min-vh-100 justify-content-center align-items-center">

  <main>
    <h1>Update Form</h1>
    <table>
  <form method="post" action="my_kpi_edition.php" enctype="multipart/form-data">
    <tr>
      <td><label for="sem">Sem:</label></td>
      <td>
        <select class="form-select" name="i_sem" id="sem">
          <option value="1">1</option>
          <option value="2">2</option>
        </select>
      </td>
    </tr>

    <tr>
      <td><label for="year">Year:</label></td>
      <td>
        <select class="form-select" name="i_year" id="year" required>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
        </select>
      </td>
    </tr>

    <tr>
      <td><label for="cgp">CGPA:</label></td>
      <td><input class="form-control" type="number" step="0.01" min="0" max="4" id="cgp" name="cgp" placeholder="CGP" required></td>
    </tr>

    <tr>
      <td><label for="leadership">Leadership:</label></td>
      <td><input class="form-control" type="number" id="leadership" name="leadership" min="0" required></td>
    </tr>

    <tr>
      <td><label for="graduate_aim">Graduate Aim:</label></td>
      <td>
        <select class="form-select" name="graduate_aim" id="graduate_aim" required>
          <option value="On Time">On Time</option>
          <option value="Postpone">Postpone</option>
        </select>
      </td>
    </tr>

    <tr>
      <td colspan="2" align="center"><button class="btn btn-success"type="submit">Update</button>
      <a class="btn btn-secondary" href="my_kpi.php">Back</a>
      </td>
    </tr>
  </form>
</table>

  </main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>