<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kuliner";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM menu";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Daftar Menu:</h2><ul>";
    while ($row = $result->fetch_assoc()) {
        echo "<li>" . $row["nama"] . " - " . $row["deskripsi"] . " - $" . $row["harga"] . "</li>";
    }
    echo "</ul>";
} else {
    echo "Tidak ada menu.";
}

$conn->close();
?>
