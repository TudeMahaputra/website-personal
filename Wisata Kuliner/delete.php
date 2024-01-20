<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "kuliner";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $id = $_POST["id"];

    $sql = "DELETE FROM menu WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Menu berhasil dihapus.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close(); // Menutup koneksi setelah operasi query selesai
}
?>
