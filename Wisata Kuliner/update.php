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
    $nama = $_POST["nama"];
    $deskripsi = $_POST["deskripsi"];
    $harga = $_POST["harga"];

    $sql = "UPDATE menu SET nama='$nama', deskripsi='$deskripsi', harga=$harga WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Menu berhasil diperbarui.";
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
    <title>Update Menu Kuliner</title>
</head>
<body>
    <h2>Update Menu</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        ID Menu yang akan diupdate: <input type="text" name="id" required><br>
        Nama baru: <input type="text" name="nama" required><br>
        Deskripsi baru: <textarea name="deskripsi" required></textarea><br>
        Harga baru: <input type="number" name="harga" step="0.01" required><br>
        <input type="submit" value="Update Menu">
    </form>
</body>
</html>
