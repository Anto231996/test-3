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

$flights = "SELECT id, code_departure, code_arrival, price FROM flights";
$airports = "SELECT id, code_departure, code_arrival, price FROM airports";
$result = $conn->query($flights);

if ($result->num_rows > 0) {
  // output data of each row
    while($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"]. " - Codice: " . $row["code_departure"]. " " . $row["code_arrival"]. " - Prezzo: " . $row["price"]. "<br>";
    }
} else { echo "0 risultati"; }
$conn->close();
?>