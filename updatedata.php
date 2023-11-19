<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $NIM = $_POST['NIM'];
    $Nama = $_POST['Nama'];
    $Prodi = $_POST['Prodi'];

    // Eksekusi query untuk memperbarui data di database
    $query = "UPDATE mahasiswa SET Nama='$Nama', Prodi='$Prodi' WHERE NIM='$NIM'";
    
    if (mysqli_query($conn, $query)) {
        header("Location: index.php"); // Redirect kembali ke halaman utama setelah berhasil memperbarui data
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
    <title>Update Data Mahasiswa</title>
</head>

<body>

    <h2>Data Mahasiswa berhasil diperbarui</h2>

</body>
</html>
