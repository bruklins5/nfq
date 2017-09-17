<!DOCTYPE HTML>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1>Užsakymai</h1>
<?php
$mysqli = new mysqli ("localhost", "root", "", "nfq");

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
}

$total = $mysqli->query('
        SELECT
            COUNT(*) as "count"
        FROM
            uzsakymai
    ')->fetch_assoc()['count'];


// How many items to list per page
$limit = 20;

// How many pages will there be
$pages = ceil($total / $limit);

// What page are we currently on?
$page = min($pages, filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT, array(
    'options' => array(
        'default'   => 1,
        'min_range' => 1,
    ),
)));

// Calculate the offset for the query
$offset = ($page - 1)  * $limit;

// Some information to display to the user
$start = $offset + 1;
$end = min(($offset + $limit), $total);

$sql = "SELECT id, vardas, numeris, kiekis, email FROM uzsakymai LIMIT $limit OFFSET $offset";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    echo "<table class='table'><thead class='thead-default'><tr><th>ID</th><th>Vardas</th><th>Numeris</th><th>Kiekis</th><th>Email</th></tr></thead>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"]. "</td><td>" . $row["vardas"]. "</td><td>" . $row["numeris"]. "</td><td>" . $row["kiekis"]. "</td><td>" . $row["email"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

// The "back" link
$prevlink = ($page > 1) ? '<a href="?page=1" title="First page">&laquo;</a> <a href="?page=' . ($page - 1) . '" title="Previous page">&lsaquo;</a>' : '<span class="disabled">&laquo;</span> <span class="disabled">&lsaquo;</span>';

// The "forward" link
$nextlink = ($page < $pages) ? '<a href="?page=' . ($page + 1) . '" title="Next page">&rsaquo;</a> <a href="?page=' . $pages . '" title="Last page">&raquo;</a>' : '<span class="disabled">&rsaquo;</span> <span class="disabled">&raquo;</span>';

// Display the paging information
echo '<div id="paging"><p>', $prevlink, ' Page ', $page, ' of ', $pages, ' pages, displaying ', $start, '-', $end, ' of ', $total, ' results ', $nextlink, ' </p></div>';


$mysqli->close();
?>
</div>
</body>
</html>