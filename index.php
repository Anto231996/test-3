<!DOCTYPE html>
<html>
<head>
<style>
table, th, td {
    border: 1px solid black;
}
</style>
</head>
<body>

<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "db_airport3";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

/* $flights = "SELECT id, code_departure, code_arrival, price FROM flights"; */
/* $all = "SELECT ALL FROM airports INNER JOIN flights"; */
$all = "SELECT * FROM airports AS a, flights AS f WHERE f.code_departure = a.code OR f.code_arrival = a.code ORDER BY `f`.`id`";

$result = $conn->query($all);

if ($result->num_rows > 0) {
    echo "<table><tr><th>Nome</th><th>Codice</th><th>Latitudine</th><th>Longitudine</th><th>ID</th><th>Codice partenza</th><th>Codice arrivo</th><th>Prezzo</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["name"]. "</td><td>" . $row["code"]. "</td><td>" . $row["lat"]. "</td><td>" . $row["lng"]. "</td><td>" . $row["id"]. "</td><td>" . $row["code_departure"]. "</td><td>" . $row["code_arrival"]. "</td><td>" . $row["price"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>

</body>
</html>