<!DOCTYPE HTML>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
</head>
<body>
<div class="container">
<?php
$mysqli = new mysqli ("localhost", "root", "", "nfq");

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

if(!empty($_POST)) {
    $sql = "INSERT INTO uzsakymai (vardas, numeris, email, kiekis)
        VALUES ('" . $_POST["vardas"] . "','" . $_POST["numeris"] . "','" . $_POST["email"] . "','" . $_POST["kiekis"] . "')";

    if ($mysqli->query($sql) === TRUE) {
        echo "Sukurtas uzsakymas";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
    </div>

</body>
</html>