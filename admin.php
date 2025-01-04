<?php
include 'koneksi.php';

// Query untuk mengambil data dari tabel 'katakata'
$query = "SELECT * FROM ucapan"; // Ganti 'ucapan' menjadi 'katakata'
$result = mysqli_query($conn, $query);

// Cek kesalahan dalam query
if (!$result) {
    die("Query error: " . mysqli_error($conn));
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('assets/img/frame2.png');
            background-size: cover;
            background-repeat: no-repeat;
            background-color: #f4f4f4;
            color: #333;
            margin: 0; /* Menghapus margin default dari body */
            padding: 0; /* Menghapus padding default dari body */
            display: flex;
            flex-direction: column;
        }

        h2 {
            text-align: center;
            color: black;
            position: relative;
            left:30px;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }
        </style>
    <title>Admin Page</title>
</head>

<body>
    <h2>Kumpulan Ucapan Selamat</h2>
    <table border="1">
        <tr>
            <th>Nama Pengirim</th>
            <th>Ucapan Hangat</th>
        </tr>

        <?php
        // Tampilkan data dari hasil query
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['nama_pengirim'] . "</td>";
            echo "<td>" . $row['katakata'] . "</td>";
            echo "</tr>";
        }

        // Bebaskan hasil query
        mysqli_free_result($result);

        // Tutup koneksi database
        mysqli_close($conn);
        ?>

    </table>
</body>

</html>
