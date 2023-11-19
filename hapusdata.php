<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $nim = $_GET['nim'];
    
    // Eksekusi query untuk menghapus data dari database
    $query = "DELETE FROM mahasiswa WHERE NIM = '$nim'";
    
    if (mysqli_query($conn, $query)) {
        header("Location: index.php"); // Redirect kembali ke halaman utama setelah berhasil menghapus data
        exit();
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hapus Data Mahasiswa</title>
</head>

<body>

    <h2>Data Mahasiswa berhasil dihapus</h2>

</body>
</html>
