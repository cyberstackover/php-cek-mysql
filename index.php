<?php
// Konfigurasi koneksi database
$servername = "tes-server-herwin"; // Sesuaikan dengan alamat server MySQL Anda
$username = "xokvnemxcl";    // Sesuaikan dengan username MySQL Anda
$password = "q4hf$gSagPzpLTCG";    // Sesuaikan dengan password MySQL Anda
$dbname = "tes-database-herwin"; // Sesuaikan dengan nama database yang ingin Anda cek

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
} else {
    echo "Koneksi berhasil ke server MySQL<br>";
}

// Menampilkan informasi database
$sql = "SHOW TABLES FROM $dbname";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "Daftar tabel di database '$dbname':<br>";
    while ($row = $result->fetch_assoc()) {
        echo $row["Tables_in_$dbname"] . "<br>";
    }
} else {
    echo "Tidak ada tabel yang ditemukan di database '$dbname'.";
}

// Menutup koneksi
$conn->close();
?>
