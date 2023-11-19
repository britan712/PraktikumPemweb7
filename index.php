<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
</head>

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
            margin-bottom: 20px;
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

        table {
            border-collapse: collapse;
            width: 80%;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 8px;
            text-align: left;
        }
</style>

<body>

<?php
include 'koneksi.php'; // Include the database connection file

// Proses pencarian data
if (isset($_GET['search'])) {
    $searchTerm = $_GET['search'];
    $query = "SELECT * FROM mahasiswa WHERE Prodi LIKE '%$searchTerm%'";
} else {
    $query = "SELECT * FROM mahasiswa";
}

// Eksekusi query untuk mengambil data dari database
$result = mysqli_query($conn, $query);
?>

    <!-- Formulir untuk mencari data mahasiswa berdasarkan prodi -->
    <form action="index.php" method="get" class="form">
        <label for="search">Cari Prodi Mahasiswa:</label>
        <input type="text" name="search" required>
        <input type="submit" value="Cari">
    </form>

    <!-- Tombol untuk menuju halaman tambah data -->
    <a href="tambahdata.php">Tambah Data</a>

    <!-- Tabel untuk menampilkan data mahasiswa -->
    <table border="1">
        <tr>
            <th>NIM</th>
            <th>Nama</th>
            <th>Prodi</th>
        </tr>
        <?php
        // Menampilkan data mahasiswa
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['NIM'] . "</td>";
            echo "<td>" . $row['Nama'] . "</td>";
            echo "<td>" . $row['Prodi'] . "</td>";
            echo "<td><a href='editdata.php?nim=" . $row['NIM'] . "'>Edit</a></td>"; // Tambah tombol edit
            echo "<td><a href='hapusdata.php?nim=" . $row['NIM'] . "'>Hapus</a></td>"; // Tombol hapus
            echo "</tr>";
        }
        ?>
    </table>

</body>
</html>
