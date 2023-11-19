<?php
include 'koneksi.php'; // Include the database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $NIM = $_POST['NIM'];
    $Nama = $_POST['Nama'];
    $Prodi = $_POST['Prodi'];

    // Eksekusi query untuk menambahkan data ke database
    $query = "INSERT INTO mahasiswa (NIM, Nama, Prodi) VALUES ('$NIM', '$Nama', '$Prodi')";
    
    if (mysqli_query($conn, $query)) {
        echo "Data mahasiswa berhasil ditambahkan.";
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
    <title>Tambah Data Mahasiswa</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .form {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 20px;
        }

        .form label {
            margin-bottom: 5px;
        }

        .form input[type="text"] {
            padding: 5px;
            margin-bottom: 10px;
        }

        .form input[type="submit"] {
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
    </style>
</head>

<body>

    <!-- Formulir untuk menambahkan data mahasiswa -->
    <form action="tambahdata.php" method="post" class="form">
        <label for="NIM">NIM:</label>
        <input type="text" name="NIM" required>
        <label for="Nama">Nama:</label>
        <input type="text" name="Nama" required>
        <label for="Prodi">Prodi:</label>
        <input type="text" name="Prodi" required>
        <input type="submit" value="Tambahkan">
    </form>

    <!-- Tombol untuk kembali ke halaman utama -->
    <a href="index.php">Kembali</a>

</body>
</html>
