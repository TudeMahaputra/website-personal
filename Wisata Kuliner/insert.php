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

    $nama = $_POST["nama"];
    $deskripsi = $_POST["deskripsi"];
    $harga = $_POST["harga"];

    $sql = "INSERT INTO menu (nama, deskripsi, harga) VALUES ('$nama', '$deskripsi', $harga)";

    if ($conn->query($sql) === TRUE) {
        echo "Menu berhasil ditambahkan.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Menu Kuliner</title>
</head>
<body>
    <h2>Tambah Menu Baru</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        Nama: <input type="text" name="nama" required><br>
        Deskripsi: <textarea name="deskripsi" required></textarea><br>
        Harga: <input type="number" name="harga" step="0.01" required><br>
        <input type="submit" value="Tambah Menu">
    </form>
</body>
</html>
