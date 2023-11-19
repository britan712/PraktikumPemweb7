<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $nim = $_GET['nim'];
    $query = "SELECT * FROM mahasiswa WHERE NIM = '$nim'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $data = mysqli_fetch_assoc($result);
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
        die();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Mahasiswa</title>
</head>

<body>

    <h2>Edit Data Mahasiswa</h2>

    <form action="updatedata.php" method="post">
        <label for="NIM">NIM:</label>
        <input type="text" name="NIM" value="<?php echo $data['NIM']; ?>" readonly>
        <label for="Nama">Nama:</label>
        <input type="text" name="Nama" value="<?php echo $data['Nama']; ?>" required>
        <label for="Prodi">Prodi:</label>
        <input type="text" name="Prodi" value="<?php echo $data['Prodi']; ?>" required>
        <input type="submit" value="Update">
    </form>

</body>
</html>
