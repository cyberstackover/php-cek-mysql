<?php
// Inisialisasi koneksi MySQL
$conn = mysqli_init();

// Set koneksi SSL
mysqli_ssl_set($conn, NULL, NULL, "/var/www/html/DigiCertGlobalRootCA.crt.pem", NULL, NULL);

// Lakukan koneksi menggunakan SSL
mysqli_real_connect($conn, 'tes-server-herwin.mysql.database.azure.com', 'xokvnemxcl', 'Bismillah1410', 'tes-database-herwin', 3306, MYSQLI_CLIENT_SSL);

// Cek koneksi
if (mysqli_connect_errno()) {
    die('Koneksi gagal ke MySQL: ' . mysqli_connect_error());
} else {
    echo "Koneksi berhasil ke server MySQL dengan SSL<br>";
}

// Menampilkan informasi database
$sql = "SHOW TABLES";
$result = mysqli_query($conn, $sql);

if ($result) {
    echo "Daftar tabel di database:<br>";
    while ($row = mysqli_fetch_row($result)) {
        echo $row[0] . "<br>";
    }
} else {
    echo "Error menampilkan tabel: " . mysqli_error($conn);
}

// Menutup koneksi
mysqli_close($conn);
?>
