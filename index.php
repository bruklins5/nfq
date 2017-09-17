<!DOCTYPE HTML>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1>Užsakymo forma</h1>
<form action="order.php" method="post">
    <div class="form-group">
        <label>Vardas:</label>
        <input type="text" name="vardas" class="form-control" placeholder="Vardas" required>
    </div>
    <div class="form-group">
        <label>Numeris:</label>
        <input type="text" name="numeris" class="form-control" placeholder="Numeris" required>
    </div>
    <div class="form-group">
        <label>E-mail:</label>
        <input type="email" name="email" class="form-control" placeholder="E-mail" required>
    </div>
    <div class="form-group">
        <label>Kiekis:</label>
        <input type="text" name="kiekis" class="form-control" placeholder="Kiekis" required>
    </div>

    <button type="submit" class="btn btn-primary">Pateikti</button>
</form>
</div>

</body>
</html>