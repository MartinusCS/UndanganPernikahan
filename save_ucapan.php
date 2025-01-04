<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_pengirim = mysqli_real_escape_string($conn, $_POST['nama_pengirim']);
    $katakata = mysqli_real_escape_string($conn, $_POST['katakata']); // Ubah 'ucapan' menjadi 'katakata'

    error_log("Nama Pengirim: " . $nama_pengirim);  // Tambahkan pernyataan log
    error_log("Katakata: " . $katakata);  // Tambahkan pernyataan log

    $sql = "INSERT INTO ucapan (nama_pengirim, katakata) VALUES ('$nama_pengirim', '$katakata')"; // Ubah 'ucapan' menjadi 'katakata'

    if (mysqli_query($conn, $sql)) {
        echo "Data berhasil disimpan.";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        error_log("Error: " . $sql . mysqli_error($conn));  // Tambahkan pernyataan log untuk kesalahan
    }
} else {
    echo "Metode permintaan tidak valid.";
}

mysqli_close($conn);
?>
